# DbModel Example

```php
namespace app\models;

use app\core\model\DbModel;use core\model\rule\IsUniqueRule;

class User extends DbModel
{
    public int $id;
    public string $username;
    public string $email;
    public string $password;

    // Define the table name
    public static function tableName(): string
    {
        return 'users';
    }

    // Define the primary key
    public static function primaryKey(): string
    {
        return 'id';
    }

    // Define the attributes of the model
    public static function attributes(): array
    {
        return ['username', 'email', 'password'];
    }
    
    // Define the rules of the model
    public function rules() {
        return [
            "username" => [new RequiredRule(),new IsUniqueRule()],
            "email" => [new RequiredRule(), new IsEmailRule(), new IsUniqueRule(self::class, "email", "User with this email already exists")],
            "password" => [new RequiredRule(), new MinLengthRule(4, "Password must have at least 4 characters")],
        ];
    }
}

// Example usage
$user = new User();
$data = [
    'username'=>'john_doe',
    'email'=>'john@example.com',
    'password'=>'password123',
]

$user->loadData($data);

if ($user->save()) {
    echo "User saved successfully!";
} else {
    echo "Failed to save user.";
}
```