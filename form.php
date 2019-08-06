<?php
$contact = $_POST["contact"];
$name = $_POST["name"];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($contact) { 
$clientEmail = $_POST["email"];
$clientMessage = $_POST["text"];
// define the form of the email the user will recieve
$email_from = $clientEmail;
$email_subject = "new email from $clientEmail";
$email_body = "Hello owner of this webiste, you have recieved a message from $name. Below you can find the message:                   $clientMessage";
// check if form contains data from the user
    if (empty($name)){
        echo '<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                  </head>
                  <body>
                  <div class="alert alert-danger text-center"><p>Please fill in your name.</p></div>
                  </body>';
        exit;
      } else if(empty($clientEmail)){
        echo '<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                  </head>
                  <body>
                  <div class="alert alert-danger text-center">Please fill in your email.<p></p></div>
                  </body>';
        exit;
      } else if(empty($clientMessage)){
        echo "*fill in your message*";
        exit;
      } else{
        $mail;
      }
      // sanitize the email so that the value is correct
      $sanitized_email = filter_var($clientEmail, FILTER_SANITIZE_EMAIL);
      if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
          $mail;
      } else{
        echo '<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                  </head>
                  <body>
                  <div class="alert alert-danger text-center"><p> This is not a valid email address</p></div>
                  </body>';
        exit;
      }
      // end email sanitizer. 
      // end formchecker from the user. 
      // Load Composer's autoloader
      require 'vendor/autoload.php';
      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);
      try {
          //Server settings
          $mail->isSMTP();                                            // Set mailer to use SMTP
          $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'wynkoerier@gmail.com';                     // SMTP username
          $mail->Password   = '12345!';                               // SMTP password
          $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to
          //Recipients
          $mail->setFrom($clientEmail, $name);
          $mail->addAddress('example@gmail.com', 'Jonas Dreessen');     // Add a recipient
          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $email_subject;
          $mail->Body    = $email_body;
          $mail->AltBody = $email_body;
          $mail->send();
          echo '<head>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          </head>
          <body>
          <div class="alert alert-danger text-center"><p> Thank you so much for filling in our contact form. We will get back to you as soon as possible!</p></div>
          </body>';
      } catch (Exception $e) {
        
          echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          </head>
          <body>
          <div class="alert alert-danger text-center"><p> Message could not be sent. Mailer Error:'{$mail->ErrorInfo}.'</div>
          </body>';
      }  
      };
      ?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>


