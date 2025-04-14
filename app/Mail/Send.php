<?php


namespace App\Mail;


class Send
{
    public function send($email, $pass)
    {
        $message = "Ваш пароль: $pass"; //добавить ссылку на сайт, после выкладывания на хостинг
        $to = $email;
        $from = "cahadi960@gmail.com";
        $subject = "Тема";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";

        mail($to, $subject, $message, $headers);
    }
}
