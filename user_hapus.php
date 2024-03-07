<?php
include 'config.php';
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $query = mysqli_query($dbconnect, "DELETE FROM user WHERE id_user='$id'");
     if ($query) {
          echo "<script>window.location ='index.php?dashboard=user'</script>";
     }
}
