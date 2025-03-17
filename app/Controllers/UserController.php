<?php

namespace App\Controllers;

use DateTime;
use App\Enums\Estado;
use App\Services\UserService;

class UserController extends BaseController
{
    private $userService;
    private $estados;

    public function __construct()
    {
        $this->estados = Estado::cases();
        $this->userService = new UserService();
    }


    public function userListView()
    {
        $token = $this->getToken();
        $response =  $this->userService->returnUsers($token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return view('templates/main', [
            'titulo' => 'Usuários',
            'conteudo' => view('usuario/user_list', ['usuarios' => $response['body']])
        ]);
    }


    public function userEditView($userId)
    {
        $token = $this->getToken();
        $response =  $this->userService->returnUser($userId, $token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return view('templates/main', [
            'titulo' => 'Edição de Usuário',
            'conteudo' => view(
                'usuario/user_edit',
                [
                    'usuario' => $response['body'],
                    'estados' => $this->estados
                ]
            )
        ]);
    }


    public function userDetailsView($userId)
    {
        $token = $this->getToken();
        $response =  $this->userService->returnUser($userId, $token);

        if ($this->isHttpStatusFailed($response['status'], HTTP_OK)) {
            return $this->redirectBackWithError($response);
        }

        return view('templates/main', [
            'titulo' => 'Detalhes de Usuário',
            'conteudo' => view('usuario/user_details', ['usuario' => $response['body']])
        ]);
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
            'email' => trim($this->request->getPost('email')) === "" ? null : $this->request->getPost('email'),
            'senha' => trim($this->request->getPost('senha')) === "" ? null : $this->request->getPost('senha'),
            'cpf' => trim($this->request->getPost('cpf')) === "" ? null : $this->request->getPost('cpf'),
            'nomeCompleto' => trim($this->request->getPost('nomeCompleto')) === "" ? null : $this->request->getPost('nomeCompleto'),
            'dataNascimento' => $this->formatarData($this->request->getPost('dataNascimento')),
            'telefone' => trim($this->request->getPost('telefone')) === "" ? null : $this->request->getPost('telefone'),
            'endereco' => [
                'logradouro' => trim($this->request->getPost('logradouro')) === "" ? null : $this->request->getPost('logradouro'),
                'numero' => trim($this->request->getPost('numero')) === "" ? null : $this->request->getPost('numero'),
                'bairro' => trim($this->request->getPost('bairro')) === "" ? null : $this->request->getPost('bairro'),
                'cep' => trim($this->request->getPost('cep')) === "" ? null : $this->request->getPost('cep'),
                'cidade' => trim($this->request->getPost('cidade')) === "" ? null : $this->request->getPost('cidade'),
                'estado' => trim($this->request->getPost('estado')) === "" ? null : $this->request->getPost('estado')
            ],
            'dadosBancarios' => [
                'banco' => trim($this->request->getPost('banco')) === "" ? null : $this->request->getPost('banco'),
                'conta' => trim($this->request->getPost('conta')) === "" ? null : $this->request->getPost('conta'),
                'agencia' => trim($this->request->getPost('agencia')) === "" ? null : $this->request->getPost('agencia'),
                'chavePix' => trim($this->request->getPost('chavePix')) === "" ? null : $this->request->getPost('chavePix')
            ],
            'perfil' => strtoupper($this->request->getPost('perfil'))
        ];
    }


    public function userRegistrationView()
    {
        return view('templates/main', [
            'titulo' => 'Cadastro de Usuário',
            'conteudo' => view('usuario/user_registration', ['estados' => $this->estados])
        ]);
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
            'email' => trim($this->request->getPost('email')) === "" ? null : $this->request->getPost('email'),
            'senha' => trim($this->request->getPost('senha')) === "" ? null : $this->request->getPost('senha'),
            'cpf' => trim($this->request->getPost('cpf')) === "" ? null : $this->request->getPost('cpf'),
            'nomeCompleto' => trim($this->request->getPost('nomeCompleto')) === "" ? null : $this->request->getPost('nomeCompleto'),
            'dataNascimento' => $this->formatarData($this->request->getPost('dataNascimento')),
            'telefone' => trim($this->request->getPost('telefone')) === "" ? null : $this->request->getPost('telefone'),
            'endereco' => [
                'logradouro' => trim($this->request->getPost('logradouro')) === "" ? null : $this->request->getPost('logradouro'),
                'numero' => trim($this->request->getPost('numero')) === "" ? null : $this->request->getPost('numero'),
                'bairro' => trim($this->request->getPost('bairro')) === "" ? null : $this->request->getPost('bairro'),
                'cep' => trim($this->request->getPost('cep')) === "" ? null : $this->request->getPost('cep'),
                'cidade' => trim($this->request->getPost('cidade')) === "" ? null : $this->request->getPost('cidade'),
                'estado' => trim($this->request->getPost('estado')) === "" ? null : $this->request->getPost('estado')
            ],
            'dadosBancarios' => [
                'banco' => trim($this->request->getPost('banco')) === "" ? null : $this->request->getPost('banco'),
                'conta' => trim($this->request->getPost('conta')) === "" ? null : $this->request->getPost('conta'),
                'agencia' => trim($this->request->getPost('agencia')) === "" ? null : $this->request->getPost('agencia'),
                'chavePix' => trim($this->request->getPost('chavePix')) === "" ? null : $this->request->getPost('chavePix')
            ],
            'perfil' => strtoupper($this->request->getPost('perfil'))
        ];
    }


    private function formatarData(?string $data): ?string
    {
        if (!$data) {
            return null;
        }

        $dataFormatada = DateTime::createFromFormat('Y-m-d', $data);

        return $dataFormatada ? $dataFormatada->format('d/m/Y') : null;
    }


    public function deleteUser($userId)
    {
        if ($this->request->getPost('_method') !== 'DELETE') {
            return redirect()->back()->with('error', 'Método não permitido!');
        }

        $this->userService->deleteUser($userId, $this->getToken());
        return redirect()->to('/user_list');
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
        return redirect()->back()->with('error', $errorMessage)->withInput();
    }
}
