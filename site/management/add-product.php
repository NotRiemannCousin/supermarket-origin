<?php
session_start();

require_once '../../res/scripts/blackmesa.php';

$conn = mydbSetup();

$user = R::load('user', $_SESSION["id"]);

if(!in_array($user->office, [0, 2, 3]))
{
    header('location: ../');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-product.css">
    <title>Sign Up</title>
</head>

<body>
    <?php include_once '../../res/header.html'; ?>
    <main>
        <form action="setup.php" method="post">
            <h2>Black Mesa</h2>

            <input type="text" name="name" placeholder=" " required>
            <label data-text="Nome"></label>
            <input type="text" name="desc" placeholder=" ">
            <label data-text="Descrição"></label>
            <input type="number" name="price" placeholder=" " step="0.01" required>
            <label data-text="Preço"></label>
            <label><input type="checkbox" name="storage" checked>Em estoque</label>
            <br>
            <br>
            <input type="submit" value="Adicionar">
        </form>
        <div class="error" <?= (isset($_GET['error']) ? '' : 'style="animation-name: none; visibility: hidden;"') ?>>
            Nâo foi possivel adicionar o seu produto... Tente novamente.
        </div>
        <a href="../">Voltar</a>
    </main>
    <?php include_once '../../res/footer.html' ?>
</body>

</html>