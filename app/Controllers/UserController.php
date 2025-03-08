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


    public function userListView()
    {
        $token = $this->getToken();
        $response =  $this->userService->returnUsers($token);

        if ($this->isReturnUsersFailed($response['status'])) {
            return $this->redirectBackWithError($response);
        }

        return view('usuario/user_list', ['usuarios' => $response['body']]);
    }


    private function getToken()
    {
        return session()->get('jwt_token');
    }


    private function isReturnUsersFailed($httpCode): bool
    {
        return $httpCode !== 200;
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

        return redirect()->to('/user_list');
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
