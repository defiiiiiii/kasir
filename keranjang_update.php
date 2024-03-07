<?php
include 'config.php';

include "authcheckkasir.php";

$qty = $_POST['qty'];
print_r($qty);
if (!empty($qty)) {
    foreach ($_POST['qty'] as $key => $value) {
        $_SESSION['cart'][$key] = $value;
    }
}

header('location:kasir.php');
