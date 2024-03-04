<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.frutaliya.pp.ua';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '_mainaccount@frutaliya.pp.ua';                     //SMTP username
    $mail->Password   = '4Mfz67Ir7b';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('_mainaccount@frutaliya.pp.ua', 'SiteMailer');
    $mail->addAddress('superherozdes@gmail.com');     //Add a recipient
    $name = $_POST["name"];
    $email = $_POST["email"];
	$phone = $_POST["phone"];
    $select = $_POST["formSelect"];
    $message1 = $_POST["formMessage"];
	$email_template = "template_mail.html";

    $checkbox1 = "Ні";
    if ($_POST['checkbox1'] === 'yes')
    {
        $checkbox1 = "Так";
    }
    $checkbox2 = "Ні";
    if ($_POST['checkbox2'] === 'yes')
    {
        $checkbox2 = "Так";
    }

    $body = file_get_contents($email_template);
	$body = str_replace('%name%', $name, $body);
	$body = str_replace('%email%', $email, $body);
	$body = str_replace('%phone%', $phone, $body);
    $body = str_replace('%formSelect%', $select, $body);
	$body = str_replace('%formMessage%', $message1, $body);
    $body = str_replace("%checkbox1%", $checkbox1, $body);
    $body = str_replace("%checkbox2%", $checkbox2, $body);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New request!';
    $mail->Body    = $body;

    $mail->send();
    header('location: thank-you.html');
} catch (Exception $e) {
}