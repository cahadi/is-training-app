<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AiService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function ans($question, $answer)
    {
        $command = "node ai_request.js " . escapeshellarg($question) . " " . escapeshellarg($answer) . " 2>&1";
        $output = [];
        $returnVar = 0;

        exec($command, $output, $returnVar);

        Log::info('Команда выполнена', ['command' => $command, 'output' => $output]);

        if ($returnVar !== 0) {
            Log::error('Ошибка при выполнении JavaScript скрипта', [
                'command' => $command,
                'output' => $output,
            ]);
            return 'Ошибка при обращении к JavaScript: ' . implode("\n", $output);
        }

        $rating = trim(preg_replace('/.*Оценка:\s*(\d+)/', '$1', $output[1]));
        Log::info('Полученный рейтинг', ['rating' => $rating]);
        /*
        if (!is_numeric($rating)) {
            Log::error('Получен некорректный результат оценки', ['result' => $rating]);
            return 'Ошибка: Неверный формат оценки';
        }*/

        return intval($rating);
    }
}
