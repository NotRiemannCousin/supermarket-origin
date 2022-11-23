<?php
require_once 'classes/rb-mysql.php';

$conn = R::setup('mysql:host=127.0.0.1;dbname=sistemaC', 'root', 'aluno');

session_start();

if (
    $conn &&
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $user = R::find('usuario', "email = '$_POST[email]' AND password = '$_POST[password]'");
    R::close();
    
    if (count($user)) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['hash'] = password_hash($user['password'], PASSWORD_ARGON2I);

        header("location: site");
    } else {
        header("location: index.php?mail$_POST[email])&error=emailorpassword");
    }
}
header("location: index.php");