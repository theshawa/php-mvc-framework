<?php

namespace src\middleware;

use core\Middleware;
use core\Request;
use core\Response;
use Exception;
use src\Application;

class AuthMiddleware implements Middleware
{
    /**
     * @inheritDoc
     */
    public function execute(Request $request, Response $response): ?string
    {
        if (Application::isGuest()) {
            throw new Exception("Authentication required", 401);
        }
        return null;
    }
}