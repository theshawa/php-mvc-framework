<?php

namespace core;

class Request
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strrpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return Utils::formatPath($path);
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        $body = [];
        if ($this->getMethod() == 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() == 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"] ?? "GET";
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->getMethod() === "GET";
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->getMethod() === "POST";
    }
}