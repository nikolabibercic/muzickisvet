<!-- search form -->
<section class="searchForm container" id="searchForm">
    <form action="controller/register.php" method="POST" autocomplete="on">
        <input type="search" name="search" placeholder="Pretraga oglasa">
        <button type="submit">Traži</button>
        <section class="checkBox"> 
            <?php  $result = $ad->selectAdTag(); foreach($result as $x):  ?>
                <div>
                    <input type="checkbox" name=<?php echo $x->name; ?> value=<?php echo $x->tag_id; ?> >
                    <label for=<?php echo $x->name; ?>><?php echo ' '.$x->name; ?></label><br>
                </div>
            <?php endforeach; ?>
        </section>
    </form>
</section>