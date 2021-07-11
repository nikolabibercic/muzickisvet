<!-- search form -->
<section class="searchForm container" id="searchForm">
    <form action="view-music-ads.php" method="GET" autocomplete="on">
        <div class="firstPartForm">
            <input type="search" id="search" name="search" placeholder="Pretraga oglasa">
            
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

            <select name="categoryId" id="categoryId">
                <option value="" class="form-control">Sve kategorije</option>
                <?php  $result = $ad->selectAdCategory(); foreach($result as $x):  ?>
                    <option value=<?php echo $x->ad_category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                <?php endforeach; ?>
            </select>

            <input type="search" id="city" name="city" placeholder="Mesto/grad">

            <button type="submit">Traži</button>

            <p id="unhideExtraSearch">Ukloni dodatnu pretragu</p>
        </div>
    </form>
</section>