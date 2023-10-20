<?php
$ime = $_POST['ime'];
$broj = $_POST['broj'];
$email = $_POST['email'];
$poruka = $_POST['poruka'];

$to      = 'lukaeric8@gmail.com';
$subject = 'Pitanje';
$message = 'poruka';
$headers = 'Od: '.$ime.'' . "\r\n" .
    'Reply-To: '.$ime.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>