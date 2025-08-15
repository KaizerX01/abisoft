<?php
// Simple test script to verify PHP can execute Python
use Symfony\Component\Process\Process;

// Test 1: Basic Python execution
echo "=== Test 1: Basic Python ===\n";
$process = new Process(['python', '--version']);
$process->run();
echo "Exit code: " . $process->getExitCode() . "\n";
echo "Output: " . $process->getOutput() . "\n";
echo "Error: " . $process->getErrorOutput() . "\n\n";

// Test 2: Virtual environment Python
echo "=== Test 2: Virtual Environment Python ===\n";
$botDir = 'C:\Users\tshen\Desktop\projects\abisoft\bot';
$venvPython = $botDir . '\.venv\Scripts\python.exe';
echo "Python path: $venvPython\n";
echo "File exists: " . (file_exists($venvPython) ? 'YES' : 'NO') . "\n";

$process = new Process([$venvPython, '--version']);
$process->setWorkingDirectory($botDir);
$process->run();
echo "Exit code: " . $process->getExitCode() . "\n";
echo "Output: " . $process->getOutput() . "\n";
echo "Error: " . $process->getErrorOutput() . "\n\n";

// Test 3: Run the debug script
echo "=== Test 3: Debug Script ===\n";
$debugScript = $botDir . '\debug_test.py';
echo "Script path: $debugScript\n";
echo "Script exists: " . (file_exists($debugScript) ? 'YES' : 'NO') . "\n";

$process = new Process([$venvPython, $debugScript, 'test']);
$process->setWorkingDirectory($botDir);
$process->run();
echo "Exit code: " . $process->getExitCode() . "\n";
echo "Output: " . $process->getOutput() . "\n";
echo "Error: " . $process->getErrorOutput() . "\n\n";

// Test 4: Run chatbot script
echo "=== Test 4: Chatbot Script ===\n";
$chatbotScript = $botDir . '\chatbot.py';
echo "Script path: $chatbotScript\n";
echo "Script exists: " . (file_exists($chatbotScript) ? 'YES' : 'NO') . "\n";

$process = new Process([$venvPython, $chatbotScript, 'Bonjour']);
$process->setWorkingDirectory($botDir);
$process->run();
echo "Exit code: " . $process->getExitCode() . "\n";
echo "Raw Output: " . var_export($process->getOutput(), true) . "\n";
echo "Error: " . $process->getErrorOutput() . "\n";

// Try to decode JSON
$output = $process->getOutput();
$lines = explode("\n", trim($output));
echo "Output lines count: " . count($lines) . "\n";
foreach ($lines as $i => $line) {
    echo "Line $i: " . var_export($line, true) . "\n";
    if (!empty($line) && $line[0] === '{') {
        $decoded = json_decode($line, true);
        echo "Decoded JSON: " . var_export($decoded, true) . "\n";
    }
}
?>