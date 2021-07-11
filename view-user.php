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
    <form action="controller/user-form.php" method="POST" autocomplete="on">
        Ime:
        <input type="text" name="name" placeholder="Ime" value="<?php echo $result->name; ?>" >
        Država:
        <input type="text" name="country" placeholder="Država" value="<?php echo $result->country; ?>" >
        Mesto/Grad:
        <input type="text" name="city" placeholder="Mesto/Grad" value="<?php echo $result->city; ?>" >
        Telefon:
        <input type="text" name="telephone" placeholder="Telefon" value="<?php echo $result->telephone; ?>" >
        Email:
        <input type="email" name="email" placeholder="Email" value="<?php echo $result->email; ?>"  disabled>
        Password
        <input type="text" name="password" placeholder="Password" value="<?php echo $result->password; ?>"  disabled>
        <button>Sačuvaj podatke</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>