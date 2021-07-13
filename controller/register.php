<?php 
    require '../instances-of-objects.php';

    if(isset($_POST['g-recaptcha-response'])){
        //Secret key
        $secret = '6LcSqpMbAAAAAJUGNFjDwRgDG1kVFn3Yb1HnHUn1';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Ako je korisnik vec ulogovan salje ga na index stranicu
            if(isset($_SESSION['user'])){
                header('Location: ../index.php');
            }else{

                $user->registerUser($name,$email,$password);

                header("Location: ../view-log-in.php?userRegistered={$user->userRegistered}");
            }
        }else {
            header('Location: ../view-register.php');
        }
    }  
?>