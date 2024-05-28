# `core\model\Model`

- Location: `/core/model/Model.php`
- Namespace: `core\model`
- Abstract: **Yes**

The `Model` class serves as an abstract base class for all data models in the application. It provides methods for
loading data, validating the model according to specified rules, and handling validation errors.

## Properties

- `public array $errors`: An array to store validation error messages.

## Methods

### `rules(): array`

- **Description:** Abstract method that must be implemented by subclasses to specify validation rules for the model
  attributes.
- **Returns:** An array where the keys are attribute names and the values are arrays of `Rule` objects.

### `loadData(array $data = []): void`

- **Description:** Loads data into the model's attributes.
- **Parameters:**
    - `array $data`: Associative array of data to load into the model.
- **Returns:** `void`

### `validate(): bool`

- **Description:** Validates the model's attributes against the specified rules.
- **Returns:** `bool`
    - `true` if the model passes all validation rules.
    - `false` if there are validation errors.

### `hasError(string $attr): bool`

- **Description:** Checks if there is a validation error for a specific attribute.
- **Parameters:**
    - `string $attr`: The attribute name.
- **Returns:** `bool`
    - `true` if there is an error for the specified attribute.
    - `false` otherwise.

### `addError(string $attr, string $message): void`

- **Description:** Adds a validation error message for a specific attribute.
- **Parameters:**
    - `string $attr`: The attribute name.
    - `string $message`: The error message.
- **Returns:** `void`

### Lear more about above rules from [here](./inbuilt-rules.md).