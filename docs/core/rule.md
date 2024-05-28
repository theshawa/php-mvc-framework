# `core\model\rule\Rule`

- Location: `/core/model/rule/Rule.php`
- Namespace: `core\model\rule`
- Abstract: **Yes**

The `Rule` class is an abstract class that defines a validation rule. It includes an error message and a method to
validate a given text.

## Properties

- `public string $errorMessage`: The error message for the validation rule.

## Constructor

### `__construct(string $errorMessage)`

Initializes the rule with an error message.

- **Parameters:**
    - `$errorMessage` (string): The error message for the validation rule.

## Abstract Methods

### `validate(string $text): bool`

Validates the given text against the rule.

- **Parameters:**
    - `$text` (string): The text to be validated.
- **Returns:**
    - `bool`: `true` if the text passes the validation rule, `false` otherwise.

### Check-out inbuilt rules [here](./inbuilt-rules.md).

_**Hint**: Feel free to create new `Rule`s as your wish._