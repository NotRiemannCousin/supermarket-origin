<?php
require_once '../../res/scripts/basic-config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    <link rel="stylesheet" href="setup.css">
</head>

<body>
    <?php include_once '../../res/php/header.php'; ?>
    <main><?php


            if (
                $conn &&
                isset($_POST['name']) &&
                isset($_POST['email']) &&
                isset($_POST['password']) &&
                isset($_POST['passwordconfirm']) &&
                isset($_POST['genre']) &&
                isset($_POST['office'])
            ) {

                $V_name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
                $V_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $V_password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
                $V_passwordconfirm = filter_var($_POST['passwordconfirm'], FILTER_SANITIZE_SPECIAL_CHARS);
                $V_genre = filter_var($_POST['genre'], FILTER_SANITIZE_SPECIAL_CHARS);
                $V_office = filter_input(INPUT_POST, 'office', FILTER_VALIDATE_INT);
                

                if ($V_passwordconfirm == $V_password) {
                    $validateNew = R::getAll("SELECT * FROM user WHERE email = '$V_email'");
                    if (count($validateNew)) {
            ?>
                    <div class="error">
                        <h3>Esse Email já em uso!! Tente novamente.</h3>
                    </div>
                    <p>
                        Voltar para a <a href="<?= "../sign-up.php?name=$V_name&email=$V_email&genre=$V_genre" ?>">pagina
                            anterior</a>.
                    </p>
                <?php
                    } else {

                        $user = R::dispense('user');

                        $user->name     = $V_name;
                        $user->email    = $V_email;
                        $user->password = $V_password;
                        $user->genre    = $V_genre;
                        $user->office   = $V_office;

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
                    Voltar para a <a href="<?= "../index.php?name=$V_name&email=$V_email&genre=$V_genre" ?>">pagina
                        anterior.</a>
                </p>
            <?php
                }
            } else {
            ?>

            <div class="error">
                <h3>Preencha os dados corretamente!!</h3>
            </div>
            <p>
                Voltar para a <a href="../">pagina
                    anterior.</a>
            </p>
        <?php
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