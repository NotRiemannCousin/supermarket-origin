<?php


require_once '../../../res/scripts/blackmesa.php';


if (
    $conn &&
    isset($_POST['name']) &&
    isset($_POST['price'])
) {

    $p = R::dispense('product');
    $p->name = $_POST['name'];
    if (isset($_POST['desc']))
        $p->desc = $_POST['desc'];
    $p->price = $_POST['price'];
    $p->storage = isset($_POST['storage'])  ? true : false;

    R::store($p);
    header("location: add-product.php");
} else
    header("location: add-product.php?error=not-loaded");
