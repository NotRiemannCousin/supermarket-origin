<?php

function mydbSetup(){
  return R::setup('mysql:host=127.0.0.1;dbname=sistemaC', 'root');
}