# Configuration Guide

This guide outlines the configuration process for the framework, covering essential files and settings required for
proper functionality.

## 1. Environment Setup

Ensure that you have an `.env` file in the root directory of your project. This file should contain environment-specific
configurations, including database credentials and other sensitive information.

```plaintext
# Example .env file

DB_DSN=mysql:host=localhost;dbname=mydatabase
DB_USER=root
DB_PASSWORD=password
```

## 2. Database Configuration

Navigate to the `/config/database.php` file. This file is responsible for loading the database credentials from
the `.env`
file and making them available globally.

### Database Credentials

- `dsn`: DSN string of your database.
- `username`: Username for your database account.
- `password`: Password for your database account.

If you don't have database credentials in your environment variables or want to configure them manually, modify
the `$GLOBALS['database_config']` variable in `/config/database.php`.

```php
$GLOBALS['database_config'] = [
    'dsn' => 'mysql:host=localhost;dbname=mydatabase',
    'username' => 'root',
    'password' => 'password'
];
```

## 3. Additional Configurations

You can add additional global configurations by creating new files in the /config directory. These configurations can
control various aspects of your application, such as enabling development mode or setting up third-party services.

### Example: Enabling Development Mode

Create a new file `/config/devmode.php` with the following content:

```php
// /config/devmode.php

$GLOBALS['dev_mode'] = true;
```

This configuration enables development mode, which may include additional logging, error reporting, or debugging
features.

## 4. Conclusion

By following these configuration steps, you can customize the framework to suit your project's requirements. Make sure
to review and adjust configurations according to your environment and application needs.