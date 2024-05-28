<?php

namespace core\model\rule;

abstract class Rule
{
    public string $errorMessage;

    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    abstract public function validate(string $text): bool;
}