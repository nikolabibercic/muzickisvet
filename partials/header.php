<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzički svet</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/53eca7a38b.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="container"> 
            <div class="logo">
                <a href="index.php" id="logo">Logo sajta</a>
            </div>
            <ul id="navBarUl">
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="controller/log-out.php">Izlogujte se</a></li>
                <?php else: ?>
                    <li><a href="view-log-in.php">Ulogujte se</a></li>
                <?php endif; ?>
                <li><a href="view-music-adds.php">Oglasi</a></li>
                <li><a href="">Forum</a></li>
                <li><a href="view-contact.php">Kontakt</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="view-user.php"><?php echo $_SESSION['user']->email; ?></a></li>
                <?php endif; ?>
            </ul>
            <div class="checkBtn" id="checkBtn">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
        <hgroup>
            <h1 id="h1"></h1>
        </hgroup>
    </header>