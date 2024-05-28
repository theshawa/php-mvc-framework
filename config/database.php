<?php

$envNotFound = !array_key_exists("DB_DSN", $_ENV)
    || !array_key_exists("DB_USER", $_ENV)
    || !array_key_exists("DB_PASSWORD", $_ENV);

$GLOBALS['database_config'] = $envNotFound ? null : [
    'dsn' => $_ENV["DB_DSN"],
    'username' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASSWORD"]
];