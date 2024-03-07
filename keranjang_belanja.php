<?php

session_start();
$id_menu = $_GET["id"];

if (isset($_SESSION["cart"][$id_menu])) {
    $_SESSION["cart"][$id_menu] += 1;
} else {
    $_SESSION["cart"][$id_menu] = 1;
}

header("location:index.php");
