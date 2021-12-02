<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- logovanje poruke -->
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==1): ?>
    <div class="messageSuccess">Uspešno ste se logovali.</div>
<?php endif; ?>
<?php if(isset($_GET['userLogged']) && $_GET['userLogged']==0): ?>
    <div class="messageUnsuccess">Logovanje nije uspelo!</div>
<?php endif; ?>

<!-- registracija poruke -->
<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==1): ?>
    <div class="messageSuccess">Registracija uspešna. Ulogujte se.</div>
<?php endif; ?>

<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==0): ?>
    <div class="messageUnsuccess">Registracija nije uspela!</div>
<?php endif; ?>

<!-- contact form -->
<section class="logInRegisterForm container" id="logInForm">
    <h2>Ulogujte se</h2>
    <form action="controller/log-in.php" method="POST" autocomplete="on">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Ulogujte se</button>
        <p>Nemate nalog? <a href="view-register.php#RegisterForm">Registrujte se</a></p>
    </form>
</section>

<?php require 'partials/footer.php'; ?>