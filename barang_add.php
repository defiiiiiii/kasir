<?php
include 'config.php';
if (isset($_POST['simpan'])) {
	//echo var_dump($_POST);
	$nama_barang 	= $_POST['nama_barang'];
	$harga_barang 	= $_POST['harga_barang'];
	$jumlah_barang 	= $_POST['jumlah_barang'];


	mysqli_query($dbconnect, "INSERT INTO barang VALUES ('','$nama_barang','$harga_barang','$jumlah_barang')");
	echo "<script>window.location = 'index.php?dashboard=barang';</script>";
}
?>

<div class="card z-index-2 h-100 p-4">
	<div class="row ">
		<div class="col-md-8">
			<h1>TAMBAH BARANG</h1>
		</div>
		<div class="col-md-4 pt-4">
			<a href="?dashboard=barang" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
		</div>
	</div>
	<form method="post">
		<div class="from-group mb-3">
			<label>NAMA BARANG</label>
			<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
		</div>
		<div class="from-group mb-3">
			<label>HARGA BARANG</label>
			<input type="number" name="harga_barang" class="form-control" placeholder="Harga Barang">
		</div>
		<div class="from-group mb-3">
			<label>JUMLAH BARANG</label>
			<input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
		</div>
		<div class="from-group mb-3">
			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		</div>
	</form>
</div>