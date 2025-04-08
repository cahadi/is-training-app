import LlamaAI from 'llamaai';
import { HttpsProxyAgent } from 'https-proxy-agent';

// найти прокси сервер, пока пишет Unexpected Error: Error while making request: Invalid URL. и ReferenceError: WebSocket is not defined.
const agent = new HttpsProxyAgent('http://168.63.76.32:3128');
const socket = new WebSocket('ws://echo.websocket.org', { agent });

const apiToken = '62404878-ec57-454b-82e6-1cb01933914d';

socket.on('open', function ()
{
  console.log('"open" event!');

    const llamaAPI = new LlamaAI(apiToken, {
        axios: {
            httpAgent: agent,
            httpsAgent: agent
        }
    });

    const question = process.argv[2];
    const answer = process.argv[3];

    const apiRequestJson = {
        "messages": [
            {"role": "user", "content": "Hello!"},
            //{"role": "user", "content": `Оцени ответ на задание: "${question}". Ответ: "${answer}". Оценка должна быть от 0 до 100, где 100 - идеальный ответ. Выдай только числовую оценку и небольшое объяснение.`},
        ],
        "temperature": 0.2,
        "max_tokens": 50,
    };

    llamaAPI.run(apiRequestJson)
        .then(response => {
            console.log('API Response:', response);
            if (response.choices && response.choices.length > 0) {
                console.log(response.choices[0].text);
            } else {
                console.log('No choices found in the response.');
            }
        })
        .catch(error => {
            if (error.response) {
                console.error('API Error:', error.response.data);
            } else {
                console.error('Unexpected Error:', error.message);
            }
        });

    socket.close();
});
