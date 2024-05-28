<?php

namespace core;

use Exception;
use PDO;

class Database extends PDO
{

    /**
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @throws Exception
     */
    function __construct(string $dsn, string $username, string $password)
    {
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}