<?php

use app\core\model\DbModel;

/**
 * @var ?DbModel $model
 */

$model = $model ?? null;

function buildField(?DbModel $model, string $name, string $label, string $placeholder, string $type = "text"): string
{
    $errorMessage = $model ? $model->errors[$name] ?? null : null;
    $value = $model ? $model->{$name} : "";
    return strtr('<div class="mb-3 col-12 col-md-6">
                <label for="%name" class="form-label">%label</label>
                <input type="%type" name="%name"
                       class="form-control %inputClassName"
                       id="%name" placeholder="%placeholder"
                       aria-describedby="%name validation%name"
                       value="%value"
                       >' . ($errorMessage ? '<div id="validation%name" class="invalid-feedback">' . $errorMessage . '</div>' : '') . '</div>', [
            '%type' => $type,
            '%placeholder' => $placeholder,
            '%label' => $label,
            '%name' => $name,
            '%inputClassName' => $errorMessage ? ' is-invalid' : ($model ? 'is-valid' : ''),
            '%value' => $value
        ]
    );
}