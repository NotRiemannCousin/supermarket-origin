<?php
$isthis = in_array(
  str_replace('\\',  '/',$_SERVER['PHP_SELF']),
  ['/black-mesa-site/res/scripts/blackmesa.php',
  'Marcelo/DB/sistemaC/res/scripts/blackmesa.php']
);
$path = getcwd();


if (!$isthis)
{
  
  $new_path = 
  ($_SERVER['PHP_SELF'] == '/black-mesa-site/res/scripts/blackmesa.php' ?
  '/black-mesa-site/res/scripts' :
  '/Marcelo/DB/sistemaC/res/scripts');
  
  chdir($_SERVER['DOCUMENT_ROOT'] . $new_path);
}
require_once '../../classes/rb-mysql.php';
require_once 'constants.php';
require_once 'functions.php';

if (!$isthis) {
  chdir($path);
}
