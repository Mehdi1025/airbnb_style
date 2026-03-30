<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Cloudways / reverse proxy : HTTPS détecté correctement (cookies secure, redirections)
        $middleware->trustProxies(at: '*');

        // Stripe envoie des POST sans jeton CSRF — signature vérifiée dans PaymentController::webhook
        $middleware->validateCsrfTokens(except: [
            'webhook/stripe',
        ]);

        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
            'is_locataire' => \App\Http\Middleware\IsLocataire::class,
        ]);

        $middleware->append(\Illuminate\Http\Middleware\HandleCors::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
