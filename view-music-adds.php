<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php require 'partials/search-form.php'; ?>

<section class="adDisplay container">
    <?php  $result = $ad->selectAds(); foreach($result as $x):  ?>  
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
                    <h2><?php echo $x->title; ?></h2>
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
                    <p id="price">Cena: <?php echo $x->price.' '.$x->currency; ?></p>
                </div>
            </div>
        </article>

    <?php endforeach; ?>
</section>

<?php require 'partials/footer.php'; ?>