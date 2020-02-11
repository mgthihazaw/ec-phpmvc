<?php

namespace App\Classes;

class ErrorHandler
{
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] An error occured in the {$error_file} on line {$error_line}:{$error_message}";
        $environment = getenv('APP_ENV');
        if ($environment == 'local') {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'Error',
                'view' => 'errors',
                'name' => 'ADMIN',
                'body' => $error
            ];
            ErrorHandler::emailAdmin($data)->outputFriendlyError();
        }
    }
    public function outputFriendlyError()
    {
        // ob_end_clean();
        view('errors/generics');
    }
    public static function emailAdmin($data)
    {
        $mail = new Mail;
        $mail->send($data);
        return new static;
    }
}