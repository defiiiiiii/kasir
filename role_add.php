<?php
include 'config.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    mysqli_query($dbconnect, "INSERT INTO role VALUES ('','$nama')");
    $_SESSION['success'] = 'Berhasil menambahkan data';
    echo "<script>window.location = 'index.php?dashboard=role';</script>";
}
?>
<div class="card z-index-2 h-100 p-4">
    <div class="row ">
        <div class="col-md-8">
            <h1>TAMBAH ROLE</h1>
        </div>
        <div class="col-md-4 pt-4">
            <a href="?dashboard=role" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
        </div>
    </div>
    <form method="post">
        <div class="from-group mb-3">
            <label>Nama Role</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Role">
        </div>
        <div class="from-group mb-3">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>