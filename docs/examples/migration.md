# Migration Example

```php
<?php

// Location: "/migrations/m002_create_posts_table.php"

namespace migrations;

use core\Database;
use core\migration\Migration;

class m002_create_posts_table implements Migration
{
    public function up(Database $db): void
    {
        $db->exec("CREATE TABLE posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            author_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (author_id) REFERENCES users(id)
        );");
    }

    public function down(Database $db): void
    {
        $db->exec("DROP TABLE posts;");
    }
}
```

### Learn more about migrations from [here](../migrations.md).