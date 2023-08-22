<?php 
session_start();
$errors = '';
$myemail = 'poochtaach@unconventionalgyan.com';//<-----Put Your email address here.
    

$naam = $_POST['naam-batao']; 
$patta = $_POST['e-patta']; 
$aapka = $_POST['aapka-no']; 
$karte = $_POST['karte-kya-ho']; 
$kaam = $_POST['kaam-batao'];
$chabi = $_POST['kaam-batao'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdfdqUZAAAAAHNOHOzAnBQR3iQhSiwxVHd0ibkP';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);    

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {  


        if( empty($errors))
        {   
            if ($_POST['captchagen'] == $_SESSION['codegen']) {

                # code...
            
            $to = $myemail; 
            $email_subject = "Enquiry from Website: $form_email";
            $email_body = "You have received a new message. \n ". 
            " Here are the details:\n Name: $naam \n Email: $patta \n Contact Number: $aapka \n Zindagi Mein Kya karte Ho: $karte \n Message: $kaam "; 
    
            $headers .= "From: admin@unconventionalgyan.com \n"; 
                        
            $headers .= "Cc: deep.mody@gmail.com \n";
 
            $headers .= "Reply-To: $email_address";
    
            mail($to,$email_subject,$email_body,$headers);
            //redirect to the 'thank you' page
            header('Location: contact-form-thank-you.html');

            }
            echo "Captcha Image Error";
        }

    } else {
        echo "Captcha Error";
        echo $errors;
    }

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