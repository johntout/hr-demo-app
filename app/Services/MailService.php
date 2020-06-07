<?php

namespace App\Services;

use App\Mails\Mail;
use App\Interfaces\Services;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailService implements Services
{
    /**
     * @return MailService
     */
    public static function boot() :MailService
    {
        return new self();
    }

    /**
     * @param Mail $email
     * @return bool
     * @throws Exception
     */
    public function send(Mail $email) :bool
    {
        $mail = new PHPMailer(true);      // Passing `true` enables exceptions

        //Server settings
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;                       // Enable verbose debug output 2 = debug
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = env('MAILTRAP_HOST');             // Specify main and backup SMTP servers
        $mail->Username = env('MAILTRAP_USERNAME');   	// SMTP username
        $mail->Password = env('MAILTRAP_PASSWORD');     // SMTP password
        $mail->Port = env('MAILTRAP_PORT');             // TCP port to connect to
        $mail->SMTPAuth = true;

        //Recipients
        $mail->setFrom(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));
        $mail->addAddress($email->to());       // Add a recipient

        //Content
        $mail->isHTML(true);            // Set email format to HTML
        $mail->Subject = $email->subject();
        $mail->Body = $email->body();

        $mail->send();

        return true;
    }
}