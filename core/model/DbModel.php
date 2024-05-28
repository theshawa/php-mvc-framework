<?php

namespace app\core\model;

use core\Application;
use core\model\Model;
use Exception;
use PDO;
use PDOStatement;

abstract class DbModel extends Model
{
    /**
     * @param array $where
     * @param string $className
     * @return object|false
     * @throws Exception
     */
    public static function findOne(array $where, string $className): DbModel|false
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $clauses = implode(" AND ", array_map(fn($a) => "$a = :$a", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $clauses LIMIT 1");
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject($className);
    }

    /**
     * @param array $where
     * @return false|array
     * @throws Exception
     */
    public static function getAll(array $where = []): false|array
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $clauses = implode(" AND ", array_map(fn($a) => "$a = :$a", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName" . (!empty($clauses) ? " WHERE $clauses" : ""));
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ, static::class);
    }

    /**
     * @return string
     */
    abstract public static function tableName(): string;

    /**
     * @param string $sql
     * @return PDOStatement
     * @throws Exception
     */
    public static function prepare(string $sql): PDOStatement
    {
        if (!Application::$app->db) throw new Exception("Database not set", 500);
        return Application::$app->db->prepare($sql);
    }

    /**
     * @return string
     */
    abstract public static function primaryKey(): string;

    /**
     * @return bool
     * @throws Exception
     */
    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($a) => ":$a", $attributes);
        $statement = self::prepare("
        INSERT INTO $tableName 
            (" . implode(',', array_map(fn($a) => "`$a`", $attributes)) . ") 
            VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    /**
     * @return array
     */
    abstract public static function attributes(): array;
}