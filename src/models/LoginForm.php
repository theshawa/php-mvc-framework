<?php

namespace src\models;

use core\model\rule\IsEmailRule;
use core\model\rule\RequiredRule;
use Exception;
use src\Application;

class LoginForm extends User
{
    public function rules(): array
    {
        return [
            "email" => [new RequiredRule(), new IsEmailRule()],
            "password" => [new RequiredRule()],
        ];
    }

    /**
     * @throws Exception
     */
    public function login(): bool
    {
        $user = User::findOne(['email' => $this->email], User::class);
        if (!$user) {
            $this->addError('email', 'User not found');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is not valid');
            return false;
        }
        return Application::$app->login($user);
    }
}