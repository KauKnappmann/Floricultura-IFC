<?php declare(strict_types=1);

namespace classes\user;

use phpDocumentor\Reflection\Types\Boolean;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
class Email
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function sendEmail(string $message, string $subject, string $altBody): bool
    {
      $fromHost = 'smtp.mailtrap.io';
      $from = 'ee623cb0f1f8e6';
      $fromPassword = '70054a338ba313';
      $fromPort = 2525;

      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = $fromHost;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Username = $from;
      $mail->Password = $fromPassword;
      $mail->Port = $fromPort;

      $to = $this->email;

    // $mail->setFrom($from, utf8_decode('Suporte - NeTree'));
    // $mail->addReplyTo($from, utf8_decode('Suporte - NeTree'));
      $mail->setFrom('info@mailtrap.io', 'Mailtrap');
      $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
      $mail->addAddress($to);

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = $altBody;
      $mail->CharSet = 'UTF-8';
      $mail->Encoding = 'base64';

      return !$mail->send() ? false : true;
    }
}