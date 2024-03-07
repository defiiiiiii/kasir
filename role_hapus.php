<?php
include 'config.php';
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($dbconnect, "DELETE FROM role WHERE id_role='$id' ");
    echo "<script>window.location = 'index.php?dashboard=role';</script>";
}
