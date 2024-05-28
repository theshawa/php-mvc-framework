<?php

namespace core;


use Exception;

class Response
{
    /**
     * @var string|null
     */
    private ?string $layout = null;
    private ?string $errorView = null;
    private ?string $errorLayout = null;

    /**
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }


    /**
     * @param string $path
     * @return void
     * @throws RedirectException
     */
    public function redirect(string $path): void
    {
        throw new RedirectException($path);
    }

    /**
     * @param string $message
     * @return string
     */
    public function text(string $message): string
    {
        header('Content-Type: text/plain');
        return $message;
    }

    /**
     * @param $content
     * @return string
     */
    public function json($content): string
    {
        header('Content-Type: application/json');
        return json_encode($content);
    }


    /**
     * @param string $view
     * @param array $data
     * @return string
     * @throws AppException
     */
    public function render(string $view, array $data = []): string
    {
        if ($this->layout) {
            return $this->_renderViewWithLayout($view, $this->layout, $data);
        }
        return $this->_renderOnlyView($view, $data);
    }


    /**
     * @param string $view
     * @param array $data
     * @return string
     * @throws AppException
     */
    private function _renderOnlyView(string $view, array $data = []): string
    {
        $viewPath = Application::$ROOT_DIR . "/views/" . $view . ".php";
        if (!file_exists($viewPath) || !is_readable($viewPath)) {
            throw new AppException("view \"$view.php\" does not exists or not readable");
        }
        foreach ($data as $param => $value) {
            $$param = $value;
        }
        ob_start();
        include_once $viewPath;
        return ob_get_clean();
    }


    /**
     * @param string $view
     * @param string $layout
     * @param array $data
     * @return string
     * @throws AppException
     */
    private function _renderViewWithLayout(string $view, string $layout, array $data = []): string
    {
        $viewPath = Application::$ROOT_DIR . "/views/" . $view . ".php";
        if (!file_exists($viewPath) || !is_readable($viewPath)) {
            throw new AppException("view \"$view.php\" does not exists or not readable");
        }

        $layoutPath = Application::$ROOT_DIR . "/views/layouts/" . $layout . ".php";
        if (!file_exists($layoutPath) || !is_readable($layoutPath)) {
            throw new AppException("layout \"$layout.php\" does not exists or not readable");
        }

        foreach ($data as $param => $value) {
            $$param = $value;
        }
        ob_start();
        include_once $layoutPath;
        $layoutContent = ob_get_clean();
        ob_start();
        include_once $viewPath;
        $viewContent = ob_get_clean();

        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    /**
     * @param string $layout
     * @return void
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @param Exception $error
     * @return string
     */
    public function renderError(Exception $error): string
    {

        if (!$this->errorView) {
            return "error {$error->getCode()} : {$error->getMessage()}\n";
        }
        try {
            if ($this->errorLayout) {
                return $this->_renderViewWithLayout($this->errorView, $this->errorLayout, ['error' => $error]);
            }
            return $this->_renderOnlyView($this->errorView, ['error' => $error]);
        } catch (Exception $e) {
            return "error {$e->getCode()} : {$e->getMessage()}\n";
        }
    }

    public function setErrorView(?string $errorView): void
    {
        $this->errorView = $errorView;
    }

    public function setErrorLayout(?string $errorLayout): void
    {
        $this->errorLayout = $errorLayout;
    }
}

