<?php

namespace core;

class Session
{
    protected const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        session_start();
        $this->_initFlashMessages();
    }

    public function __destruct()
    {
        $this->_removeFlashMessages();
    }

    /**
     * @return void
     */
    private function _initFlashMessages(): void
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['removed'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    /**
     * @return void
     */
    private function _removeFlashMessages(): void
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            if ($flashMessage['removed']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $_SESSION[$key] ?? false;
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @return void
     */
    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * @param string $key
     * @param string $message
     * @return void
     */
    public function flashMessage(string $key, string $message): void
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'content' => $message,
            'createdAt' => time(),
            'removed' => false
        ];
    }

    /**
     * @param string $key
     * @return array|false
     */
    public function getFlashMessage(string $key): array|false
    {
        return $_SESSION[self::FLASH_KEY][$key] ?? false;
    }
}