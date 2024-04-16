<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        $viewPath = "../src/views/" . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new Exception("A view {$view} não existe");
        }

        $templates = new Engine('../src/views');
        echo $templates->render($view, $data);
    }
}
