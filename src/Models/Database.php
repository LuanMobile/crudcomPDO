<?php

namespace App\Models;

use PDO;

class Database
{
    public static function getConnection()
    {
        $pdo = new PDO("pgsql:host=localhost;port=5432;dbname=tests", "postgres", "psswd");

        return $pdo;
    }
}
