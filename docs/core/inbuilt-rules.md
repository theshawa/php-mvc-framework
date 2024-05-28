# Inbuilt Rules

The following classes are inbuilt validation rules that extend the `core\model\rule\Rule` abstract class. Each class
defines a specific validation rule with its own error message.

## `core\model\rule\ExactLengthRule`

Validates if the text is of an exact length.

- **Properties:**
    - `private int $value`: The exact length the text must be.
- **Constructor:**
    - `__construct(string $value, string $errorMessage)`
        - `$value`: The exact length.
        - `$errorMessage`: The error message if validation fails.
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text length is equal to `$value`.

## `core\model\rule\IsEmailRule`

Validates if the text is a valid email address.

- **Constructor:**
    - `__construct(string $errorMessage = "This field must be a valid email address")`
        - `$errorMessage`: The error message if validation fails (default message provided).
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text is a valid email address.

## `core\model\rule\IsNumberRule`

Validates if the text is a number.

- **Constructor:**
    - `__construct(string $errorMessage = "This field must be a valid number")`
        - `$errorMessage`: The error message if validation fails (default message provided).
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text is a number.

## `core\model\rule\IsPositiveRule`

Validates if the text is a positive number.

- **Constructor:**
    - `__construct(string $errorMessage = "This field must be a positive number")`
        - `$errorMessage`: The error message if validation fails (default message provided).
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text is a positive number.

## `core\model\rule\IsUniqueRule`

Validates if the text is unique in a specified database field. **Requires a database connection** to perform the
validation.

- **Properties:**
    - `private string $matchingField`: The field to check for uniqueness.
    - `private string $className`: The class name of the model to check against.
- **Constructor:**
    - `__construct(string $className, string $matchingField, string $errorMessage)`
        - `$className`: The class name of the model.
        - `$matchingField`: The field to check for uniqueness.
        - `$errorMessage`: The error message if validation fails.
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text is unique in the specified field. **Requires a database
      connection** to perform the check.

## `core\model\rule\MatchRule`

Validates if the text matches the value of another field in the model.

- **Properties:**
    - `private string $matchingField`: The field to match against.
    - `private DbModel $model`: The model instance.
- **Constructor:**
    - `__construct(DbModel $model, string $matchingField, string $errorMessage)`
        - `$model`: The model instance.
        - `$matchingField`: The field to match against.
        - `$errorMessage`: The error message if validation fails.
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text matches the value of the specified field.

## `core\model\rule\MaxLengthRule`

Validates if the text length is less than or equal to a maximum length.

- **Properties:**
    - `private int $value`: The maximum length.
- **Constructor:**
    - `__construct(int $value, string $errorMessage)`
        - `$value`: The maximum length.
        - `$errorMessage`: The error message if validation fails.
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text length is less than or equal to `$value`.

## `core\model\rule\MinLengthRule`

Validates if the text length is greater than or equal to a minimum length.

- **Properties:**
    - `private int $value`: The minimum length.
- **Constructor:**
    - `__construct(int $value, string $errorMessage)`
        - `$value`: The minimum length.
        - `$errorMessage`: The error message if validation fails.
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text length is greater than or equal to `$value`.

## `core\model\rule\RequiredRule`

Validates if the text is not empty.

- **Constructor:**
    - `__construct(string $errorMessage = "This field is required")`
        - `$errorMessage`: The error message if validation fails (default message provided).
- **Method:**
    - `validate(string $text): bool`: Returns `true` if the text is not empty.
