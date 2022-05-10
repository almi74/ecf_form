<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
// require 'vendor/autoload.php';

// if(isset($_POST['firstname']) && isset($_POST['familyname']) && isset($_POST['email']) && isset($_POST['message'])) {
// $firstname = filter_var ($_POST['firstname'], SANITIZE_STRING);
// $familyname = filter_var ($_POST['familyname'], SANITIZE_STRING);
// $email = filter_var ($_POST['email'], SANITIZE_STRING);
// $message = filter_var ($_POST['message'], SANITIZE_STRING);

if(isset($_POST['firstname']) && isset($_POST['familyname']) && isset($_POST['email']) && isset($_POST['message'])) {
    $firstname =$_POST['firstname'];
    $familyname = $_POST['familyname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//validation
//if(empty($firstname)){
// header("location: index.php?nofirstname");
// exit();
// }

// if(empty($familyname)){
//     header("location: index.php?nofamilyname");
//     exit();
// }

// if(empty($email)){
//         header("location: index.php?noemail");
//         exit();
// }

// if(empty($message)){
//     header("location: index.php?nomessage");
//     exit();
// }



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'user@example.com';                     //SMTP username
    // $mail->Password   = 'secret';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


// $phpmailer = new PHPMailer();
// $phpmailer->isSMTP();
// $phpmailer->Host = 'smtp.mailtrap.io';
// $phpmailer->SMTPAuth = true;
// $phpmailer->Port = 2525;
// $phpmailer->Username = '387bc121ff1a60';
// $phpmailer->Password = '947ae907c90232';


// $mail->isSMTP();
// $mail->Host = 'smtp.mailtrap.io';
// $mail->SMTPAuth = true;
// $mail->Port = 2525;
// $mail->Username = '387bc121ff1a60';
// $mail->Password = '947ae907c90232';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Port        = 465;
$mail->SMTPSecure   ="ssl";
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "alcmintest@gmail.com";
$mail->Password   = "exztdsiiwgwekvex";


    //Recipients
    $mail->setFrom ($email, $familyname);
    $mail->addAddress;('alcmintest@gmail.com');    
    $mail->addReplyTo($email, 'Nuestra respuesta');
   
//Body content
$body = "<p> Hola, Ha recibido el siguiente mensaje " . $message . " de " . $name . " para responder " . $email . "</p>";
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Solicitud de información ' . $firstname;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Tu mensaje ha sido enviado.';
} catch (Exception $e) {
   
    echo "No se ha podido enviar el correo. Intenta otra vez. Mailer Error: {$mail->ErrorInfo}";
}
}