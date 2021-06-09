<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- register form -->
<section class="logInRegisterForm container" id="logInRegisterForm">
    <h2>Registrujte se</h2>
    <form action="controller/register.php" method="POST" autocomplete="on">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button>Registrujte se</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>