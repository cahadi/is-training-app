<?php

namespace App\Http\Requests\Answer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check(); // Проверяем, авторизован ли пользователь
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|string', // Добавляем правило для текста ответа
            'lesson_id' => 'required|integer|exists:lessons,id', // Добавляем правило для lesson_id
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Пожалуйста, введите текст ответа.',
            'body.string' => 'Текст ответа должен быть строкой.',
            'lesson_id.required' => 'ID урока обязателен.',
            'lesson_id.integer' => 'ID урока должен быть целым числом.',
            'lesson_id.exists' => 'Урок с таким ID не существует.',
        ];
    }
}
