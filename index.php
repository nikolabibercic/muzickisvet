<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==true): ?>
    <div class="logInRegisterSuccess">Uspešno ste se logovali.</div>
<?php endif; ?>
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==false): ?>
    <div class="logInRegisterUnsuccess">Logovanje nije uspelo!</div>
<?php endif; ?>



<?php require 'partials/footer.php'; ?>