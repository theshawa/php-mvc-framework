# `core\AppException`

- Location: `core\AppException.php`
- Namespace: `core`
- Extended from: `\Exception`

The `AppException` class extends the built-in PHP `Exception` class to represent exceptions specific to application
logic in the framework.

## Constructor

### `__construct(string $message)`

Creates a new instance of the `AppException` class with the specified error message and a default HTTP status code of
500 (Internal Server Error).

- **Parameters:**
    - `$message` (`string`): The error message describing the exception.

