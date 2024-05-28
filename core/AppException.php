<?php

namespace core;

use Exception;

class AppException extends Exception
{
    function __construct(string $message)
    {
        parent::__construct($message, 500);
    }
}