<?php
if (isset($_SESSION['token_login']))
    unset($_SESSION['token_login']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php include_once 'res/php/header.php' ?>

    <main>
        <form action="login.php" method="post">
            <h2>Origin</h2>
            <input type="email" name="email" id="email" <?= 'value="' . (isset($_GET['email']) ? $_GET['email'] : '') . '"' ?> placeholder=" " required>
            <label data-text="Email" for="email"></label>
            <input type="password" name="password" id="password" placeholder=" " required>
            <label data-text="Senha" for="password"></label>
            <input type="submit" value="Login">
        </form>
        <div>
            <a href="sign-up/index.php">Sign-Up</a>
        </div>
        <div class="error" <?= (isset($_GET['error']) ? '' : 'style="animation-name: none; visibility: hidden;"') ?>>
            O email ou a senha estão incorretos! Tente novamente.
        </div>
    </main>

    <?php include_once 'res/php/footer.php' ?>
</body>

</html>