<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        health: '/up',
    )
    ->withMiddleware(
        function (Middleware $middleware) {
            $middleware->validateCsrfTokens(
                except: [
                    '*',
                ]
            );
        }
    )
    ->withExceptions(
        function (Exceptions $exceptions) {
            //
        }
    )->create();
