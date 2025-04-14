const response = await fetch('https://api.aimlapi.com/v1/chat/completions', {
    method: 'POST',
    headers: {
        "Authorization": "Bearer 24042caac5e74740b13083fa37384efc",
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        "model": "meta-llama/Llama-3-70b-chat-hf",
        "messages": [
            {
                "role": "user",
                "content": "2+2",
                "name": "text"
            }
        ],
        "max_tokens": 1,
        "stop": "text",
        "stream": true,
        "stream_options": {
            "include_usage": true
        },
        "n": 1,
        "seed": 1,
        "top_p": 1,
        "top_k": 1,
        "temperature": 1,
        "repetition_penalty": 1,
        "logprobs": true,
        "echo": true,
        "min_p": 1,
        "presence_penalty": 1,
        "frequency_penalty": 1,
        "logit_bias": {
            "ANY_ADDITIONAL_PROPERTY": 1
        },
        "tools": [
            {
                "type": "function",
                "function": {
                    "description": "text",
                    "name": "text",
                    "parameters": null
                }
            }
        ],
        "tool_choice": "none",
        "response_format": {
            "type": "text"
        }
    })
});

const data = await response.json();
/*import { OpenAI } from 'openai';

const api = new OpenAI({
    baseURL: 'https://api.aimlapi.com/v1',
    apiKey: '24042caac5e74740b13083fa37384efc',
});

const question = process.argv[2];
const answer = process.argv[3];

const main = async () => {
    try {
        const result = await api.chat.completions.create({
            model: 'meta-llama/Llama-3-70b-chat-hf',
            messages: [
                {
                    role: 'user',
                    content: `Оцени ответ на задание: "${question}". Ответ: "${answer}". Оценка должна быть только числом от 0 до 100, не добавляй ничего другого.`
                }
            ],
            max_tokens: 1,
            stop: ["text"],
            stream: false,
            n: 1,
            top_p: 1,
            top_k: 1,
            temperature: 1,
            repetition_penalty: 1,
            presence_penalty: 1,
            frequency_penalty: 1,
            logit_bias: {
                "ANY_ADDITIONAL_PROPERTY": 1
            },
            tools: [
                {
                    type: "function",
                    function: {
                        description: "text",
                        name: "text",
                        parameters: null
                    }
                }
            ],
            tool_choice: "none",
            response_format: {
                type: "text"
            }
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
    } catch (error) {
        console.error("Ошибка при выполнении запроса:", error);
    }
};

main();
*/
