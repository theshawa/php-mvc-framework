<?php

namespace core\model\rule;

class IsEmailRule extends Rule
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = "This field must be a valid email address")
    {
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return filter_var($text, FILTER_VALIDATE_EMAIL);
    }
}