<?php

namespace core\model\rule;

class MinLengthRule extends Rule
{
    private int $value;

    /**
     * @param int $value
     * @param string $errorMessage
     */
    public function __construct(int $value, string $errorMessage)
    {
        $this->value = $value;
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return strlen($text) >= $this->value;
    }
}