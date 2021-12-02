<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet muzičara</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/53eca7a38b.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <nav class=""> 
            <div class="logo">
                <a href="index.php" id="logo">
                    <img src="site-images/logo.png" alt="" height="80px" width="300px">
                    <!--Logo sajta-->
                </a>
            </div>
            <ul id="navBarUl">
                <li><a class="insertAdButton" href="view-insert-ad.php?#insertAdForm">Postavite oglas</a></li>
                <li><a class="" href="index.php">Muzički oglasi</a></li>
                <?php if(isset($_SESSION['user']) and !$user->checkUserAdmin($_SESSION['user']->user_id)): ?>
                    <li><a href="view-user.php?#userForm"><?php echo $_SESSION['user']->name; ?></a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user']) and $user->checkUserAdmin($_SESSION['user']->user_id)): ?>
                    <li><a href="view-admin.php"><?php echo $_SESSION['user']->name; ?></a></li>
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