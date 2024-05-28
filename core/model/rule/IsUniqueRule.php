<?php

namespace core\model\rule;

class IsUniqueRule extends Rule
{
    private string $matchingField;
    private string $className;

    /**
     * @param string $className
     * @param string $errorMessage
     * @param string $matchingField
     */
    public function __construct(string $className, string $matchingField, string $errorMessage)
    {
        $this->className = $className;
        $this->matchingField = $matchingField;
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        if (!class_exists($this->className)) {
            return false;
        }
        $instance = new ($this->className)();
        $record = $instance::findOne([$this->matchingField => $text], $this->className);
        return !$record;
    }
}