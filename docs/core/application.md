## `core\Application`

- Location: `/core/Application.php`
- Namespace: `core`
- Abstract: **Yes**

Main class for creating an application.

### `core\Application::$app`

Static variable of the current instance of the application.

### Other Properties

- `public static string $ROOT_DIR`: The root directory of the application.
- `public static Application $app`: The instance of the application.
- `public Request $request`: The request object.
- `public Response $response`: The response object.
- `public Router $router`: The router object.
- `public ?Database $db`: The database connection object, nullable.
- `public Session $session`: The session object.

### Constructor Parameter: `$config` Object

This is a required array parameter.

#### Example `$config`

```php
[
    'rootDir' => __DIR__,
    'defaultLayout' => 'main',
    'database' => $GLOBALS['database_config'],
    'errorView' => '_error'
]
```

## Methods

### `run(): void`

- Runs the application.
- **Throws:**
    - `AppException`: If an application-level error occurs.
- **Actions:**
    - Resolves and handles the request.
    - Handles redirects and exceptions.
    - Renders error views if necessary.

### `getErrorMessage(int $code): string`

- Static Method
- Returns the error message corresponding to the given HTTP status code.
- **Parameters:**
    - `$code` (int): HTTP status code.
- **Returns:**
    - Error message string.

_**Hint**: Override this method to set custom error messages._