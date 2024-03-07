<?php
include 'config.php';
$view = $dbconnect->query("SELECT * FROM barang");
?>

<div class="card z-index-2 h-100 p-4">
	<div class="row ">
		<div class="col-md-8">
			<h1>List Barang</h1>
		</div>
		<div class="col-md-4 pt-4">
			<a href="?dashboard=barang-add" class="btn btn-primary">Tambah data</a>
		</div>
	</div>
	<div class="row">
		<form class="row g-3">
			<label for="inputPassword2" class="visually-hidden">Password</label>
			<input type="text" class="form-control" id="inputPassword2" placeholder="cari...." name="cari">
			<input type="hidden" name="dashboard" value="barang">
	</div>
</div class="col=auto">
<button type="submit" class="btn btn-primary mb-3">Cari</button>
</div>
</form>
</div>
<table class="table table-bordered">
	<tr>
		<th>ID Barang </th>
		<th>Nama</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Aksi</th>
	</tr>
	<?php if (isset($_GET['cari'])) : ?>
		<?php $cari = $_GET['cari'] ?>
		<?php $query = mysqli_query($dbconnect, "select * from barang where nama_barang like '%" . $cari . "%'"); ?>
	<?php else : ?>
		<?php $query = mysqli_query($dbconnect, "SELECT * FROM barang"); ?>
	<?php endif ?>
	<?php while ($row = $query->fetch_array()) { ?>
		<tr>
			<td> <?= $row['id_barang'] ?> </td>
			<td> <?= $row['nama_barang'] ?></td>
			<td> <?= $row['harga_barang'] ?></td>
			<td> <?= $row['jumlah_barang'] ?></td>
			<td>
				<a href="?dashboard=barang-edit&id=<?= $row['id_barang'] ?>">
					<div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
						<i class="ni ni-ruler-pencil"></i>
					</div>
				</a>
				<a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="barang_hapus.php?id=<?= $row['id_barang'] ?>">
					<div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
						<i class="ni ni-fat-remove"></i>
					</div>
				</a>

			</td>
		</tr>
	<?php } ?>
</table>
</div>