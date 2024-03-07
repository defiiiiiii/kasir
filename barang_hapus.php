<?php
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($dbconnect, "DELETE FROM barang WHERE id_barang='$id'");
    if ($query) {
        echo "<script>window.location = 'index.php?dashboard=barang'</script>";
    }
}
