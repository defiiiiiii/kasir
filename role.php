<?php
include 'config.php';
$view = $dbconnect->query("SELECT * FROM role");
?>
<div class="card z-index-2 h-100 p-4">
    <div class="row ">
        <div class="col-md-8">
            <h1>LIST ROLE</h1>
        </div>
        <div class="col-md-4 pt-4">
            <a href="?dashboard=role-add" class="btn btn-primary">Tambah Role</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID ROLE </th>
                <th>NAMA ROLE</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $view->fetch_array()) : ?>
                <tr>
                    <td> <?= $row['id_role'] ?></td>
                    <td> <?= $row['nama'] ?></td>
                    <td>
                        <a href="?dashboard=role-edit&id=<?= $row['id_role'] ?>">
                            <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
                                <i class="ni ni-ruler-pencil"></i>
                            </div>
                        </a>
                        <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="role_hapus.php?id=<?= $row['id_role'] ?>">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-fat-remove"></i>
                            </div>
                        </a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>