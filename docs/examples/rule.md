# Rule Example

### Inbuilt Rule Usage

```php
use core\model\rule\IsEmailRule;

// Example usage of IsEmailRule
$emailRule = new IsEmailRule("This field must be a valid email address");
$email = "example@example.com";
if ($emailRule->validate($email)) {
    echo "Email is valid.";
} else {
    echo $emailRule->errorMessage;
}
```

### Create New Rule

```php
namespace core\model\rule;

// Custom rule to validate if a string contains only alphabetic characters
class IsAlphaRule extends Rule
{
    public function __construct(string $errorMessage = "This field must contain only alphabetic characters")
    {
        parent::__construct($errorMessage);
    }

    public function validate(string $text): bool
    {
        // Use regex to check if the text contains only alphabetic characters
        return preg_match('/^[a-zA-Z]+$/', $text) === 1;
    }
}

/**********************************/

use core\model\rule\IsAlphaRule;

// Example usage of IsAlphaRule
$alphaRule = new IsAlphaRule("Text does not contain only alphabetic characters.");
$text = "Hello";
if ($alphaRule->validate($text)) {
    echo "Text contains only alphabetic characters.";
} else {
    echo $alphaRule->errorMessage;
}
```