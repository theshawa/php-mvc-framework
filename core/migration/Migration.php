<?php

namespace core\migration;

use core\Database;
use Exception;

interface Migration
{

    /**
     * @param Database $db
     * @return void
     * @throws Exception
     */
    public function up(Database $db): void;


    /**
     * @param Database $db
     * @return void
     * @throws Exception
     */
    public function down(Database $db): void;
}