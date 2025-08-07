<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\ShareSettings;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; // Explicitly import Request
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => IsAdmin::class,
        ]);
        $middleware->web(append: [
            ShareSettings::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (HttpException $e, Request $request) {
            $status = $e->getStatusCode();
            $message = $e->getMessage() ?: match ($status) {
                404 => 'Page Not Found',
                403 => 'Access Forbidden',
                500 => 'Server Error',
                default => 'Something Went Wrong',
            };

            return response()->view('errors.error', [
                'status' => $status,
                'message' => $message,
            ], $status);
        });
    })->create();