<?php
    session_start();
    
    require 'classes/Connection.php';
    require 'classes/ConnectionBuilder.php';
    require 'classes/User.php';
    require 'classes/Ad.php';
    require 'classes/Upload.php';


    $conn = new Connection();
    $user = new User($conn->connect());
    $ad = new Ad($conn->connect());
    $upload = new Upload($conn->connect());

?>