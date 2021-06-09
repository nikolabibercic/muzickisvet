<?php

    require '../instances-of-objects.php';
    
    session_destroy();

    header('Location: ../index.php');

?>