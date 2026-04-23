<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            RateLimiter::for('api', function (Request $request) {
                return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
            });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global web middleware sudah otomatis di Laravel 11+

        // Daftarkan alias middleware kustom
        $middleware->alias([
            'guest.kai' => \App\Http\Middleware\GuestMiddleware::class,
            'admin'     => \App\Http\Middleware\AdminMiddleware::class,
            'kai.user'  => \App\Http\Middleware\UserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Konfigurasi exception handling jika diperlukan
    })->create();
