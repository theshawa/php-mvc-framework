## `core\Database`

- Location: `/core/Database.php`
- Namespace: `core`
- Extended from: `\PDO`

Class representing a database connection, extending the `PDO` class.

### Constructor

#### `__construct(string $dsn, string $username, string $password)`

- Initializes a new database connection with the specified DSN, username, and password.
- **Parameters:**
    - `$dsn` (string): The Data Source Name (DSN) for the database connection.
    - `$username` (string): The username for the database connection.
    - `$password` (string): The password for the database connection.
- **Throws:**
    - `Exception`: If an error occurs during database connection establishment.

### Attributes

- Inherits all attributes from the `PDO` class.

_**Note:** Use this class to establish a connection to the database. It sets the error mode to throw exceptions for
easier error handling._
