<?php
session_start();

function starts_with($string, $startString)
{
  $len = strlen($startString);
  return (substr($string, 0, $len) === $startString);
}

$prefix_header = (starts_with(str_replace('\\',  '/', $_SERVER['PHP_SELF']), '/black-mesa-site') ?
"/black-mesa-site/" :
"/Marcelo/DB/sistemaC/");


$isthis = in_array(
  str_replace('\\',  '/', $_SERVER['PHP_SELF']),
  [
    '/black-mesa-site/res/scripts/blackmesa.php',
    'Marcelo/DB/sistemaC/res/scripts/blackmesa.php'
  ]
);
$path = getcwd();



$new_path = $prefix_header.'/res/scripts';

chdir($_SERVER['DOCUMENT_ROOT'] . $new_path);

require_once '../../classes/rb-mysql.php';
require_once 'constants.php';
require_once 'functions.php';

$_USER;

$conn = mydbSetup();

if (!in_array(str_replace('\\',  '/', $_SERVER['PHP_SELF']), [
  $prefix_header.'sign-up/setup/index.php',
  $prefix_header.'index.php'
])) {
  if (isset($_SESSION['token_login']))
    $token = R::findOne('tokenlogin', "token = '" . $_SESSION['token_login'] . "'");
  if ($token)
    $_USER = R::load('user', $token['user_id']);
  else {
    header("location: $_SERVER[DOCUMENT_ROOT]$prefix_header");
  }
}


chdir($path);
