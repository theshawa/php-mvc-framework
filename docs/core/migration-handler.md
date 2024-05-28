# `core\migration\MigrationsHandler`

- Location: `/core/migration/MigratiosnHandler.php`
- Namespace: `core\migration`

The `MigrationsHandler` class manages the application and reversal of database migrations in the MVC framework. This
class **requires a database connection**.

## Constructor

### `__construct(array $config)`

Initializes the `MigrationsHandler` object with the provided configuration.

- **Parameters:**
    - `$config` (`array`): An array containing configuration parameters.
        - `rootDir` (`string`, optional): The root directory of the application.
        - `database` (`array`, optional): An array containing database connection parameters (e.g., DSN, username,
          password).
        - **Example**
          ```php
          $handler = new MigrationsHandler([
              'rootDir' => __DIR__,
              'database' => $GLOBALS['database_config']
          ]);
            ```

## Methods

### `applyMigrations(): void`

Applies pending migrations to the database.

- **Throws:**
    - `Exception`: If an error occurs during the migration process.

### `reverseMigrations(): void`

Reverts applied migrations from the database.

- **Throws:**
    - `Exception`: If an error occurs during the migration reversal process.

## Private Methods

### `_log(string $message): void`

Logs a message with a timestamp.

### `_createMigrationTables(): void`

Creates the migrations table if it does not exist in the database.

### `_getAllMigrations(): array`

Retrieves the list of applied migrations from the migrations table.

- **Returns:**
    - An array containing the names of applied migrations.

### `_saveMigrations(array $migrations): void`

Saves the list of newly applied migrations to the migrations table.

- **Parameters:**
    - `$migrations` (`array`): An array containing the names of newly applied migrations.

### `_deleteMigrations(array $migrations): void`

Deletes the list of reversed migrations from the migrations table.

- **Parameters:**
    - `$migrations` (`array`): An array containing the names of reversed migrations.

### `_getMigrationInstance(string $migration): Migration`

Creates an instance of the specified migration class.

- **Parameters:**
    - `$migration` (`string`): The name of the migration file.
- **Returns:**
    - An instance of the migration class.

