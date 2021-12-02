<?php

require '../instances-of-objects.php';

if(isset($_FILES['file1'])) {$image1 = $_FILES['file1'];} else {$image1 = null;}
//$image1 = $_FILES['file1'];
$name = $_POST['name'];
$countryId = $_POST['countryId'];
$city = $_POST['city'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$userId = $_SESSION['user']->user_id;

//Ako korisnik nije ulogovan salje ga na log im stranicu
if(!isset($_SESSION['user'])){
    header('Location: ../view-log-in.php#logInForm');
}

/*
echo '<pre>';
var_dump($image1);
echo '</pre>';
*/

//Upload profilne slike u folder uploads
$filePath = $upload->uploadImage($image1,'../uploads/');
if(isset($filePath)){
    $user->updateUserImage($filePath,$userId);
}

$user->updateUser($name,$countryId,$city,$telephone,$password,$userId);

header("Location: ../view-user.php");

?>