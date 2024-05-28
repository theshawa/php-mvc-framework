## `core\DbModel`

- Location: `/core/model/DbModel.php`
- Namespace: `core\model`
- Abstract: **Yes**
- Extended from: `core\model\Model`

Abstract class representing a database model, extended from the `Model` class. Use this class to create models that
interact with the database, as most of the operations provided by this class require an active database connection.

### Methods

#### `findOne(array $where, string $className): DbModel|false`

- Retrieves a single record from the database based on the provided conditions.
- **Parameters:**
    - `$where` (array): Conditions for the query.
    - `$className` (string): Name of the class to instantiate.
- **Returns:**
    - An instance of `DbModel` or `false` if no record found.
- **Throws:**
    - `Exception`: If an error occurs.

#### `getAll(array $where = []): false|array`

- Retrieves all records from the database based on the provided conditions.
- **Parameters:**
    - `$where` (array): Conditions for the query (optional).
- **Returns:**
    - An array of objects representing database records or `false` if no records found.
- **Throws:**
    - `Exception`: If an error occurs.

#### `prepare(string $sql): PDOStatement`

- Prepares a SQL statement for execution.
- **Parameters:**
    - `$sql` (string): SQL query.
- **Returns:**
    - A `PDOStatement` object.
- **Throws:**
    - `Exception`: If the database connection is not set.

#### `save(): bool`

- Saves the current model instance into the database.
- **Returns:**
    - `true` on success.
- **Throws:**
    - `Exception`: If an error occurs.

### Abstract Methods

#### `tableName(): string`

- Returns the name of the database table associated with the model.
- **Returns:**
    - Table name as a string.

#### `primaryKey(): string`

- Returns the name of the primary key column in the database table.
- **Returns:**
    - Primary key column name as a string.

#### `attributes(): array`

- Returns an array of attribute names corresponding to the model's database columns.
- **Returns:**
    - An array of attribute names.