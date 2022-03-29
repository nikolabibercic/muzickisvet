<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- kontakt forma obavestenja -->
<?php if(isset($_GET['messageSent']) && $_GET['messageSent']==1): ?>
    <div class="messageSuccess">Uspešno ste poslali poruku.</div>
<?php endif; ?>
<?php if(isset($_GET['messageSent']) && $_GET['messageSent']==0): ?>
    <div class="messageUnsuccess">Slanje poruke nije uspelo.</div>
<?php endif; ?>

<section class="contactForm container" id="contactForm">
    <h2>Kontaktirajte nas</h2>
    <form action="controller/contact.php" method="POST" autocomplete="on" enctype="multipart/form-data">
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="text" rows="10" id="" ></textarea>
        <button>Pošalji</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>