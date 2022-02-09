<?php

//vergeet niet de mailserver te configureren als dit op een localhost draait
if(isset($_POST['email']) && $_POST['email'] != "")
{
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $mailPath = ROOT_PATH . DIRECTORY_SEPARATOR . 'mail' ;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "ianvrijs@icloud.com";
        $mailPathFile = $mailPath . DIRECTORY_SEPARATOR . $name .'-'.time();
        $body = "";

        $body .= "From: ".$name. "\r\n";
        $body .= "Email: ".$email. "\r\n";
        $body .= "Message: ".$message. "\r\n";
        $fileMessage = json_encode($_POST) . "\r\n" . $body; 
        
        file_put_contents($mailPathFile, $fileMessage);
        mail($to, $subject, $body);
        $msg = 'Message sent.';
        header("Location: index.php?module=home&msg=".$msg );

    }
}



?>