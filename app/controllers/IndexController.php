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
        $data = [
            'to' => '8e0c928547-d105b7@inbox.mailtrap.io',
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