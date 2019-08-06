<?php
$contact = $_POST["contact"];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$name = filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
$text = filter_var($_POST['text'], FILTER_SANITIZE_EMAIL);
function Mailer() {
    require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "wynkoerier@gmail.com";                 
$mail->Password = "Captain1988!";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "wynkoerier@gmail.com";
$mail->FromName = "Full Name";

$mail->addAddress("rafswiggers@gmail.com", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

}



?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css.css">
    </head>
    <body>


<?php

if($text){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    if ($contact) {
        echo "<div class='alert alert-danger text-center'><p> Thank you so much for filling in our contact form. We will get back to you as soon as possible!</p></div>";
        Mailer();
    } else {
        echo "<div class='alert alert-danger text-center'><p>Thank you for your time and effort. We appreciate your feedback and will take it to heart! </p></div>";
    }
    } else {
        echo "<div class='alert alert-danger text-center'><p>I'm sorry, It seems your email address was not valid.</p></div>";
    }
    
    } else {
        echo "<div class='alert alert-danger text-center'><p>Please enter a question or a remark in the text field.</p></div>";
    }
    
    ?>



<div class="form-container">
<form action="form.php" method="post">
    <fieldset>
        <legend>Contact info</legend>
        <label for="name">Name:</label><br>
        <input name="name" id="name" accesskey="a" tabindex="1">
        <br>
        <label for="email">Email:</label>
        <br>
        <input name="email" id="email" accesskey="m" tabindex="2">
    </fieldset>
    <br>
    <fieldset>
        <legend> Reason for contacting</legend>
        <p>I would like to</p>
        <input type="checkbox" name="question" id="question" value="question" accesskey="q" tabindex="3">
        <label for="question">Ask a question</label><br>
        <input type="checkbox" name="suggest" id="suggest" value="suggest" accesskey="s" tabindex="4">
        <label for="suggest">Suggest a feature</label><br>
        <input type="checkbox" name="feedback" id="feedback" value="feedback" accesskey="e" tabindex="5">
        <label for="feedback">Submit feedback</label><br>

        <label for="text">How can we help you?</label><br>
        <textarea name="text" id="text" rows="5" cols="50">
            </textarea>

        <p>I would like to be contacted about my question.</p>
        <p><input type="radio" name="contact" id="Yes" value=1 accesskey="y" tabindex="6"> Yes </p>
        <p><input type="radio" name="contact" id="No" value=0 accesskey="n" tabindex="7"> No</p>
        <button type="submit">send</button>
    </fieldset>

</form>
</div>

