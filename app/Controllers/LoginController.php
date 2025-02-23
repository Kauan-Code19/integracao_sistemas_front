<?php

namespace App\Controllers;

use App\Services\UsuarioService;

class LoginController extends BaseController
{
    private $usuarioService;

    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }


    public function index(): string
    {
        return view('autenticacao/login');
    }


    public function logar()
    {
        $data = $this->getLoginData();
        $response = $this->usuarioService->login($data);

        if ($this->isLoginFailed($response['status'])) {
            return $this->redirectBackWithError($response);
        }

        $this->storeToken($response['body']['token'] ?? null);
        return redirect()->to('/home');
    }


    private function getLoginData(): array
    {
        return [
            'email' => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
        ];
    }


    private function isLoginFailed($httpCode): bool
    {
        return $httpCode !== 200;
    }


    private function redirectBackWithError($response)
    {
        $errorMessage = $response['body']['error'] ?? 'Erro ao conectar com a API.';
        return redirect()->back()->with('error', $errorMessage);
    }


    private function storeToken($token): void
    {
        session()->set('jwt_token', $token);
    }
}
