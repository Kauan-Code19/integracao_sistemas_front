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

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return view('usuario/user_list', ['usuarios' => $response['body']]);
    }


    public function userEditView($userId)
    {
        $token = $this->getToken();
        $response =  $this->userService->returnUser($userId, $token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return view('usuario/user_edit', ['usuario' => $response['body']]);
    }


    public function editUser()
    {
        if ($this->request->getPost('_method') !== 'PUT') {
            return redirect()->back()->with('error', 'Método não permitido!');
        }

        $userId = $this->getUserIdForPost();
        $data = $this->getUserEditData();
        $token = $this->getToken();
        $response = $this->userService->editUser($userId, $data, $token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return redirect()->to('/user_list');
    }


    private function getUserIdForPost()
    {
        return $this->request->getPost('id');
    }


    private function getUserEditData(): array
    {
        return [
            'email' => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
            'perfil' => strtoupper($this->request->getPost('perfil'))
        ];
    }


    public function userRegistrationView()
    {
        return view('usuario/user_registration');
    }


    public function registerUser()
    {
        $data = $this->getUserRegistrationData();
        $token = $this->getToken();
        $response = $this->userService->registerUser($data, $token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_CREATED)) {
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


    private function getToken()
    {
        return session()->get('jwt_token');
    }


    private function isHttpStatusFailed($httpCode, $expectedStatus)
    {
        return $httpCode !== $expectedStatus;
    }


    private function redirectBackWithError($response)
    {
        $errorMessage = isset($response['body']['error']) ? $response['body']['error']
            : 'Erro ao se conectar com o servidor.';
        return redirect()->back()->with('error', $errorMessage);
    }
}
