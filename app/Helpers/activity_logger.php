<?php

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

if (!function_exists('log_activity')) {
    function log_activity(string $action, string $target, string $description): void
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'target' => $target,
                'description' => $description,
            ]);
        }
    }
}
