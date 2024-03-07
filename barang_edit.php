<?php

include 'config.php';

if (isset($_GET['id'])) {
	$id   = $_GET['id'];
	$data = mysqli_query($dbconnect, "SELECT * FROM barang where id_barang='$id'");
	$data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
	$nama_barang 	= $_POST['nama_barang'];
	$harga_barang 	= $_POST['harga_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];

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
			<h1>EDIT BARANG <?php echo $data['nama_barang'] ?></h1>
		</div>
		<div class="col-md-4 pt-4">
			<a href="?dashboard=barang" class="btn btn-primary"><i class="ni ni-bold-left"></i> KEMBALI</a>
		</div>
	</div>
	<form method="post">
		<div class="from-group mb-3">
			<label>NAMA BARANG</label>
			<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $data['nama_barang'] ?>" required>
		</div>
		<div class="from-group mb-3">
			<label>HARGA BARANG</label>
			<input type="number" name="harga_barang" class="form-control" placeholder="Harga Barang" value="<?php echo $data['harga_barang'] ?>" required>
		</div>
		<div class="from-group mb-3">
			<label>JUMLAH BARANG</label>
			<input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang" value="<?php echo $data['jumlah_barang'] ?>" required>
		</div>
		<div class="from-group mb-3">
			<input type="submit" name="update" value="Simpan" class="btn btn-primary">
		</div>
	</form>
</div>