<?php
require_once '/res/scripts/blackmesa.php';

$conn = R::setup('mysql:host=127.0.0.1;dbname=sistemaC', 'root', 'aluno');

session_start();

if (
    $conn &&
    isset($_POST['email']) &&
    isset($_POST['password'])
)
{
    $user = R::findOne('user', "email = '$_POST[email]' AND password = '$_POST[password]'");
    R::close();
    
    if ($user)
    {
        $_SESSION["id"] = $user['id'];
        $_SESSION["hash"] = password_hash($user['password'], PASSWORD_ARGON2I);

        header("location: site");

    } else
        header("location: index.php?email=$_POST[email]&error=emailorpassword");
}else
header("location: index.php");