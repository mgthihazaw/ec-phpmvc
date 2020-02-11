<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController
{
    public function index()
    {
        view('home');
    }
    public function mailSend()
    {
        $datas = [
            'to' => 'thihazawww742@gmail.com',
            'subject' => 'Welcome to admin',
            'view' => 'welcome',
            'name' => 'Thihazaw',
            'body' => "Testing email template"
        ];
        echo "Inside Mail Sending";
        $mail = new Mail();
        if ($mail->send($data)) {
            echo "Success";
        } else {
            echo "Error";
        }
    }
}