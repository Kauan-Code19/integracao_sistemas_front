<?php

namespace App\Services;

use Exception;

class UserService
{
    public function __construct()
    {
        $this->apiUrlLogin = getenv('API_URL_LOGIN');
        $this->apiUrlUserRegister = getenv('API_URL_USER_REGISTER');
        $this->apiUrlUserList = getenv('API_URL_USER_LIST');
    }


    public function login($data)
    {
        return $this->sendRequest('POST', $this->apiUrlLogin, $data);
    }


    public function returnUsers($token)
    {
        return $this->sendRequest('GET', $this->apiUrlUserList, [], $token);
    }


    public function registerUser($data, $token)
    {
        return $this->sendRequest('POST', $this->apiUrlUserRegister, $data, $token);
    }


    private function sendRequest($method, $url, $data = [], $token = null)
    {
        $ch = curl_init();

        $this->setCurlOptions($ch, $method, $url, $data, $token);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new Exception('Erro no cURL: ' . curl_error($ch));
        }

        curl_close($ch);

        return [
            'status' => $httpCode,
            'body' => json_decode($response, true)
        ];
    }


    private function setCurlOptions($ch, $method, $url, $data, $token = null)
    {
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $this->prepareHeaders($token),
        ]);

        $this->applyMethodOptions($ch, $method, $data);
    }


    private function prepareHeaders($token)
    {
        $headers = ['Content-Type: application/json'];

        if ($token) {
            $headers[] = 'Authorization: Bearer ' . $token;
        }

        return $headers;
    }


    private function applyMethodOptions($ch, $method, $data)
    {
        switch (strtoupper($method)) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;

            case 'GET':
                break;
        }
    }
}
