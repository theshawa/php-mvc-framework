<?php

namespace core\model\rule;

class RequiredRule extends Rule
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = "This field is required")
    {
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return !empty(trim($text));
    }
}