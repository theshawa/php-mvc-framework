<?php

use core\Router;
use src\controllers\UserController;
use src\middleware\AuthMiddleware;

/**
 * @param  $router Router
 */
function initRoutes(Router $router): void
{
    // Configure routes here
    $router->get("/", "home");
    $router->get("/login", [UserController::class, 'login']);
    $router->post("/login", [UserController::class, 'login']);
    $router->get("/register", [UserController::class, 'register']);
    $router->post("/register", [UserController::class, 'register']);
    $router->post("/logout", [UserController::class, 'logout'], [AuthMiddleware::class]);
    $router->get("/profile", "profile", [AuthMiddleware::class]);
}