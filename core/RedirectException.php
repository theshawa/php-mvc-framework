<?php

namespace core;

use Exception;

class RedirectException extends Exception
{
    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct($path);
    }
}