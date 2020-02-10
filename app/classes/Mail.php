<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setUp();
    }
    public function setUp()
    {
        // $this->mail->isSMTP();
        // $this->mail->Mailer = 'smtp';
        // $this->mail->SMTPAuth = true;
        // $this->mail->SMTPSecure = 'tls';

        // $this->mail->Host = getenv('SMTP_HOST');
        // $this->mail->Port = 587;


        // $environment = getenv('APP_ENV');
        // if ($environment == 'local') {
        //     $this->mail->SMTPDebug = 4;
        // }
        // $this->mail->Username = getenv('EMAIL_USERNAME');
        // $this->mail->Password = getenv('EMAIL_PASSWORD');

        // $this->mail->isHTML(true);
        // $this->mail->SingleTo = true;

        // //Sender Information 
        // $this->mail->setFrom(getenv('ADMIN_EMAIL'), getenv('ADMIN_STORE'));
        // $this->mail->FromName  = getenv('ADMIN_STORE');




        $this->mail->isSMTP();
        $this->mail->Host       = getenv('SMTP_HOST');
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = getenv('EMAIL_USERNAME');
        $this->mail->Password   = getenv('EMAIL_PASSWORD');
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port       = getenv('SMTP_PORT');


        $this->mail->setFrom(getenv('ADMIN_EMAIL'), getenv('ADMIN_STORE'));
        $environment = getenv('APP_ENV');
        if ($environment == 'local') {
            $this->mail->SMTPDebug = 4;
        }
    }
    public function send($data)
    {
        $body = '<html><head><title>Email Sending</title></head>
                <body><h1>Hello Mingalarbar</h1><button class="btn" id="btn">Getting Start</button></body>
                </html>';



        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], ['data' => $data['body']]);
        return $this->mail->send();
    }
}