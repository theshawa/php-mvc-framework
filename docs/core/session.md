# `core\Session`

- Location: `/core/Session.php`
- Namespace: `core`

The `Session` class provides methods for managing session data and flash messages in the framework.

## Constructor

### `__construct()`

Initializes the session and initializes flash messages.

## Destructor

### `__destruct()`

Removes flash messages from the session upon destruction of the object.

## Methods

### `get(string $key): mixed`

Retrieves a session variable by key.

- **Parameters:**
    - `$key` (`string`): The key of the session variable.
- **Returns:**
    - The value of the session variable or `false` if the key is not found.

### `set(string $key, $value): void`

Sets a session variable.

- **Parameters:**
    - `$key` (`string`): The key of the session variable.
    - `$value`: The value to be stored in the session variable.

### `remove(string $key): void`

Removes a session variable by key.

- **Parameters:**
    - `$key` (`string`): The key of the session variable to be removed.

### `flashMessage(string $key, string $message): void`

Stores a flash message in the session.

- **Parameters:**
    - `$key` (`string`): The key under which to store the flash message.
    - `$message` (`string`): The content of the flash message.

### `getFlashMessage(string $key): array|false`

Retrieves a flash message from the session.

- **Parameters:**
    - `$key` (`string`): The key of the flash message.
- **Returns:**
    - An array containing the flash message content, creation time, and removal status, or `false` if the key is not
      found.

## Private Methods

### `_initFlashMessages(): void`

Initializes flash messages by marking them as removed.

### `_removeFlashMessages(): void`

Removes flash messages from the session.

