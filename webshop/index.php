<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/functions.php';
require_once __DIR__.'/config.php';



$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

try {
    


  //check query is execute successfully or not
    // $email = 'whereyouwanttosendmail@gmail.com';
    //Server settings
    $mail->SMTPDebug = CONTACTFORM_PHPMAILER_DEBUG_LEVEL;
    $mail->isSMTP();
    $mail->Host = CONTACTFORM_SMTP_HOSTNAME;
    $mail->SMTPAuth = true;
    $mail->Username = CONTACTFORM_SMTP_USERNAME;
    $mail->Password = CONTACTFORM_SMTP_PASSWORD;
    $mail->SMTPSecure = CONTACTFORM_SMTP_ENCRYPTION;
    $mail->Port = CONTACTFORM_SMTP_PORT;

    // Recipients
    $mail->setFrom('cases.donotreply@gmail.com', 'Cases');
    $mail->addAddress($email);
    // $mail->addReplyTo('yourmail@gmail.com');

    // Content
    $mail->isHTML(true); //false if you don't use html.
    $mail->Subject = $emailtargy;
    
      
      //email body
      $mail->Body = $emailtorzs;
  


    if($mail->send()) {
        //mail not send
        // echo "mail send";
    }
    else {
        // echo "mail not send";
    }


} catch (Exception $e) {
    redirectWithError("An error occurred while trying to send your message: ".$mail->ErrorInfo);
}



?>