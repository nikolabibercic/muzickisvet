<?php 

    require '../instances-of-objects.php';

    $email = $_POST['email'];
    $text = $_POST['text'];
        
    $from = 'svetmuzicara@svetmuzicara.com';
    $to = 'nikolabibercic@gmail.com';
    $subject = 'Mejl poslao: '.$email;
    $message = 'Poruka: '.$text;
    $header = 'FROM: '.$email;

    if(mail($to,$subject,$message,$header)){
        header("Location: ../view-contact.php?messageSent=1");
    }else{
        header("Location: ../view-contact.php?messageSent=0");
    };

?>