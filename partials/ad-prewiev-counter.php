<?php require '../instances-of-objects.php'; ?>

<?php
    if(isset($_GET['adId'])) {$adId = $_GET['adId'];} else {$adId = '';}

    //Povecavam brojac pregleda oglasa za 1
    $ad->incrementSeen($adId);

    header("Location: ../view-music-ad.php?adId={$adId}");
?>