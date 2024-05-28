<?php

namespace core\migration;

use core\Database;
use Exception;
use PDO;

class MigrationsHandler
{
    /**
     * @var Database|null
     */
    private ?Database $db = null;
    /**
     * @var string
     */
    private static string $ROOT_DIR = "";


    /**
     * @param array $config
     * @throws Exception
     */
    function __construct(array $config)
    {
        self::$ROOT_DIR = $config['rootDir'] ?? "";
        $db = $config['database'] ?? false;
        if (is_array($db)) {
            $dsn = $db["dsn"] ?? "";
            $user = $db["username"] ?? "";
            $pw = $db["password"] ?? "";
            $this->db = new Database($dsn, $user, $pw);
        }
    }

    /**
     * @param string $message
     * @return void
     */
    private function _log(string $message): void
    {
        echo 'Migrations [' . date('Y-m-d H:i:s') . ']: ' . $message . PHP_EOL;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function applyMigrations(): void
    {
        if (!$this->db)
            throw new Exception("database not initialized");
        $this->_createMigrationTables();
        $appliedMigrations = $this->_getAllMigrations();

        $newlyAppliedMigrations = [];

        $files = scandir(self::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') continue;
            $instance = $this->_getMigrationInstance($migration);
            $this->_log("applying migration: '$migration'");
            $instance->up($this->db);
            $this->_log("applied migration: '$migration'");
            $newlyAppliedMigrations[] = $migration;
        }

        if (!empty($newlyAppliedMigrations)) {
            $this->_saveMigrations($newlyAppliedMigrations);
        } else {
            $this->_log("all migrations applied");
        }
    }


    /**
     * @return void
     * @throws Exception
     */
    public function reverseMigrations(): void
    {
        if (!$this->db)
            throw new Exception("database not initialized");
        $appliedMigrations = $this->_getAllMigrations();
        $newlyReversedMigrations = [];

        $files = scandir(self::$ROOT_DIR . '/migrations');
        $toReverseMigrations = array_intersect($files, $appliedMigrations);

        foreach ($toReverseMigrations as $migration) {
            $instance = $this->_getMigrationInstance($migration);
            $this->_log("reversing migration: '$migration'");
            $instance->down($this->db);
            $this->_log("reversed migration: '$migration'");
            $newlyReversedMigrations[] = $migration;
        }
        if (!empty($newlyReversedMigrations)) {
            $this->_deleteMigrations($newlyReversedMigrations);
        } else {
            $this->_log("all migrations reversed");
        }
    }

    /**
     * @return void
     */
    private function _createMigrationTables(): void
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    /**
     * @return array
     */
    private function _getAllMigrations(): array
    {
        $statement = $this->db->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN) ?? [];
    }

    /**
     * @param array $migrations
     * @return void
     */
    private function _saveMigrations(array $migrations): void
    {
        $valuesStr = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $this->db->prepare("INSERT INTO migrations (migration) VALUES $valuesStr;")->execute();
    }

    /**
     * @param array $migrations
     * @return void
     */
    private function _deleteMigrations(array $migrations): void
    {
        $valuesStr = implode(",", array_map(fn($m) => "'$m'", $migrations));
        $this->db->prepare("DELETE FROM migrations WHERE migration in ($valuesStr);")->execute();
    }


    /**
     * @param string $migration
     * @return Migration
     * @throws Exception
     */
    private function _getMigrationInstance(string $migration): Migration
    {
        $migrationPath = self::$ROOT_DIR . '/migrations/' . $migration;
        if (!is_readable($migrationPath)) {
            throw new Exception("$migrationPath is not readable");
        }
        require_once $migrationPath;
        $className = pathinfo($migration, PATHINFO_FILENAME);
        var_dump(__NAMESPACE__);
        $className = "\\migrations\\" . $className;
        if (!class_exists($className)) {
            throw new Exception("class: $className does not exist");
        }
        $instance = new  $className($this->db);
        if (!($instance instanceof Migration)) {
            throw new Exception("$className is not an instance of Migration");
        }
        return $instance;
    }
}