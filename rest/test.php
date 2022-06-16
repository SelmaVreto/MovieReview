<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';


$transport = (new Swift_SmtpTransport('smtp.mailgun.org', 587))
  ->setUsername('postmaster@sandbox8d56413f3a0144cdaa8481eddffaf3da.mailgun.org')
  ->setPassword('32050aaa589883db903c1f5e497191af-50f43e91-888e6a41')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['selma@shfy.io'])
  ->setTo(['v.selmaaaa@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

print_r($result);
?>
