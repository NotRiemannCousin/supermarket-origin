<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    <link rel="stylesheet" href="setup.css">
</head>

<body>
    <?php include_once '../../res/php/header.php'; ?>
    <main>
        <?php
        require_once '../../res/scripts/basic-config.php';

        
        if (
            $conn &&
            isset($_GET['name']) &&
            isset($_GET['email']) &&
            isset($_GET['password']) &&
            isset($_GET['passwordconfirm']) &&
            isset($_GET['genre']) &&
            isset($_GET['office'])
        ) {
            if ($_GET['passwordconfirm'] == $_GET['password']) {
                $validateNew = R::getAll("SELECT * FROM user WHERE email = '$_GET[email]'");
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

                    $user = R::dispense('user');

                    $user->name     = $_GET['name'];
                    $user->email    = $_GET['email'];
                    $user->password = $_GET['password'];
                    $user->genre    = $_GET['genre'];
                    $user->office   = $_GET['office'];

                    R::store($user);

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

        /* $users = R::getAll('SELECT * FROM user');
        ?>
        <table>
            <thead>
                <tr>
                    <td>users</td>
                <tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr><td>{$user['nome']}</td><td>{$user['email']}</td><tr>";
                }
                ?>
            </tbody>
        </table> */ ?>
    </main>
    <?php include_once '../../res/php/footer.php';
    R::close(); ?>
</body>

</html>