<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- register form -->
<section class="logInRegisterForm container" id="RegisterForm">
    <h2>Registrujte se</h2>
    <form action="controller/register.php" method="POST" autocomplete="on">
        <input type="name" name="name" placeholder="Ime" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Registrujte se</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>