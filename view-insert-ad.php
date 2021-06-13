<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php 
    //Ako korisnik nije ulogovan salje ga na na log in stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }
?>

<?php require 'partials/footer.php'; ?>