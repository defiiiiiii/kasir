<?php

include 'config.php';
include "authcheckkasir.php";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}


if (isset($_POST['id_barang'])) {
    $id_barang = $_POST["id_barang"];
    $qty = $_POST["qty"];
    if (empty($id_barang)) {
        header('location:kasir.php');
    } elseif (empty($qty)) {
        header('location:kasir.php');
    } else {
        if (isset($_SESSION["cart"][$id_barang])) {
            $_SESSION["cart"][$id_barang] += $qty;
        } else {
            $_SESSION["cart"][$id_barang] = $qty;
        }
    }
}

header('location:kasir.php');
