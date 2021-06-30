<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php require 'partials/search-form-musicians.php'; ?>

<?php 
    if(isset($_GET['search'])) {$search = $_GET['search'];} else {$search = '';}
    if(isset($_GET['city'])) {$city = $_GET['city'];} else {$city = '';}
    if(isset($_GET['1'])) {$tag1 = $_GET['1'];} else {$tag1 = '';}
    if(isset($_GET['2'])) {$tag2 = $_GET['2'];} else {$tag2 = '';}
    if(isset($_GET['3'])) {$tag3 = $_GET['3'];} else {$tag3 = '';}
    if(isset($_GET['4'])) {$tag4 = $_GET['4'];} else {$tag4 = '';}
    if(isset($_GET['5'])) {$tag5 = $_GET['5'];} else {$tag5 = '';}
    if(isset($_GET['6'])) {$tag6 = $_GET['6'];} else {$tag6 = '';}
    if(isset($_GET['7'])) {$tag7 = $_GET['7'];} else {$tag7 = '';}
    if(isset($_GET['8'])) {$tag8 = $_GET['8'];} else {$tag8 = '';}
    if(isset($_GET['9'])) {$tag9 = $_GET['9'];} else {$tag9 = '';}
    if(isset($_GET['categoryId'])) {$categoryId = $_GET['categoryId'];} else {$categoryId = '';}
?>     

<section class="adDisplay container">
    <?php $result = $ad->selectAdsMusicians($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId); foreach($result as $x):  ?>  
        <article class="ad">
            <hgroup>
                <p>ID oglasa: <?php echo $x->ad_id; ?></p>
                <p>Korisnik: <?php echo $x->korisnik; ?></p>
                <p>Postavljeno: <?php echo $x->postavljeno; ?></p>
            </hgroup>
            <?php  $result = $ad->selectAdFirstImage($x->ad_id); ?>
                <!--Ako oglas ima sliku prikazuje sliku-->
                <?php if(isset($result->image_path)): ?>
                    <img src=<?php echo 'uploads/'.$result->image_path; ?> alt="" >
                <?php else: ?>
                <!--Ako oglas nema sliku prikazuje sliku no image-->
                    <img src=<?php echo 'site-images/noImage.jpg' ?> alt="" >
                <?php endif; ?>
            <div>
                <div class="first">
                    <h2><a href="view-music-ad.php?adId=<?php echo $x->ad_id; ?>"><?php echo $x->title; ?></a></h2>
                    <p><?php echo $x->text; ?></p>
                </div>
                <!--Ako oglas ima tagove/atribute prikazuje ih--> 
                <div class="tags">
                    <?php  $resultTags = $ad->selectAdTags($x->ad_id); foreach($resultTags as $y):  ?> 
                        <p><?php echo '#'.$y->name ?></p>
                    <?php  endforeach;  ?> 
                </div>
                <div class="second">
                    <p id="seen">Viđeno: <?php echo $x->seen; ?></p>
                    <p id="city">Mesto/Grad: <?php echo $x->city; ?></p>
                    <!--<p id="price">Cena: <?php //echo $x->price.' '.$x->currency; ?></p>-->
                </div>
            </div>
        </article>

    <?php endforeach; ?>
</section>

<?php require 'partials/footer.php'; ?>