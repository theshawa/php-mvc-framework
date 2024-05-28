<?php

namespace core\model\rule;

class IsPositiveRule extends Rule
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = "This field must be a positive number")
    {
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return (int)$text > 0;
    }
}