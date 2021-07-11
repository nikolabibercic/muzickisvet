<?php require 'instances-of-objects.php'; ?>

<?php 
    //Ako korisnik nije ulogovan salje ga na na log in stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }

    //Ako je admin salje ga na admin stranicu
    if($user->checkUserAdmin($_SESSION['user']->user_id)){
        header('Location: view-admin.php');
    }
?>

<?php require 'partials/header.php'; ?>

<?php
    $result = $user->selectUser($_SESSION['user']->user_id);
?>

<section class="userForm container" id="userForm">
    <h2>Korisnička stranica</h2>
    <form action="controller/user-form.php" method="POST" autocomplete="on" enctype="multipart/form-data">
        <h3>Profilna slika</h3>

                        <!--Ako korisnik nema nijednu sliku prikazuje sliku no image-->
                        <?php if(!isset($result->profile_image)): ?>
                                <img src=<?php echo 'site-images/noImage.jpg' ?> alt="" >
                        <?php else: ?>
                            <!--Ako korisnik ima sliku prikazuje prikazuje sliku-->
                                <img src=<?php echo 'uploads/'.$result->profile_image; ?> alt="" >
                        <?php endif; ?>
        <h3>Promeni profilnu sliku</h3>
        <input class="uploadImage" type="file" name="file1">
        <h3>Ime:</h3>
        <input type="text" name="name" placeholder="Ime" value="<?php echo $result->name; ?>" >
        <h3>Država:</h3>
        <select name="countryId" id="">
            <option value=<?php echo $result->country_id; ?> selected="selected"><?php echo $result->country_name; ?></option>
            <?php  $country = $ad->selectAdCountry(); foreach($country as $x):  ?>
                <option value=<?php echo $x->country_id; ?> class="form-control"><?php echo $x->name; ?></option>
            <?php endforeach; ?>
        </select>
        <h3>Mesto/Grad:</h3>
        <input type="text" name="city" placeholder="Mesto/Grad" value="<?php echo $result->city; ?>" >
        <h3>Telefon:</h3>
        <input type="text" name="telephone" placeholder="Telefon" value="<?php echo $result->telephone; ?>" >
        <button>Sačuvaj podatke</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>