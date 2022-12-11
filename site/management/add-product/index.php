<?php


require_once '../../../res/scripts/blackmesa.php';



if($_USER->hasPermissions(Permission::EditProducts))
{
    header('location: ../../');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Product</title>
</head>

<body>
    <?php include_once '../../../res/php/header.php'; ?>
    <main>
        <form action="add.php" method="post">
            <h2>Origin</h2>

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
        <a href="../../../">Voltar</a>
    </main>
    <?php include_once '../../../res/php/footer.php' ?>
</body>

</html>