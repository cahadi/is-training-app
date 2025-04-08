import { exec } from 'child_process';
import LlamaAI from 'llamaai';

const apiToken = '62404878-ec57-454b-82e6-1cb01933914d';
const llamaAPI = new LlamaAI(apiToken);

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

// попробовать через прокси
const vpnCommand = 'sudo openvpn --config /home/cahadi/www/is-training-app/app/Services/vpn/Whoer_Netherlands_nl.ovpn'; // Замените на вашу команду
const killVpnCommand = 'pkill openvpn'; // Простой способ остановить OpenVPN

console.log('Включение VPN...');

exec(vpnCommand, (error, stdout, stderr) => {
    if (error) {
        console.error(`Ошибка при подключении к VPN: ${error.message}`);
        return;
    }


    console.log(stdout);

    llamaAPI.run(apiRequestJson)
        .then(response => {
            console.log('API Response:', response);
            console.log(response.choices[0].text);
        })
        .catch(error => {
            if (error.response) {
                console.error('API Error:', error.response.data);
            } else {
                console.error('Unexpected Error:', error.message);
            }
        })
        .finally(() => {
            console.log('Отключение VPN...');
            exec(killVpnCommand, (killError, killStdout, killStderr) => {
                if (killError) {
                    console.error(`Ошибка при отключении VPN: ${killError.message}`);
                    return;
                }
                console.log('VPN отключен.');
            });
        });
});



import LlamaAI from 'llamaai';

const apiToken = '62404878-ec57-454b-82e6-1cb01933914d';
const llamaAPI = new LlamaAI(apiToken);

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
        console.log(response.choices[0].text);
    })
    .catch(error => {
        if (error.response) {
            console.error('API Error:', error.response.data);
        } else {
            console.error('Unexpected Error:', error.message);
        }
        process.exit(1);
    });
