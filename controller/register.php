<?php 
    require '../instances-of-objects.php';

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
?>