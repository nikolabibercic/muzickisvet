<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- contact form -->
<section class="logInRegisterForm container" id="logInForm">
    <h2>Resetuj lozinku</h2>
    <form action="controller/change-password.php" method="POST" autocomplete="on">
        <input type="email" name="email" placeholder="Email" required>
        <button>Resetuj lozinku</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>