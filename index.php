<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

    unset($_SESSION["id"]);
    unset($_SESSION["hash"]);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <?php include_once 'res/header.html' ?>

    <main>
        <form action="login.php" method="post">
            <h2>Black Mesa</h2>
            <input type="email" name="email" <?= 'value="' . (isset($_GET['email']) ? $_GET['email'] : '') . '"' ?> placeholder=" " required>
            <label data-text="Email"></label>
            <input type="password" name="password" placeholder=" " required>
            <label data-text="Senha"></label>
            <input type="submit" value="Login">
        </form>
        <div>
            <a href="sign-up/sign-up.php">Sign-Up</a>
        </div>
        <div class="error" <?= (isset($_GET['error']) ? '' : 'style="animation-name: none; visibility: hidden;"') ?>>
            O email ou a senha estão incorretos! Tente novamente.
        </div>
    </main>

    <?php include_once 'res/footer.html' ?>
</body>

</html>