# `core\RedirectException`

- Location: `/core/RedirectException.php`
- Namespace: `core`
- Extended from: `\Exception`

The `RedirectException` class extends the built-in PHP `Exception` class to represent exceptions that are used for
redirecting requests in the framework.

## Constructor

### `__construct(string $path)`

Creates a new instance of the `RedirectException` class with the specified redirect path.

- **Parameters:**
    - `$path` (`string`): The URL path to redirect to.
