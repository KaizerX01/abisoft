<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Chat;
use App\Models\ChatMessage;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // Use a session-bound chat
        $sessionId = $request->session()->get('chat_session_id');
        if (!$sessionId) {
            $sessionId = (string) Str::uuid();
            $request->session()->put('chat_session_id', $sessionId);
            $chat = Chat::create(['session_id' => $sessionId]);
        } else {
            $chat = Chat::firstOrCreate(['session_id' => $sessionId]);
        }
        $messages = ChatMessage::where('chat_id', $chat->id)->orderBy('created_at')->get();
        return view('chat', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000'
        ]);

        // Ensure chat session
        $sessionId = $request->session()->get('chat_session_id');
        $chat = Chat::firstOrCreate(['session_id' => $sessionId ?? (string) Str::uuid()]);
        if (!$sessionId) $request->session()->put('chat_session_id', $chat->session_id);

        // Save user message
        $userMsg = ChatMessage::create([
            'chat_id' => $chat->id,
            'sender'  => 'user',
            'content' => $request->input('message')
        ]);

        // Call local Python script (no external API)
        $python = env('PYTHON_BIN', 'python3');
        $botDir = rtrim(env('PYTHON_BOT_DIR', base_path('bot')), '/\\');
        
        // Fix path separators for Windows
        if (PHP_OS_FAMILY === 'Windows') {
            $venvPython = $botDir . DIRECTORY_SEPARATOR . '.venv' . DIRECTORY_SEPARATOR . 'Scripts' . DIRECTORY_SEPARATOR . 'python.exe';
            $script = $botDir . DIRECTORY_SEPARATOR . 'chatbot.py';
        } else {
            $venvPython = $botDir . '/.venv/bin/python';
            $script = $botDir . '/chatbot.py';
        }
        
        $bin = file_exists($venvPython) ? $venvPython : $python;
        $question = $request->input('message');

        // Log debug information
        Log::info('Python Bot Debug', [
            'bin' => $bin,
            'script' => $script,
            'botDir' => $botDir,
            'question' => $question,
            'bin_exists' => file_exists($bin),
            'script_exists' => file_exists($script),
            'working_dir' => $botDir
        ]);

        $process = new Process([$bin, $script, $question]);
        $process->setWorkingDirectory($botDir);
        $process->setTimeout(20); // seconds
        $process->run();

        $answer = "Désolé, une erreur s'est produite.";
        
        // Enhanced error handling and logging
        if ($process->isSuccessful()) {
            $output = $process->getOutput();
            $errorOutput = $process->getErrorOutput();
            
            Log::info('Python script output', [
                'stdout' => $output,
                'stderr' => $errorOutput,
                'exit_code' => $process->getExitCode()
            ]);
            
            // Parse the output - we need to get the last JSON line (not the debug lines)
            $lines = array_filter(explode("\n", trim($output)));
            $lastLine = end($lines);
            
            Log::info('Python last line', ['last_line' => $lastLine]);
            
            $out = json_decode($lastLine, true);
            if (is_array($out) && ($out['ok'] ?? false)) {
                $answer = $out['answer'] ?? $answer;
            } else {
                Log::error('Python script returned error', [
                    'decoded' => $out,
                    'raw_output' => $output,
                    'last_line' => $lastLine
                ]);
                $answer = $out['error'] ?? "Erreur de décodage JSON";
            }
        } else {
            $errorOutput = $process->getErrorOutput();
            $exitCode = $process->getExitCode();
            
            Log::error('Python process failed', [
                'exit_code' => $exitCode,
                'error_output' => $errorOutput,
                'stdout' => $process->getOutput(),
                'command' => $process->getCommandLine()
            ]);
            
            $answer = $errorOutput ?: "Erreur du processus Python (code: $exitCode)";
        }

        $botMsg = ChatMessage::create([
            'chat_id' => $chat->id,
            'sender'  => 'bot',
            'content' => $answer
        ]);

        return response()->json([
            'ok' => true,
            'user' => ['id' => $userMsg->id, 'content' => $userMsg->content],
            'bot'  => ['id' => $botMsg->id,  'content' => $botMsg->content]
        ]);
    }

    public function retrain()
    {
        $python = env('PYTHON_BIN', 'python3');
        $botDir = rtrim(env('PYTHON_BOT_DIR', base_path('bot')), '/');
        
        if (PHP_OS_FAMILY === 'Windows') {
            $venvPython = $botDir.'/.venv/Scripts/python.exe';
        } else {
            $venvPython = $botDir.'/.venv/bin/python';
        }
        
        $bin = file_exists($venvPython) ? $venvPython : $python;
        
        $process = new Process([$bin, 'train.py']);
        $process->setWorkingDirectory($botDir);
        $process->setTimeout(120);
        $process->run();

        if ($process->isSuccessful()) {
            return response()->json(['ok' => true, 'train_output' => json_decode($process->getOutput(), true)]);
        }

        Log::error('Training failed', [
            'exit_code' => $process->getExitCode(),
            'error_output' => $process->getErrorOutput()
        ]);

        return response()->json(['ok' => false, 'error' => $process->getErrorOutput() ?: 'training failed'], 500);
    }
}