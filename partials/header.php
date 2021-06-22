<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet muzičara</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/53eca7a38b.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class=""> 
            <div class="logo">
                <a href="index.php" id="logo">
                    <!--<img src="site-images/logo.jpeg" alt="" height="80px" width="300px">-->
                </a>
            </div>
            <ul id="navBarUl">
                <li class="insertAd"><a href="view-insert-ad.php">Postavite oglas</a></li>
                <li><a href="">Muzičari</a></li>
                <li><a href="view-music-adds.php">Mali oglasi</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="view-user.php"><?php echo $_SESSION['user']->name; ?></a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="controller/log-out.php"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                <?php else: ?>
                    <li><a href="view-log-in.php#logInForm"><i class="fas fa-sign-in-alt"></i> Log in</a></li>
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