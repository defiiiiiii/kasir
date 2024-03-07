<?php
include 'config.php';
session_start();
if (isset($_SESSION['userid'])) {
    if ($_SESSION['role_id'] == 1) {
        header("Localtion:index.php");
    }
} else {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header("localtion:login.php");
}
