<?php 
    require '../instances-of-objects.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
        
    //Ako je korisnik vec ulogovan salje ga na index stranicu
    if(isset($_SESSION['user'])){
        header('Location: ../index.php');
    }else{
        $user->registerUser($email,$password);

        header("Location: ../view-log-in.php?userRegistered={$user->userRegistered}");
    }
?>