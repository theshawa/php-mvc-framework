# `core\Response`

- Location: `/core/Response.php`
- Namespace: `core`

The `Response` class handles HTTP responses, including setting status codes, redirections, rendering views, and handling
errors.

## Properties

- `private ?string $layout`: The layout for rendering views, nullable.
- `private ?string $errorView`: The view used for rendering errors, nullable.
- `private ?string $errorLayout`: The layout used for rendering errors, nullable.

## Methods

### `setStatusCode(int $code): void`

Sets the HTTP status code.

- **Parameters:**
    - `$code` (int): The HTTP status code.

### `redirect(string $path): void`

Redirects to the given path.

- **Parameters:**
    - `$path` (string): The path to redirect to.
- **Throws:**
    - `RedirectException`: Exception thrown to handle redirection.

### `text(string $message): string`

Sets the response content type to `text/plain` and returns the provided message.

- **Parameters:**
    - `$message` (string): The message to return.
- **Returns:**
    - `string`: The plain text message.

### `json($content): string`

Sets the response content type to `application/json` and returns the JSON-encoded content.

- **Parameters:**
    - `$content`: The content to JSON-encode.
- **Returns:**
    - `string`: The JSON-encoded content.

### `render(string $view, array $data = []): string`

Renders the specified view with the given data. If a layout is set, the view is rendered within the layout.

- **Parameters:**
    - `$view` (string): The view to render.
    - `$data` (array): The data to pass to the view.
- **Returns:**
    - `string`: The rendered view content.
- **Throws:**
    - `AppException`: If the view or layout is not found or not readable.

### `setLayout(string $layout): void`

Sets the layout for rendering views.

- **Parameters:**
    - `$layout` (string): The layout name.

### `renderError(Exception $error): string`

Renders an error view for the given exception. If an error view or layout is set, it uses them; otherwise, it returns a
simple error message.

- **Parameters:**
    - `$error` (Exception): The exception to render.
- **Returns:**
    - `string`: The rendered error content.

### `setErrorView(?string $errorView): void`

Sets the view used for rendering errors.

- **Parameters:**
    - `$errorView` (?string): The error view name, nullable.

### `setErrorLayout(?string $errorLayout): void`

Sets the layout used for rendering errors.

- **Parameters:**
    - `$errorLayout` (?string): The error layout name, nullable.

## Private Methods

### `_renderOnlyView(string $view, array $data = []): string`

Renders the specified view with the given data, without a layout.

- **Parameters:**
    - `$view` (string): The view to render.
    - `$data` (array): The data to pass to the view.
- **Returns:**
    - `string`: The rendered view content.
- **Throws:**
    - `AppException`: If the view is not found or not readable.

### `_renderViewWithLayout(string $view, string $layout, array $data = []): string`

Renders the specified view within the given layout, with the provided data.

- **Parameters:**
    - `$view` (string): The view to render.
    - `$layout` (string): The layout to use.
    - `$data` (array): The data to pass to the view and layout.
- **Returns:**
    - `string`: The rendered content with layout.
- **Throws:**
    - `AppException`: If the view or layout is not found or not readable.
