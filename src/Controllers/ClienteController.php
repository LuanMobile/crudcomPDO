<?php

namespace App\Controllers;

use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function index()
    {
        $this->view('form', ['title' => 'Formulário - Cadastro de Clientes']);
    }

    public function store()
    {
        $data = $_POST;
        $clientes = ClienteService::create($data);

        // if ($clientes) return header('Location: /clientes');

        if (!$clientes) return dd("Criação do Usuário falhou !!!");
    }

    public function list()
    {
        $clientesFound = ClienteService::fetchAll();

        if (!$clientesFound) return 'Usuários não encontrado.';

        $this->view('clientes', ['title' => 'Lista de Clientes', 'clientes' => $clientesFound]);
    }
}
