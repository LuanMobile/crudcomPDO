<?php

namespace App\Models;

use PDO;

class  Cliente extends Database
{
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO clientes (name, cpf, email, data_nasc)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['name'],
            $data['cpf'],
            $data['email'],
            $data['data_nasc']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function fetchAll()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT * FROM clientes
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
