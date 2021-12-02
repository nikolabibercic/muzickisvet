<?php 
    require '../instances-of-objects.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Provera da li user vec postoji
    $checkEmail = $user->checkEmail($email);
    if($checkEmail){
        header("Location: ../view-register.php?userExists=1");
    }else{
        if(isset($_POST['g-recaptcha-response'])){
            //Secret key
            $secret = '6LcSqpMbAAAAAJUGNFjDwRgDG1kVFn3Yb1HnHUn1';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){



                //Ako je korisnik vec ulogovan salje ga na index stranicu
                if(isset($_SESSION['user'])){
                    header('Location: ../index.php');
                }else{

                    $user->registerUser($name,$email,$password);

                    if($user->userRegistered=1){
                            $from = 'svetmuzicara@svetmuzicara.com';
                            $to = $email;
                            $subject = 'Svet muzicara username i password';
                            $message = 'Username: '.$email.' Password: '.$password;
                            $header = 'FROM: '.$from;

                            mail($to,$subject,$message,$header);
                        }

                    header("Location: ../view-log-in.php?userRegistered={$user->userRegistered}");
                }
            }else {
                header("Location: ../view-register.php?userRegistered=0");
            }
        }
    }
?>