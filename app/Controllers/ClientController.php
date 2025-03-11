<?php

namespace App\Controllers;

class ClientController extends BaseController
{
    private $userService;

    public function __construct() {}


    public function clientListView()
    {
        return view('templates/main', [
            'titulo' => 'Lista de Clientes',
            'conteudo' => view('cliente/client_list')
        ]);
    }
}
