<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- registracija poruke -->
<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==1): ?>
    <div class="messageSuccess">Registracija uspešna. Ulogujte se.</div>
<?php endif; ?>

<?php if(isset($_GET['userRegistered']) && $_GET['userRegistered']==0): ?>
    <div class="messageUnsuccess">Registracija nije uspela!</div>
<?php endif; ?>

<?php if(isset($_GET['userExists']) && $_GET['userExists']==1): ?>
    <div class="messageUnsuccess">Registracija nije uspela! Email vec postoji.</div>
<?php endif; ?>

<!-- register form -->
<section class="logInRegisterForm container" id="RegisterForm">
    <h2>Registrujte se</h2>
    <form action="controller/register.php" method="POST" autocomplete="on">
        <input type="name" name="name" placeholder="Ime" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <!-- Ovde se upisuje SITE KEY-->
        <div class="g-recaptcha" data-sitekey="6LcSqpMbAAAAABb1e-VtR90PBnYVRY4vcIjEQAD0"></div>
        <button type="submit">Registrujte se</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>