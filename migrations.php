<?php

namespace app;

use core\migration\MigrationsHandler;
use Exception;

require_once __DIR__ . "/config/config.php";


/**
 * @throws Exception
 */
function run(): void
{
    global $argv;


    $handler = new MigrationsHandler([
        'rootDir' => __DIR__,
        'database' => $GLOBALS['database_config']
    ]);
    if (count($argv) > 1 && $argv[1] == 'revert') {
        $handler->reverseMigrations();
    } else {
        $handler->applyMigrations();
    }
}

try {
    run();
} catch (Exception $e) {
    die($e->getMessage());
}