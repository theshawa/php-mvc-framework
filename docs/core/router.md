# `core\Router`

- Location: `/core/Router.php`
- Namespace: `core`

The `Router` class is responsible for handling routing within the PHP MVC framework. It manages routes, middleware, and
resolves incoming requests to appropriate handlers.

## Constructor

### `__construct(Request $request, Response $response)`

Creates a new instance of the Router class.

- **Parameters:**
    - `$request` (`Request`): An instance of the Request class representing the incoming HTTP request.
    - `$response` (`Response`): An instance of the Response class representing the HTTP response to be sent.

## Methods

### `get(string $route, $handler, array $middleware = [])`

Registers a route for handling HTTP GET requests.

- **Parameters:**
    - `$route` (`string`): The route pattern.
    - `$handler`: The handler for the route. This can be a string representing a view, an array representing a
      controller and its method, or a callable function.
    - `$middleware` (`array`, optional): An array of middleware classes to be applied to the route.

### `post(string $route, $handler, array $middleware = [])`

Registers a route for handling HTTP POST requests. Parameters are similar to `get()` method.

### `delete(string $route, $handler, array $middleware = [])`

Registers a route for handling HTTP DELETE requests. Parameters are similar to `get()` method.

### `put(string $route, $handler, array $middleware = [])`

Registers a route for handling HTTP PUT requests. Parameters are similar to `get()` method.

### `resolve(): string`

Resolves the current request and executes the appropriate handler.

- **Returns:**
    - `string`: The response generated by the handler.

- **Throws:**
    - `Exception`: If the requested route is not found (HTTP 404 error).
    - `AppException`: If there is an issue with the application logic.

### `registerMiddleware(string $method, string $route, Middleware $middleware)`

Registers middleware for a specific route and HTTP method.

- **Parameters:**
    - `$method` (`string`): The HTTP method of the route.
    - `$route` (`string`): The route pattern.
    - `$middleware` (`Middleware`): An instance of the Middleware class to be registered.

- **Throws:**
    - `AppException`: If the given route is invalid.

## Private Methods

### `_addRoute(string $method, string $route, $handler, array $middleware): void`

Adds a route to the internal routes array.

- **Parameters:**
    - `$method` (`string`): The HTTP method of the route.
    - `$route` (`string`): The route pattern.
    - `$handler`: The handler for the route.
    - `$middleware` (`array`): An array of middleware classes to be applied to the route.
