<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php require 'partials/search-form.php'; ?>

<section class="adDisplay container">
    <?php  $result = $ad->selectAds(); foreach($result as $x):  ?>  
        <hgroup>
            <p>ID oglasa: <?php echo $x->ad_id; ?></p>
        </hgroup>
        <div class="ad">
            <?php  $result = $ad->selectAdFirstImage($x->ad_id); foreach($result as $y):  ?>
                <img src=<?php echo 'uploads/'.$y->image_path; ?> alt="" >
            <?php endforeach; ?>
            <div>
                <div class="first">
                    <h2><?php echo $x->title; ?></h2>
                    <p><?php echo $x->text; ?></p>
                </div>
                <div class="second">
                    <p id="seen">Viđeno: <?php echo $x->seen; ?></p>
                    <p id="city">Mesto/Grad: <?php echo $x->city; ?></p>
                    <p id="price">Cena: <?php echo $x->price.' '.$x->currency; ?></p>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</section>

<?php require 'partials/footer.php'; ?>