import { OpenAI } from 'openai';

const key = process.env.AIML_API_KEY;
const api = new OpenAI({
    baseURL: 'https://api.aimlapi.com/v1',
    apiKey: key,
});


const question = process.argv[2];
const answer = process.argv[3];

const main = async () => {
    const result = await api.chat.completions.create({
        model: 'google/gemini-2.5-pro-preview',
        messages: [
            {
                role: 'user',
                content: `Оцени ответ на задание: "${question}". Ответ: "${answer}". Оценка должна быть только числом от 0 до 100, не добавляй ничего другого.`
            }
        ],
    });

    const message = result.choices[0].message.content;
    console.log(`Assistant: ${message}`);

    const ratingMatch = message.match(/(\d+)/);
    if (ratingMatch) {
        console.log(`Оценка: ${ratingMatch[1]}`);
        return ratingMatch[1];
    } else {
        console.error('Не удалось извлечь оценку из ответа');
        return 'Ошибка: Неверный формат оценки';
    }
};

main();


/*
// На локалке, нужно запускать через консоль

import ollama from 'ollama';

const question = process.argv[2];
const answer = process.argv[3];

const response = await ollama.chat({
    model: 'deepseek-r1',
    messages: [{
        role: 'user',
        content: `Оцени ответ на задание: "${question}". Ответ: "${answer}". Оценка должна быть только числом от 0 до 100, не добавляй ничего другого.`
    }],
});

console.log('Ответ от модели:', response.message.content);

const numericRating = response.message.content.match(/(\d+(\.\d+)?)/);

if (numericRating) {
    console.log('Оценка:', parseFloat(numericRating[0]));
} else {
    console.log('Ошибка: Неверный формат');
}
*/
