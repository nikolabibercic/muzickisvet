<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php 
    if(isset($_GET['adId'])) {$adId = $_GET['adId'];} else {$adId = '';}

    //Kupim sve slike jednog oglasa
    $images = $ad->selectAdImages($adId);

    //Pravim prazan niz
    $arrayImages = array();
    $counter = 0;

    //Prolazim kroz sve slike i ubacujem ih u niz
    foreach($images as $y){
        $arrayImages[$counter] = 'uploads/'.$y->image_path;
        $counter++;
    }
?>

<section class="singleAdDisplay container">
    <?php $result = $ad->selectAd($adId); foreach($result as $x):  ?>  
        <article class="ad">
            <hgroup>
                <p>ID oglasa: <?php echo $x->ad_id; ?></p>
                <p>Korisnik: <?php echo $x->korisnik; ?></p>
                <p>Postavljeno: <?php echo $x->postavljeno; ?></p>
            </hgroup>
            <?php  $result = $ad->selectAdFirstImage($x->ad_id); ?>
                <div id="slider">

                        <!--Ako oglas nema nijednu sliku prikazuje sliku no image-->
                        <?php if(!isset($result->image_path)): ?>
                            <button class="prew" id="prew" onclick=""><</button>
                            <div id="box">
                                <img src=<?php echo 'site-images/noImage.jpg' ?> alt="" >
                            </div>
                            <button class="next" id="next" onclick="">></button>
                        <?php else: ?>

                            <!--Ako oglas ima makar jednu sliku prikazuje prikazuje slike u slideru-->
                            <button class="prew" id="prew" onclick="prewImage()"><</button>
                            <div id="box">
                                <img src=<?php echo 'uploads/'.$result->image_path; ?> alt="" >
                            </div>
                            <button class="next" id="next" onclick="nextImage()">></button>
                        <?php endif; ?>

                </div>
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
                    <p id="price">Cena: <?php echo $x->price.' '.$x->currency; ?></p>
                </div>
            </div>
        </article>

    <?php endforeach; ?>
</section>

<script>
    //Slider
    var slider_content = document.getElementById('box');
    var image =<?php echo json_encode($arrayImages) ?>;
    console.log(image);
    var i = image.length;

    function nextImage(){
        if(i<image.length){
            i = i + 1;
        }else{
            i = 1;
        }
        slider_content.innerHTML = "<img src="+image[i-1]+">";
    }

    function prewImage(){
        if(i<image.length+1 && i>1){
            i = i-1;
        }else{
            i = image.length;
        }
        slider_content.innerHTML = "<img src="+image[i-1]+">";
    }
</script>

<?php require 'partials/footer.php'; ?>