<?php
session_start();


unset($_SESSION["id"]);
unset($_SESSION["hash"]);

header("location: index.php");
