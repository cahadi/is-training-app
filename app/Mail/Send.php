<?php


namespace App\Mail;


class Send
{
    public function send($email, $pass)
    {
        $headers = 'From: cahadi960@gmail.com';
        mail($email, "Заявка с сайта", "Ваш пароль:".$pass ,$headers);


        header("Приглашение");
    }
}
