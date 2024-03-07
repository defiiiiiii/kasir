<?php
include 'config.php';
include "authcheckkasir.php";

$id_trx = $_GET['id_trx'];
$data_user = mysqli_query($dbconnect, "SELECT * FROM transaksi INNER JOIN user ON transaksi.user_id=user.id_user WHERE id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data_user);

?>



<!DOCTYPE html>
<html>

<head>
    <title>Kasir Selesai</title>
    <style type="text/css">
        body {
            color: gray;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</head>

<body>
    <div align="center">
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th>Toko HD MODERN <br>
                    Jl cinta kanan 21 defi nurajijah <br>
                    Bandung, Jawa Barat,032021</th>
            </tr>
            <tr align="cente">
                <td>
                    <hr>
                </td>
            </tr>
            <tr align="center">
                <td>Tanggal : <?php echo $trx['tanggal_waktu'] ?> - Kasir : <?php echo $trx['nama'] ?></td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <table widht="500" border="0" cellpadding="3" callspacing="0">

                <?php $detail = mysqli_query($dbconnect, "SELECT * FROM transaksi_detail INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang INNER JOIN transaksi ON transaksi_detail.id_transaksi=transaksi.id_transaksi WHERE transaksi_detail.id_transaksi='$id_trx'") ?>
                <?php while ($data = mysqli_fetch_assoc($detail)) : ?>
                    <tr>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['qty'] ?></td>
                        <td aling="ringh"><?php echo $data['harga_barang'] ?></td>
                        <td aling="ringh"><?php echo $data['total'] ?></td>
                    </tr>
                <?php endwhile ?>

                <td colspan="4">
                    <hr>
                </td>
                </tr>
                <tr>
                    <td align="right" colspa="3">Total
                    <td align="right"><?php echo $trx['total_bayar'] ?></td>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspa="3">Bayar
                    <td align="right"><?php echo $trx['bayar'] ?></td>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspa="3">Kembali
                    <td align="right"><?php echo $trx['kembali'] ?></td>
                    </td>
                </tr>
            </table>
            <table width="500" border="0" cellpadding="1" cellspacing="0">
                <tr>
                    <td>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Terimakasih, Selamat Belajar Kembali</th>
                </tr>
                <tr>
                    <th>==== Layanan konsumen ====</th>
                </tr>
                <tr>
                    <th>SMS/CALL O83769546517</th>
                </tr>
            </table>
    </div>


    <script>
        window.print();
    </script>
    <a href="keranjang_reset.php"><input type="button" value="Kembali"></a>
</body>

</html>