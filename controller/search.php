<?php 
    require '../instances-of-objects.php';

    $search = $_POST['search'];
    $city = $_POST['city'];
    $tag1 = $_POST['1'];
    $tag2 = $_POST['2'];
    $tag3 = $_POST['3'];
    $tag4 = $_POST['4'];
    $tag5 = $_POST['5'];
    $tag6 = $_POST['6'];
    $tag7 = $_POST['7'];
    $tag8 = $_POST['8'];
    $tag9 = $_POST['9'];
        
    //Ako korisnik nije ulogovan salje ga na log im stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }else{
        $ad->selectAds($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9);

        header("Location: ../view-log-in.php?userRegistered={$user->userRegistered}");
    }
?>