<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==true): ?>
    <div class="messageSuccess">Uspešno ste se ulogovali.</div>
<?php endif; ?>
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==false): ?>
    <div class="messageUnsuccess">Logovanje nije uspelo!</div>
<?php endif; ?>

<!-- brisanje oglasa poruke -->
<?php if(isset($_GET['adDeleted']) && $_GET['adDeleted']==1): ?>
    <div class="messageSuccess">Oglas je uspešno obrisan.</div>
<?php endif; ?>

<?php if(isset($_GET['adDeleted']) && $_GET['adDeleted']==0): ?>
    <div class="messageUnsuccess">Brisanje oglasa nije uspelo!</div>
<?php endif; ?>

<?php require 'partials/search-form-ads.php'; ?>

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

    $number_of_ads = $ad->numberOfAds($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId);
    $results_per_page = $ad->results_per_page;
    $number_of_pages = ceil($number_of_ads[0]->number_of_ads / $results_per_page);

    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page - 1) * $results_per_page;

?>     



<section class="adDisplay containerAds">
    <?php $result = $ad->selectAds($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId,$this_page_first_result,$results_per_page); foreach($result as $x):  ?>  
        <article class="ad">

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
                    <h2><a href="partials/ad-prewiev-counter.php?adId=<?php echo $x->ad_id; ?>"><?php echo $x->title; ?></a></h2>

                </div>
                <!--Ako oglas ima tagove/atribute prikazuje ih--> 
                <div class="tags">
                    <?php  $resultTags = $ad->selectAdTags($x->ad_id); foreach($resultTags as $y):  ?> 
                        <p><?php echo '#'.$y->name ?></p>
                    <?php  endforeach;  ?> 
                </div>
                <div class="second">
                    <p id="seen">Viđeno: <?php echo $x->seen; ?></p>
                    <p id="city">Mesto: <?php echo $x->city; ?></p>
                    <!--<p id="price">Cena: <?php // echo $x->price.' '.$x->currency; ?></p>-->
                </div>
            </div>
            
            <?php if(isset($_SESSION['user'])): ?>
                <?php if($user->checkUserAdmin($_SESSION['user']->user_id) or $_SESSION['user']->user_id == $x->user_id): ?>
                    <div class="DeleteButton">
                        <a href="controller/delete-ad.php?adId=<?php echo $x->ad_id; ?>" id="deleteButton">Obriši</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </article>

    <?php endforeach; ?>

    <div class="pagination">
        <ul>
            <?php 
                for($page=1;$page<=$number_of_pages;$page++){       
                    echo '<li class=""> <a class="" href="index.php?page='.$page.'&search='.$search.'&city='.$city.'&tag1='.$tag1.'&tag2='.$tag2.'&tag3='.$tag3.'&tag4='.$tag4.'&tag5='.$tag5.'&tag6='.$tag6.'&tag7='.$tag7.'&tag8='.$tag8.'&tag9='.$tag9.'&categoryId='.$categoryId.' ">'.$page.'</a></li>';
                }
            ?>
        </ul>
    </div>

</section>

<?php require 'partials/footer.php'; ?>