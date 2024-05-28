# `core\migration\Migration`

- Location: `/core/migration/Migration.php`
- Namespace: `core\migration`

The `Migration` interface defines a contract for database migration classes in the PHP MVC framework. Migration classes
implement the `up()` and `down()` methods to define database schema changes that can be applied and reverted.

## Methods

### `up(Database $db): void`

Applies the migration to the database.

- **Parameters:**
    - `$db` (`Database`): An instance of the `Database` class representing the database connection.
- **Throws:**
    - `Exception`: If an error occurs during the migration process.

### `down(Database $db): void`

Reverts the migration from the database.

- **Parameters:**
    - `$db` (`Database`): An instance of the `Database` class representing the database connection.
- **Throws:**
    - `Exception`: If an error occurs during the migration rollback process.
