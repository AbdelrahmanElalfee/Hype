<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';
require 'shared/config.php';

// 'This is the HTML message body <b>in bold!</b>'



$mail = new PHPMailer();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = "hypyeco@gmail.com";                     //SMTP username
$mail->Password   = "mcacponlvbbaugjg";                          //SMTP password
$mail->SMTPSecure = "ssl";                                      //Enable implicit TLS encryption
$mail->Port       = 465;
$mail->isHTML(true);                                  //Set email format to HTML
$mail ->CharSet ="UTF-8";
?>
