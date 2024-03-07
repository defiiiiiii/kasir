<?php
include 'config.php';
include "authcheckkasir.php";

$id = $_GET['id'];
$cart = $_SESSION['cart'];

unset($_SESSION["cart"][$id]);
header("location:index.php");
