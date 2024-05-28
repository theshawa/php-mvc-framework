<?php

namespace core\model\rule;

class IsNumberRule extends Rule
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = "This field must be a valid number")
    {
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return is_numeric($text);
    }
}