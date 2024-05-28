# `core\Request`

- Location: `/core/Request.php`
- Namespace: `core`

The `Request` class handles HTTP request data, including the request path, body, and method.

## Methods

### `getPath(): string`

Returns the request path, excluding query parameters.

- **Returns:**
    - `string`: The sanitized request path.

### `getBody(): array`

Returns the sanitized request body parameters.

- **Returns:**
    - `array`: The sanitized request body parameters.

### `getMethod(): string`

Returns the HTTP method of the request.

- **Returns:**
    - `string`: The HTTP method (e.g., `GET`, `POST`).

### `isGet(): bool`

Checks if the request method is `GET`.

- **Returns:**
    - `bool`: `true` if the request method is `GET`, `false` otherwise.

### `isPost(): bool`

Checks if the request method is `POST`.

- **Returns:**
    - `bool`: `true` if the request method is `POST`, `false` otherwise.
