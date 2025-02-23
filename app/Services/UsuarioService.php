<?php

namespace App\Services;

use Exception;

class UsuarioService
{
    public function __construct()
    {
        $this->apiUrlLogin = getenv('API_URL_LOGIN');
    }


    public function login($data)
    {
        return $this->sendRequest('POST', $this->apiUrlLogin, $data);
    }


    private function sendRequest($method, $url, $data = [])
    {
        $ch = curl_init();

        $this->setCurlOptions($ch, $method, $url, $data);

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


    private function setCurlOptions($ch, $method, $url, $data)
    {
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
    }
}
