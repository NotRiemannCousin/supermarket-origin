<?php

function mydbSetup(){
  return R::setup();//setup('mysql:host=localhost;dbname=sistemaC', 'root', 'aluno');
  //return R::setup('mysql:host=localhost;dbname=sistemaC', 'root', 'aluno');
}


function checkPermissionOffice($office, $array){
    return in_array($office, $array);
}