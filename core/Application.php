<?php

namespace core;

use Exception;

abstract class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public ?Database $db = null;
    public Session $session;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        self::$ROOT_DIR = $config['rootDir'] ?? "";

        if ($db = $config['database'] ?? false) {
            try {
                $this->db = new Database($db['dsn'] ?? "", $db['username'] ?? "", $db['password'] ?? "");
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        if (is_string($config['defaultLayout'] ?? false)) {
            $this->response->setLayout($config['defaultLayout']);
        }

        if (is_string($config['errorView'] ?? false)) {
            $this->response->setErrorView($config['errorView']);
        }

        if (is_string($config['errorLayout'] ?? false)) {
            $this->response->setErrorLayout($config['errorLayout']);
        } else {
            $this->response->setErrorLayout($config['defaultLayout'] ?? null);
        }
    }

    /**
     * @return void
     */
    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (RedirectException $e) {
            header("Location: {$e->getMessage()}");
            exit();
        } catch (AppException $e) {
            die($e->getMessage());
        } catch (Exception $e) {
            http_response_code($e->getCode());
            echo $this->response->renderError($e);
        }
    }

    /**
     * @param int $code
     * @return string
     */
    public static function getErrorMessage(int $code): string
    {
        $errors = [
            404 => 'Not Found',
            500 => 'Internal Server Error',
            403 => 'Forbidden',
            401 => 'Unauthorized',
        ];
        return $errors[$code] ?? "Unknown error";
    }

}