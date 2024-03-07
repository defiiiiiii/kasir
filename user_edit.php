<?php

include 'config.php';

$role = mysqli_query($dbconnect, "SELECT * FROM user");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM user where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $nama_barang     = $_POST['username'];
    $harga_barang     = $_POST['password'];
    $jumlah_barang = $_POST['role_aksi'];

    //Menyimpan ke database
    mysqli_query($dbconnect, "UPDATE barang SET nama_barang='$nama_barang', harga_barang='$harga_barang', jumlah_barang='$jumlah_barang' WHERE id_barang = '$id' ");

    echo "<script>
	window.location = 'index.php?dashboard=barang';
</script>";
}

?>

<div class="card z-index-2 h-100 p-4">
    <div class="row ">
        <div class="col-md-8">
            <h1>EDIT USER</h1>
        </div>
        <div class="col-md-4 pt-4">
            <a href="?dashboard=user" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
        </div>
    </div>
    <form method="post">
        <div class="from-group mb-3">
            <label>USERNAME</label>
            <input type="text" name="username" class="form-control" placeholder="username">
        </div>
        <div class="from-group mb-3">
            <label>PASSWORD</label>
            <input type="number" name="password" class="form-control" placeholder="password">
        </div>
        <div class="from-group mb-3">
            <label>ROLE AKSI</label>
            <input type="number" name="role aksi" class="form-control" placeholder="role aksi">
        </div>
        <div class="from-group mb-3">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>