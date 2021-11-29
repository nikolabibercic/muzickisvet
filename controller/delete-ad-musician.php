<?php 
    require '../instances-of-objects.php';

    //Ako korisnik nije ulogovan salje ga na log im stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }else{
        $adId = $_GET['adId'];

        $ad->deleteAd($adId);

        header("Location: ../view-music-ads-musicians.php?adDeleted={$ad->adDeleted}");
    }
?>