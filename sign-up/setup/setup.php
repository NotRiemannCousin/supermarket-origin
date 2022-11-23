<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancos de Dados</title>
    <link rel="stylesheet" href="setup.css">
</head>

<body>
    <?php include_once '../../res/header.html'; ?>
    <main>
        <?php
        require_once '../../classes/rb-mysql.php';

        $conn = R::setup('mysql:host=127.0.0.1;dbname=sistemaC', 'root', 'aluno');

        if (
            $conn &&
            isset($_GET['name']) &&
            isset($_GET['email']) &&
            isset($_GET['password']) &&
            isset($_GET['passwordconfirm']) &&
            isset($_GET['genre'])
        ) {
            if ($_GET['passwordconfirm'] == $_GET['password']) {
                $validateNew = R::getAll("SELECT * FROM usuario WHERE email = '$_GET[email]'");
                if (count($validateNew)) {
        ?>
                    <div class="error">
                        <h3>Esse Email já em uso!! Tente novamente.</h3>
                    </div>
                    <p>
                        Voltar para a <a href="<?= "../sign-up.php?name=$_GET[name]&email=$_GET[email]&genre=$_GET[genre]" ?>">pagina
                            anterior</a>.
                    </p>
                <?php
                } else {
                    $usuario = R::dispense('usuario');

                    $usuario->name      = $_GET['name'];
                    $usuario->email     = $_GET['email'];
                    $usuario->password  = $_GET['password'];
                    $usuario->genre     = $_GET['genre'];

                    R::store($usuario);

                ?>
                    <div class="sucessfull">
                        <p>Pronto. <a href="../../index.php">Volte para logar</a>.</p>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="error">
                    <h3>As senhas são diferentes!! Tente novamente.</h3>
                </div>
                <p>
                    Voltar para a <a href="<?= "../sign-up.php?name=$_GET[name]&email=$_GET[email]&genre=$_GET[genre]" ?>">pagina
                        anterior</a>.
                </p>
        <?php
            }
        }

        /* $usuarios = R::getAll('SELECT * FROM usuario');
        ?>
        <table>
            <thead>
                <tr>
                    <td>usuarios</td>
                <tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $user) {
                    echo "<tr><td>{$user['nome']}</td><td>{$user['email']}</td><tr>";
                }
                ?>
            </tbody>
        </table> */ ?>
    </main>
    <?php include_once '../../res/footer.html'; R::close(); ?>
</body>

</html>