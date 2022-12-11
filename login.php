<?php
require_once 'res/scripts/basic-config.php';




if (
    $conn &&
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $user = R::findOne('user', "email = '$_POST[email]' AND password = '$_POST[password]'");
    R::close();

    if ($user) {
        $token;

        do {
            $token = bin2hex(random_bytes(16));
        } while(R::findOne('tokenlogin', "token = '$token'"));
        
        $_SESSION['token_login'] = $token;

        $token_bd = R::dispense('tokenlogin');
        $token_bd->token = $token;
        $token_bd->user = R::load('user', $user['id']);
        
        R::store($token_bd);

        
        header('location: site');
        exit;
    } else
        header("location: index.php?email=$_POST[email]&error=emailorpassword");
} else
    header('location: index.php');
