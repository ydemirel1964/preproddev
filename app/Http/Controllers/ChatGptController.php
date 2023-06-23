<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class ChatGptController extends Controller
{
    public function index()
    {

        $response = $this->sendChatMessage("PHP Nedir?");
        info($response);

    }

    function sendChatMessage($message)
    {
        $apiEndpoint = env("OPENAI_API_END_POINT");
        $apiKey = env("OPENAI_API_KEY");

        // API isteği için gerekli olan verileri ayarlayın
        $data = array(
            'messages' => array(
                array('role' => 'system', 'content' => 'You are'),
                array('role' => 'user', 'content' => $message)
            ),
            'model' => 'gpt-3.5-turbo'
        );

        // API isteğini yapılandırın
        $ch = curl_init($apiEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey
            )
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        // API isteğini gönderin
        $response = curl_exec($ch);

        // API isteğini sonlandırın
        curl_close($ch);

        // API yanıtını çözümleyin
        $responseData = json_decode($response, true);
        info($responseData);
        // Yanıtı döndürün
        return $responseData['choices'][0]['message']['content'];
    }
}