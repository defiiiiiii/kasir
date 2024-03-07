<?php
include 'config.php';
$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN role as r ON u.role_id=r.id_role");
?>

<div class="card z-index-2 h-100 p-4">
  <div class="row ">
    <div class="col-md-8">
      <h1>User</h1>
    </div>
    <div class="col-md-4 pt-4">
      <a href="?dashboard=user-add" class="btn btn-primary">Tambah user</a>
    </div>
  </div>
  <table class="table table-bordered">
    <tr>
      <th>id_user </th>
      <th>Nama</th>
      <th>Username</th>
      <th>Role_id</th>
      <th>aksi</th>
    </tr>
    <?php while ($row = $view->fetch_array()) { ?>
      <tr>
        <td> <?= $row['id_user'] ?> </td>
        <td> <?= $row['nama'] ?></td>
        <td> <?= $row['username'] ?></td>
        <td> <?= $row['role_id'] ?></td>
        <td>
          <a href="?dashboard=user-edit&id=<?= $row['id_user'] ?>">
            <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
              <i class="ni ni-ruler-pencil"></i>
            </div>
          </a>
          <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="user_hapus.php?id=<?= $row['id_user'] ?>">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-fat-remove"></i>
            </div>
          </a>

        </td>
      </tr>
    <?php } ?>
  </table>
</div>