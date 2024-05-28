# `core\Middleware`

- Location: `/core/Middleware.php`
- Namespace: `core`

The `Middleware` interface defines a contract for implementing middleware components in the framework. Middleware
components intercept HTTP requests and responses to perform tasks such as authentication, logging, or modifying headers.

## Methods

### `execute(Request $request, Response $response): ?string`

Executes the middleware logic.

- **Parameters:**
    - `$request` (`Request`): An instance of the Request class representing the incoming HTTP request.
    - `$response` (`Response`): An instance of the Response class representing the HTTP response to be sent.
- **Returns:**
    - A string representing the response body, or `null` if the middleware does not modify the response.
- **Throws:**
    - `Exception`: If an error occurs during middleware execution.
