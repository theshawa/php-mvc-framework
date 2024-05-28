<?php

namespace core;


use Exception;

class Router
{
    private array $routes = [];
    private Request $request;
    private Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param string $method
     * @param string $route
     * @param $handler
     * @param array $middleware
     * @return void
     */
    private function _addRoute(string $method, string $route, $handler, array $middleware): void
    {
        $this->routes[$method][Utils::formatPath($route)] = [
            'handler' => $handler,
            'middleware' => $middleware
        ];
    }

    /**
     * @param string $route
     * @param $handler
     * @param array $middleware
     * @return void
     */
    public function get(string $route, $handler, array $middleware = []): void
    {
        $this->_addRoute("GET", $route, $handler, $middleware);
    }

    /**
     * @param string $route
     * @param $handler
     * @param array $middleware
     * @return void
     */
    public function post(string $route, $handler, array $middleware = []): void
    {
        $this->_addRoute("POST", $route, $handler, $middleware);
    }

    /**
     * @param string $route
     * @param $handler
     * @param array $middleware
     * @return void
     */
    public function delete(string $route, $handler, array $middleware = []): void
    {
        $this->_addRoute("DELETE", $route, $handler, $middleware);
    }

    /**
     * @param string $route
     * @param $handler
     * @param array $middleware
     * @return void
     */
    public function put(string $route, $handler, array $middleware = []): void
    {
        $this->_addRoute("PUT", $route, $handler, $middleware);
    }

    /**
     * @throws RedirectException
     * @throws AppException
     * @throws Exception
     */
    public function resolve(): string
    {
        $method = $this->request->getMethod();
        $action = $this->request->getPath();
        $route = $this->routes[$method][$action] ?? false;

        if (!$route) {
            throw new Exception(Application::getErrorMessage(404), 404);
        }

        $handler = $route['handler'];
        $middlewares = $route['middleware'];

        foreach ($middlewares as $middlewareClassName) {
            if (!class_exists($middlewareClassName)) {
                throw new AppException("invalid middleware: \"$middlewareClassName\"");
            }
            $middleware = new $middlewareClassName();
            if (!($middleware instanceof Middleware)) {
                throw new AppException("invalid middleware: \"$middlewareClassName\"");
            }
            $result = $middleware->execute($this->request, $this->response);
            if (!is_null($result)) {
                return $result;
            }
        }

        if (is_string($handler)) {
            // render view
            return $this->response->render($handler);
        }

        if (is_array($handler)) {
            $className = $handler[0];
            if (!class_exists($className)) {
                throw new AppException("invalid controller: \"$className\"");
            }

            $controllerMethodName = $handler[1];
            if (!method_exists($className, $controllerMethodName)) {
                throw new AppException("invalid controller method: \"$className->$controllerMethodName\"");
            }

            $controller = new $className();
            if (!($controller instanceof Controller)) {
                throw new AppException("invalid controller: \"$className\"");
            }

            $result = call_user_func([$controller, $controllerMethodName], $this->request, $this->response);
            if (is_null($result)) {
                throw new AppException("controller method:\"$className->$controllerMethodName\" must return a response");
            }
            return $result;
        }

        if (is_callable($handler)) {
            $result = call_user_func($handler, $this->request, $this->response);
            if (is_null($result)) {
                throw new AppException("handler must return a response");
            }
            return $result;
        }

        throw new Exception(Application::getErrorMessage(403), 403);
    }

    /**
     * @throws AppException
     */
    public function registerMiddleware(string $method, string $route, Middleware $middleware): void
    {
        $currentRoute = $this->routes[$method][$route];
        if (!is_array($currentRoute)) {
            throw new AppException("invalid route: \"$route\"");
        }
        $currentMiddleware = $currentRoute['middleware'];
        $currentMiddleware[] = $middleware;
        $this->routes[$method][$route] = [
            'handler' => $currentRoute['handler'],
            'middleware' => $currentMiddleware
        ];
    }
}