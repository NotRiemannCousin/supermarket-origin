<?php
session_start();

function starts_with($string, $startString)
{
  $len = strlen($startString);
  return (substr($string, 0, $len) === $startString);
}

function ServerStd($serverS)
{
  return str_replace('\\',  '/', $_SERVER[$serverS]);
}

define('SITE_ADDR_SUFIX', (starts_with(ServerStd('PHP_SELF'), '/supermarket-origin') ?
  "/supermarket-origin/" :
  "/Marcelo/DB/sistemaC/"));

define('SITE_ADDR', ServerStd('DOCUMENT_ROOT') . SITE_ADDR_SUFIX);

$path = getcwd();


$new_path = '/res/scripts';

chdir(SITE_ADDR . $new_path);

require_once '../../classes/rb-mysql.php';
require_once '../../classes/office.classes.php';
require_once 'constants.php';
require_once 'functions.php';

$_USER;

$conn = mydbSetup();

if (!in_array(ServerStd('PHP_SELF'), [
  SITE_ADDR_SUFIX . 'sign-up/setup/index.php',
  SITE_ADDR_SUFIX . 'index.php',
  SITE_ADDR_SUFIX . 'login.php'
])) {

  if (!isset($_SESSION['token_login']))
    goto logout;

  $token = R::findOne('tokenlogin', "token = '" . $_SESSION['token_login'] . "'");


  if ($token) {
    $_USER = R::load('user', $token['user_id']);

    switch ($_USER['office']) {
      case 0:
        $_USER = new  Administrator($_USER);
        break;
      case 1:
        $_USER = new CommonUser($_USER);
        break;
      case 2:
        $_USER = new Cashier($_USER);
        break;
      case 3:
        $_USER = new HRManager($_USER);
        break;
      case 4:
        $_USER = new Counter($_USER);
        break;
    }
  } else {
    logout:
    header('location: http://' . $_SERVER['SERVER_NAME'] . SITE_ADDR_SUFIX);
    die;
  }
}


chdir($path);
