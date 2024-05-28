# Controller Example

### Create New Controller

```php
<?php

namespace src\controllers;

use core\Application;
use core\Controller;
use core\Request;
use core\Response;
use Exception;

class HomeController extends Controller
{
    public function index(Request $request, Response $response): string
    {
        return $response->render("home", ['pageTitle' => 'Home']);
    }

    public function about(Request $request, Response $response): string
    {
        return $response->render("about", ['pageTitle' => 'About Us']);
    }

    public function contact(Request $request, Response $response): string
    {
        return $response->render("contact", ['pageTitle' => 'Contact Us']);
    }

    public function getArticles(Request $request, Response $response): string
    {
        try {
            // Fetch data from the database
            $result = Application::$app->db->execute("SELECT * FROM articles");

            // Process the fetched data (for example, convert it to an array)
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            // Render the data in a view
            return $response->render("data", ['pageTitle' => 'Articles', 'data' => $data]);
        } catch (Exception $e) {
            // If database operation fails, throw an exception
            throw new Exception("Failed to fetch data from the database: " . $e->getMessage());
        }
    }
}
```

### Example Usage

```php
// Add a route for articles
$router->get("/articles", [HomeController::class, 'articles']);
```