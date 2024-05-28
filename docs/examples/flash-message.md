# Flash Message Example

```php
// Assuming Application::$app is an instance of core\Application
// To access the session object
$session = \core\Application::$app->session;

// Set a flash message
$session->flashMessage('success', 'Your action was successful!');

// Retrieve and display the flash message
$flashMessage = $session->getFlashMessage('success');
if ($flashMessage) {
    echo $flashMessage['content'];
} else {
    echo "No flash message available.";
}
```