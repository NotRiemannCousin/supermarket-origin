<?php
session_start();

$isthis = in_array(
  str_replace('\\',  '/', $_SERVER['PHP_SELF']),
  [
    '/black-mesa-site/res/scripts/blackmesa.php',
    'Marcelo/DB/sistemaC/res/scripts/blackmesa.php'
  ]
);
$path = getcwd();



$new_path =
  ($_SERVER['PHP_SELF'] == '/black-mesa-site/res/scripts/blackmesa.php' ?
    '/black-mesa-site/res/scripts' :
    '/Marcelo/DB/sistemaC/res/scripts');

chdir($_SERVER['DOCUMENT_ROOT'] . $new_path);

require_once '../../classes/rb-mysql.php';
require_once 'constants.php';
require_once 'functions.php';

$_USER;

$conn = mydbSetup();

if (!($_SERVER['PHP_SELF'] == '/Marcelo/DB/sistemaC/index.php')) {
  $token = R::findOne('tokenlogin', "token = '".$_SESSION['token_login']."'");
  if ($token)
    $_USER = R::load('user', $token['user_id']);
  else {
    header("location: $_SERVER[DOCUMENT_ROOT]/Marcelo/DB/sistemaC/");
  }
}

chdir($path);