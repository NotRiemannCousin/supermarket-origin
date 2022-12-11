<?php
session_start();

echo "sla né";

unset($_SESSION["token_login"]);

header("location: index.php");
