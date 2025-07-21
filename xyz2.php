<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(_DIR_))
    ->withRouting(
        web: _DIR_.'/../routes/web.php',
        commands: _DIR_.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register global middleware if needed
        // $middleware->append(\App\Http\Middleware\SomeGlobalMiddleware::class);

        // ✅ Register route middleware
        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuthMiddleware::class,
            'preventBackHistory' => \App\Http\Middleware\PreventBackHistory::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();