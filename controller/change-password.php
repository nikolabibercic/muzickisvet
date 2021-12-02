<?php 
    require '../instances-of-objects.php';

    $email = $_POST['email'];
        
    //Ako je korisnik vec ulogovan salje ga na index stranicu
    if(isset($_SESSION['user'])){
        header('Location: ../index.php');
    }else{
        $user->changePassword($email);

        header("Location: ../view-log-in.php?passwordChanged={$user->passwordChanged}");
    }
?>