<?php
include 'config.php';
include "authcheckkasir.php";

//menghilangkan Rp pada nominal

$bayar = floatval(preg_replace('/[^\d.]/', '', number_format($_POST['bayar']))); //preg_replace('/\D/', '', $_POST['bayar']);
$total = floatval(preg_replace('/\D/', '', number_format($_POST['total'])));

//print_r($SESSION['cart']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomer = rand(111111, 999999);
// $total = $_POST['total'];
// $bayar = $_POST['bayar'];
$user = $_SESSION['userid'];
$kembali = $bayar - $total;

//insret ke tabel transaksi
$table_transaksi = mysqli_query($dbconnect, "INSERT INTO transaksi (tanggal_waktu,nomer,total_bayar,bayar,kembali,user_id) VALUES ('$tanggal_waktu','$nomer','$total','$bayar','$kembali','$user')");
if ($table_transaksi) {
    $id_transaksi = mysqli_insert_id($dbconnect);
    foreach ($_SESSION["cart"] as $id_barang => $jumlah) {

        $query_barang = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang='$id_barang'");
        $data = mysqli_fetch_assoc($query_barang);
        $detail_total = $jumlah * $data['harga_barang'];

        //insret ke tabel transaksi_detail
        mysqli_query($dbconnect, "INSERT INTO transaksi_detail (id_transaksi,id_barang,qty,total) VALUES ('$id_transaksi','$id_barang','$jumlah','$detail_total')");
    }
}
//mendapatkan id transaksi baru


//insret ke detail transaksi
// foreach ($_SESSION['cart'] as $key => $value) {

//     $id_barang = $value['id'];
//     $harga = $value['harga'];
//     $qty = $value['qty'];
//     $total = $harga * $qty;

//     mysqli_query($dbconnect, "INSRET INTO transaksi_detail
//         id_transaksi_detail,id_transaksi,id_barang,harga,qty,total) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$total')");

//     //$sum += $value['harga']*$value['qty'];
// }
//redirect ke halaman transaksi selesai
header("location:transaksi_selesai.php?id_trx=$id_transaksi");
