<?php 
$errors = '';
$myemail = 'makarand28k@gmail.com';//<-----Put Your email address here.
    

$name = $_POST['name']; 
$email = $_POST['email']; 
$tel = $_POST['tel']; 
$self = $_POST['self']; 
$message = $_POST['message'];


if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "Enquiry from Website: $form_email";
    $email_body = "You have received a new message. \n ". 
    " Here are the details:\n Name: $name \n Email: $email \n Contact Number: $tel \n Zindagi Mein Kya karte Ho: $self \n Message: $message "; 
    
    $headers .= "From: admin@unconventionalgyan.com \n"; 
                
    $headers .= "Cc: info@techknock.in \n";
 
    $headers .= "Reply-To: $email_address";
    
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
    <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>