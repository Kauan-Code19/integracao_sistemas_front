<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController extends BaseController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }


    public function userRegistrationView()
    {
        return view('usuario/user_registration');
    }


    public function registerUser()
    {
        $data = $this->getUserRegistrationData();
        $token = session()->get('jwt_token');
        $response = $this->userService->registerUser($data, $token);

        if ($this->isRegisterFailed($response['status'])) {
            return $this->redirectBackWithError($response);
        }

        return redirect()->to('/home');
    }


    private function getUserRegistrationData(): array
    {
        return [
            'email' => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
            'perfil' => strtoupper($this->request->getPost('perfil'))
        ];
    }


    private function isRegisterFailed($httpCode): bool
    {
        return $httpCode !== 201;
    }


    private function redirectBackWithError($response)
    {
        $errorMessage = $response['body']['error'] ?? 'Erro ao conectar com a API.';
        return redirect()->back()->with('error', $errorMessage);
    }
}
