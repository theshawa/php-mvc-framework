# Migrations

Migrations are a way to manage database schema changes over time in an organized and version-controlled manner. In the
PHP MVC framework, migrations allow developers to define and apply database changes using PHP code rather than manual
SQL scripts.

## How Migrations Work

### Migration Files

Migration files are PHP classes located in the /migrations directory of the application. Each migration class
corresponds to a database schema change, such as creating a new table, adding columns, or modifying existing tables.

**Example Migration File:**

```php
<?php

namespace migrations;

use core\Database;
use core\migration\Migration;

class m001_create_user_table implements Migration
{
    public function up(Database $db): void
    {
        // Code to apply migration (e.g., creating a new table)
    }

    public function down(Database $db): void
    {
        // Code to revert migration (e.g., dropping the table)
    }
}

```

### Migration Handler

The `MigrationsHandler` class is responsible for managing the execution of migrations. It scans the `/migrations`
directory for migration files, applies pending migrations, and can also revert applied migrations.
Learn more about this class from [here](./core/migration-handler.md).

### Executing Migrations

Migrations are executed using a command-line script `migrations.php`. Developers can run the script to apply pending
migrations (`php migrations.php`) or revert applied migrations (`php migrations.php revert`).

## Sample Migration Workflow

1. **Create Migration File:** Developers create a new migration file in the `/migrations` directory to define a database
   schema change.
2. **Implement Migration Logic:** Inside the migration file, developers implement the `up()` method to apply the schema
   change and the `down()` method to revert it if needed.
3. **Run Migrations Script:** Developers execute the migrations script (`migrations.php`) from the command line to apply
   pending migrations or revert applied migrations based on the provided arguments.

## Migration Interface

The `Migration` interface defines the contract that migration classes must adhere to. It requires implementing `up()`
and `down()` methods, which are responsible for applying and reverting database schema changes, respectively.

Location: `/core/Migration.php`

```php
<?php

namespace core\migration;

use core\Database;
use Exception;

interface Migration
{
    /**
     * Applies the migration to the database.
     *
     * @param Database $db Database connection.
     * @throws Exception If an error occurs during migration.
     */
    public function up(Database $db): void;

    /**
     * Reverts the migration from the database.
     *
     * @param Database $db Database connection.
     * @throws Exception If an error occurs during migration reversal.
     */
    public function down(Database $db): void;
}
```

## File Naming Conventions

In the framework, migrations follow specific file naming conventions to maintain consistency and facilitate automated
handling. Adhering to these conventions ensures that migrations are recognized and executed correctly by the migration
handler.

### File Naming Format

1. **Prefix:** Migration files begin with a prefix that indicates their order of execution. This prefix consists of a
   numeric
   identifier followed by an underscore. For example, `m001_`, `m002_`, etc.

2. **Name:** After the prefix, the file name should describe the purpose of the migration using lowercase words
   separated by
   underscores. Avoid using spaces or special characters in the file name.

3. **Extension:** Migration files have the `.php` extension to denote that they are PHP scripts.

### Example File Name

Example Migration File Name: `m001_create_user_table.php`

In this example:

- `m001`: Prefix indicating the migration's order of execution.
- `create_user_table`: Descriptive name indicating the purpose of the migration (creating a user table).

### Benefits of File Naming Conventions

1. **Ordering:** Prefixing migrations with numeric identifiers ensures that they are executed in the correct order,
   preventing
   dependencies between migrations.

2. **Readability:** Descriptive file names make it easy for developers to understand the purpose of each migration
   without
   inspecting the code.

3. **Consistency:** Following a consistent naming convention across migrations enhances code organization and
   maintainability.

###### _**Note:** When creating migration files, ensure that they adhere to the file naming conventions mentioned above.
Failure to follow these conventions may result in the migration handler failing to recognize or execute the migrations
correctly._