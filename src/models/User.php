<?php

namespace src\models;

use app\core\model\DbModel;
use core\model\rule\IsEmailRule;
use core\model\rule\IsUniqueRule;
use core\model\rule\MatchRule;
use core\model\rule\MinLengthRule;
use core\model\rule\RequiredRule;

class User extends DbModel
{
    public string $id = "";
    public string $firstName = "";
    public string $lastName = "";
    public string $email = "";

    public string $password = "";

    public string $confirmPassword = "";

    public function rules(): array
    {
        return [
            "firstName" => [new RequiredRule()],
            "lastName" => [new RequiredRule()],
            "email" => [new RequiredRule(), new IsEmailRule(), new IsUniqueRule(self::class, "email", "User with this email already exists")],
            "password" => [new RequiredRule(), new MinLengthRule(4, "Password must have at least 4 characters")],
            "confirmPassword" => [new RequiredRule(), new MatchRule($this, "password", "Password confirmation failed")],
        ];
    }

    public static function tableName(): string
    {
        return "users";
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    public static function attributes(): array
    {
        return [
            "id",
            "firstName",
            "lastName",
            "email",
            "password",
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}