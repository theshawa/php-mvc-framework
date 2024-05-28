# Model Example

```php
namespace app\models;

use core\model\Model;
use core\model\rule\IsEmailRule;
use core\model\rule\MaxLengthRule;
use core\model\rule\RequiredRule;

class UserModel extends Model
{
    public string $username;
    public string $email;
    public string $password;

    // Define validation rules for each attribute
    public function rules(): array
    {
        return [
            'username' => [
                new RequiredRule("Username is required."),
                new MaxLengthRule(50, "Username should not exceed 50 characters.")
            ],
            'email' => [
                new RequiredRule("Email is required."),
                new IsEmailRule("Invalid email format."),
                new MaxLengthRule(255, "Email should not exceed 255 characters.")
            ],
            'password' => [
                new RequiredRule("Password is required."),
                new MaxLengthRule(255, "Password should not exceed 255 characters.")
            ]
        ];
    }
}

// Example usage
$data = [
    'username' => 'john_doe', // Valid
    'email' => 'john@example.com', // Valid
    'password' => 'password123' // Valid
];

$userModel = new UserModel();
$userModel->loadData($data);

if ($userModel->validate()) {
    echo "Validation passed!";
} else {
    echo "Validation failed:";
    foreach ($userModel->errors as $attribute => $error) {
        echo "\n - $attribute: $error";
    }
}
```