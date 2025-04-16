<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class AiService
{
    public function ans($question, $answer)
    {
        $command = "python3 ai_request.py " . escapeshellarg($question) . " " . escapeshellarg($answer) . " 2>&1";

        $output = [];
        $returnVar = 0;

        exec($command, $output, $returnVar);

        Log::info('Команда выполнена', ['command' => $command, 'output' => $output]);

        if ($returnVar !== 0) {
            Log::error('Ошибка при выполнении Python скрипта', [
                'command' => $command,
                'output' => $output,
            ]);
            return 'Ошибка при обращении к Python: ' . implode("\n", $output);
        }

        $rating = trim(preg_replace('/.*Оценка:\s*(\d+)/', '$1', $output[0]));
        Log::info('Полученный рейтинг', ['rating' => $rating]);

        if (!is_numeric($rating)) {
            Log::error('Получен некорректный результат оценки', ['result' => $rating]);
            return 'Ошибка: Неверный формат оценки';
        }

        return intval($rating);
    }
}
