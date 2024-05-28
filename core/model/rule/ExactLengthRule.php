<?php

namespace core\model\rule;

class ExactLengthRule extends Rule
{
    private int $value;

    /**
     * @param string $value
     * @param string $errorMessage
     */
    public function __construct(string $value, string $errorMessage)
    {
        $this->value = $value;
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return strlen($text) === $this->value;
    }
}