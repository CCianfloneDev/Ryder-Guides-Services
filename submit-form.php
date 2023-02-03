<?php
use PHPMailer\PHPMailer\PHPMailer;
  // Use PHPMailer library
  require "vendor/autoload.php";

if(isset($_POST['email'])) {
  
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  //$name = $_POST['name'];

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  //$email = $_POST['email'];

  $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
  //$phone = $_POST['phone'];
  
  $inquiry = filter_input(INPUT_POST, 'inquiry', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  print(strlen($name) . " " .strlen($email) . " ".strlen($phone)." ". strlen($inquiry));
  //$inquiry = $_POST['inquiry'];

  if(strlen($phone) === 10 & strlen($name) > 2 & strlen($email) > 0 & strlen($inquiry) > 2) {
    $to = "ryderguidesandservices@gmail.com"; // change this to your email address
    $subject = "Inquiry from Contact Form";
    $message = "Name: " . $name . "\n\nEmail: " . $email . "\n\nPhone: " . $phone . "\n\nInquiry: " . $inquiry;
    $headers = "From: " . $email;
  
    // todo:, change this to the corresponding hosting service and account.
    // Use Gmail's SMTP server
    $host = "ssl://smtp.someservice.com";
    $port = "42069";
    $username = "ryderguidesandservices"; // replace with your email associated with service 
    $password = "notmyrealpasswordlol"; // replace with your email password
  
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->Username = $username;
    $mail->Password = $password;
  
    $mail->SetFrom($email);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
  
    if(!$mail->Send()) {
      header("Location: contact.php?email-sent=false");
    } else {
      header("Location: contact.php?email-sent=true");
    }
} else {
  header("Location: contact.php?missing-fields=true");
}
}
?>
