import { HfInference } from '@huggingface/inference';

const hf = new HfInference('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');

async function generateText(question, answer) {
    const prompt = `Оцени ответ на задание: "${question}". Ответ: "${answer}". Оценка должна быть только числом от 0 до 100, не добавляй ничего другого.`;

    try {
        const response = await hf.textGeneration({
            model: 'EleutherAI/gpt-j-6B',
            inputs: prompt,
            parameters: {
                max_length: 100,
                num_return_sequences: 1,
                temperature: 0.7,
                top_p: 0.9,
            },
        });

        console.log(response);
    } catch (error) {
        console.error('Ошибка при генерации текста:', error.message);
        if (error.response) {
            console.error('Детали ответа:', error.response.data);
        }
    }
}

const question = process.argv[2];
const answer = process.argv[3];
generateText(question, answer);
