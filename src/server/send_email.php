<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../libraries/PHPMailer/Exception.php';
require '../libraries/PHPMailer/PHPMailer.php';
require '../libraries/PHPMailer/SMTP.php';
require '../libraries/PHPMailer/POP3.php';
require '../libraries/PHPMailer/OAuth.php';

class Email
{
  private $addressee = null;
  private $subject = null;
  private $message = null;

  public function __set($attr, $value)
  {
    $this->$attr = $value;
  }

  public function __get($attr)
  {
    return $this->$attr;
  }

  public function validMessage()
  {
    if (empty($this->addressee) || empty($this->subject) || empty($this->message)) {
      return false;
    }
    return true;
  }
}

$email = new Email();
$email->__set('addressee', $_POST['addressee']);
$email->__set('subject', $_POST['subject']);
$email->__set('message', $_POST['message']);
if (!$email->validMessage()) {
  header('Location: ../views/index.php?email=error1');
  die();
}

$mail = new PHPMailer(true);
try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'youremail@gmail.com';
  $mail->Password   = 'yourpassword';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom('youremail@gmail.com', 'User_1');
  $mail->addAddress($email->__get('addressee'), 'User_2');

  // Attachments       
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   

  // Content
  $mail->isHTML(true);
  $mail->Subject = $email->__get('subject');
  $mail->Body    = $email->__get('message');
  $mail->send();
  header('Location: ../views/index.php?email=success');
} catch (Exception $e) {
  header('Location: ../views/index.php?email=error2');
}
