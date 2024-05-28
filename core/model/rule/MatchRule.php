<?php

namespace core\model\rule;

use app\core\model\DbModel;

class MatchRule extends Rule
{
    private string $matchingField;
    private DbModel $model;

    /**
     * @param DbModel $model
     * @param string $matchingField
     * @param string $errorMessage
     */
    public function __construct(DbModel $model, string $matchingField, string $errorMessage)
    {
        $this->model = $model;
        $this->matchingField = $matchingField;
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        return $text == $this->model->{$this->matchingField};
    }
}