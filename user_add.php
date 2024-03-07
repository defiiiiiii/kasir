<?php

include 'config.php';

$role = mysqli_query($dbconnect, "SELECT * FROM role");


if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role_id = $_POST['role_id'];

    mysqli_query($dbconnect, "INSERT INTO user VALUES ('','$nama', '$username', '$password', '$role_id')");
    echo "<script>window.location = 'index.php?dashboard=user';</script>";

    $_SESSION['success'] = 'Berhasil menambahkan data';

    header("location:user.php");
}

?>

<div class="card z-index-2 h-100 p-4">
    <div class="row ">
        <div class="col-md-8">
            <h1>TAMBAH USER</h1>
        </div>
        <div class="col-md-4 pt-4">
            <a href="?dashboard=user" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
        </div>
    </div>
    <form method="post">
        <div class="from-group mb-3">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" placeholder="username">
        </div>
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
            <select name="role_id" id="" class="form-select">
                <?php while ($data = mysqli_fetch_array($role)) : ?>
                    <option value="<?php echo $data['id_role'] ?>"><?php echo $data['nama'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="from-group mb-3">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>