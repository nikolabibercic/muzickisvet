<?php require 'instances-of-objects.php'; ?>

<?php 
    //Ako korisnik nije ulogovan salje ga na na log in stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }

    //Ako nije admin salje ga na user stranicu
    if(!$user->checkUserAdmin($_SESSION['user']->user_id)){
        header('Location: view-user.php');
    }
?>

<?php require 'partials/header.php'; ?>

ADMIN STRANICA

<?php require 'partials/footer.php'; ?>