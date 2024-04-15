<?php

namespace App\Services;

use App\Models\Cliente;
use App\Utils\Validator;
use PDOException;

class ClienteService
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'name'      => $data['name']        ?? '',
                'cpf'       => $data['cpf']         ?? '',
                'email'     => $data['email']       ?? '',
                'data_nasc' => $data['data_nasc']   ?? ''
            ]);

            $cliente = Cliente::save($fields);

            if (!$cliente) return ['error' => 'Sorry, we could not create a client.'];

            return "Client created successfully!";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->errorInfo[0]];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function fetchAll()
    {
        try {
            $cliente = Cliente::fetchAll();

            if (!$cliente) return ['error' => 'Sorry, we could not create your account.'];

            return $cliente;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->errorInfo[0]];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
