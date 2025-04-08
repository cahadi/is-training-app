<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
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
        $command = "node ai_request.js " . escapeshellarg($question) . " " . escapeshellarg($answer);
        $output = [];
        $returnVar = 0;

        exec($command, $output, $returnVar);

        //dd($returnVar);
        if ($returnVar !== 0) {
            Log::error('Ошибка при выполнении JavaScript скрипта', [
                'command' => $command,
                'output' => $output,
            ]);
            return 'Ошибка при обращении к JavaScript: ' . implode("\n", $output);
        }

        return implode("\n", $output);
    }
}
