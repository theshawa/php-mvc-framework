<?php

namespace core\model;

use core\model\rule\Rule;

abstract class Model
{
    /**
     * @return array
     */
    abstract public function rules(): array;

    /**
     * @var array
     */
    public array $errors = [];

    /**
     * @param array $data
     * @return void
     */
    public function loadData(array $data = []): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        $this->errors = [];
        foreach ($this->rules() as $field => $rules) {
            $error = null;
            $value = $this->{$field};
            /**
             * @var Rule $rule
             */
            foreach ($rules as $rule) {
                if (!$rule->validate($value)) {
                    $error = str_replace("{value}", $value, $rule->errorMessage);
                    break;
                }
            }
            if ($error)
                $this->errors[$field] = $error;
        }
        return empty($this->errors);
    }

    /**
     * @param string $attr
     * @return bool
     */
    public function hasError(string $attr): bool
    {
        return array_key_exists($attr, $this->errors);
    }

    /**
     * @param string $attr
     * @param string $message
     * @return void
     */
    public function addError(string $attr, string $message): void
    {
        $this->errors[$attr] = $message;
    }
}