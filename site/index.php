<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancos de Dados</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php include_once '../res/header.html'; ?>
    <main>
        <?php
        session_start();
        require_once '../classes/rb-mysql.php';

        $conn = R::setup('mysql:host=127.0.0.1;dbname=sistemaC', 'root', 'aluno');

        $user = R::findOne('usuario', $_SESSION['id']);

        // var_dump($user);
        echo "<h1>bem vindo $user->name</h1>";
        ?>
    </main>
    <?php include_once '../res/footer.html';
    R::close(); ?>
</body>

</html>