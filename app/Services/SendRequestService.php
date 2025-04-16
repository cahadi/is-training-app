<?php

namespace App\Services;

class SendRequestService
{
    public function ans($question, $answer)
    {
        $url = 'https://app.neuro-link.ru/ai/chat?' . http_build_query([
                'question' => $question,
                'answer' => $answer,
            ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        if ($response === false) {
            echo 'Ошибка cURL: ' . curl_error($ch);
        } else {
            echo 'Ответ сервера: ' . $response;
        }
        curl_close($ch);
    }
}
