<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>Sign Up</title>
</head>

<body>
    <?php include_once '../res/php/header.php'; ?>
    <main>
        <form action="setup/" method="post">
            <h2>Origin</h2>

            <input type="text" name="name" id="name" <?= 'value="' . (isset($_GET['name']) ? $_GET['name'] : '') . '"' ?> placeholder=" " required>
            <label for="name" data-text="Nome"></label>
            <input type="email" name="email" id="email" <?= 'value="' . (isset($_GET['email']) ? $_GET['email'] : '') . '"' ?> placeholder=" " required>
            <label for="email" data-text="Email"></label>
            <input type="password" name="password" id="password" placeholder=" " required>
            <label for="password" data-text="Senha"></label>
            <input type="password" name="passwordconfirm" id="passwordconfirm" placeholder=" " required>
            <label for="passwordconfirm" data-text="Confirme a senha"></label>
            <p>Gênero:
                <label><input type="radio" name="genre" value="M" checked required>Masculino</label>
                <?= '<label><input type="radio" name="genre" value="F" ' . (isset($_GET['genre']) ? ($_GET['genre'] == 'F' ? 'checked' : '') : '') . ' required>Feminino</label>' ?>
            </p>
            <div style="display: flex"> Cargos:
                <div style="display: inline-block">
                    <label><input type="radio" name="office" value="0" checked>Administrador</label><br>
                    <label><input type="radio" name="office" value="1">user Comum</label><br>
                    <label><input type="radio" name="office" value="2">Operador de Caixa</label><br>
                    <label><input type="radio" name="office" value="3">Gerente de RG</label><br>
                    <label><input type="radio" name="office" value="4">Contador</label>
                </div>
            </div>
            <br>
            <input type="submit" value="Sing up">
        </form>
    </main>
    <?php include_once '../res/php/footer.php' ?>
</body>

</html>