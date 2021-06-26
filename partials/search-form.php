<!-- search form -->
<section class="searchForm container" id="searchForm">
    <form action="view-music-adds.php" method="GET" autocomplete="on">
        <div class="firstPartForm">
            <input type="search" id="search" name="search" placeholder="Pretraga oglasa">
            <button type="submit">Traži</button>
        </div>
        <div class="secondPartForm">       
            <section class="checkBox" id="checkBox"> 
                <?php  $result = $ad->selectAdTag(); foreach($result as $x):  ?>
                    <div>
                        <input type="checkbox" name=<?php echo $x->tag_id; ?> value=<?php echo $x->tag_id; ?> >
                        <label for=<?php echo $x->name; ?>><?php echo ' '.$x->name; ?></label><br>
                    </div>
                <?php endforeach; ?>
            </section>
            <input type="search" id="city" name="city" placeholder="Mesto/grad">
            <p id="unhideExtraSearch">Ukloni dodatnu pretragu</p>
        </div>
    </form>
</section>