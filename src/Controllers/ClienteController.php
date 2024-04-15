<?php

namespace App\Controllers;

class ClienteController extends Controller
{
    public function index()
    {
        $this->view('form', ['title' => 'Formulário - Cadastro de Clientes']);
    }

    public function store()
    {
        dd('entrou aqui');
    }
}
