<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->report(function (Telegram\Bot\Exceptions\TelegramSDKException $e) {
            \Illuminate\Support\Facades\Log::channel('telegram')->error(
                $e->getMessage().':'.PHP_EOL.
                $e->getFile().':'.$e->getLine().PHP_EOL.
                $e->getTraceAsString()
            );
        });
    })->create();
