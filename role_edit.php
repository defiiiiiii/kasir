<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $nama_role = $_POST['nama'];
    mysqli_query($dbconnect, "UPDATE role SET nama='$nama' where id_role='$id' ");
    echo "<script>window.location = 'index.php?dashboard=role';</script>";
}
?>

<div class="card z-index-2 h-100 p-4">
    <div class="row ">
        <div class="col-md-8">
            <h1>EDIT ROLE</h1>
        </div>
        <div class="col-md-4 pt-4">
            <a href="?dashboard=role" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
        </div>
    </div>
    <form method="post">
        <div class="from-group mb-3">
            <label>Nama Role</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'] ?>">
        </div>
        <div class="from-group mb-3">
            <input type="submit" name="update" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>