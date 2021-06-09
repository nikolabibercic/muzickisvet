<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- logovanje poruke -->
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==true): ?>
    <div class="logInRegisterSuccess">Uspešno ste se logovali.</div>
<?php endif; ?>
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==false): ?>
    <div class="logInRegisterUnsuccess">Logovanje nije uspelo!</div>
<?php endif; ?>

<!-- registracija poruke -->
<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==true): ?>
    <div class="logInRegisterSuccess">Registracija uspešna. Ulogujte se</div>
<?php endif; ?>

<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==false): ?>
    <div class="logInRegisterUnsuccess">Registracija nije uspela!</div>
<?php endif; ?>

<!-- contact form -->
<section class="logInRegisterForm container" id="logInRegisterForm">
    <h2>Ulogujte se</h2>
    <form action="controller/log-in.php" method="POST" autocomplete="on">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button>Ulogujte se</button>
        <p>Nemate nalog? <a href="view-register.php">Registrujte se</a></p>
    </form>
</section>

<?php require 'partials/footer.php'; ?>