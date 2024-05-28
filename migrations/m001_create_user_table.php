<?php

namespace migrations;

use core\Database;
use core\migration\Migration;


class m001_create_user_table implements Migration
{
    public function up(Database $db): void
    {
        $db->exec("CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstName VARCHAR(255) NOT NULL,
            lastName VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(512) NOT NULL
        );");
    }

    public function down(Database $db): void
    {
        $db->exec("DROP TABLE users;");
    }
}