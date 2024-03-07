<?php
include 'config.php';
$barang = mysqli_query($dbconnect, "SELECT * FROM barang");
$sum = 0;

?>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Transaksi</h6>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="keranjang_act.php" class="form-inline">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control" name="id_barang">
                                    <option value>Pilih Barang</option>
                                    <?php while ($row = mysqli_fetch_array($barang)) { ?>
                                        <option value="<?php echo $row['id_barang'] ?>">
                                            <?= $row['nama_barang'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="qty" class="form-control" placeholder="jumlah">
                        </div>
                        <div class="col-md-1">
                            <button class='btn btn-primary' type="submit">Tambah</button>
                        </div>
                        <div class="col-md-2">
                            <p class="text-sm mb-0">
                                <span class="font-weight-bold btn btn-secondary">
                                    <a href="keranjang_reset.php">Reset Keranjang</a>
                                </span>
                            </p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Barang</h6>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th style="width:100px">Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <form action="keranjang_update.php" method="POST">
                                <?php $total_bayar = 0; ?>
                                <?php foreach ($_SESSION["cart"] as $id_barang => $jumlah) : ?>
                                    <?php
                                    $ambil = $dbconnect->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
                                    $pecah = $ambil->fetch_assoc();
                                    $Subharga = $pecah['harga_barang'] * $jumlah;

                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $pecah['nama_barang'] ?>
                                        </td>
                                        <td class="text-end">
                                            <?php echo number_format($pecah['harga_barang'], 2) ?>
                                        </td>
                                        <td class="float-end">
                                            <input type="number" name="qty[<?php echo $pecah['id_barang'] ?>]" value="<?php echo $jumlah ?>" class="form-control">
                                        </td>
                                        <td class="text-end">
                                            <?php $subtotal = $jumlah * $pecah['harga_barang'] ?>
                                            <?php echo number_format($subtotal, 2) ?>
                                        </td>
                                        <td>
                                            <a href="keranjang_hapus.php?id=<?= $id_barang ?>">
                                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                                    <i class="ni ni-fat-remove"></i>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $total_bayar += $Subharga ?>
                                <?php endforeach ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="3" class="text-end">
                                        <input type="submit" value="update Jumalah Barang" class="btn btn-success">
                                    </td>
                                </tr>
                            </form>
                        <?php endif ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Pembeli</h6>
            </div>
            <div class="card-body p-3">

                <form action="transaksi_act.php" method="POST" target="_blank">
                    <div class="form-group">
                        <label>Total Belanja</label>
                        <?php if (!empty($total_bayar)) : ?>
                            <input type="text" id="bayar" class="form-control" value="<?= number_format($total_bayar) ?>">
                        <?php endif ?>

                        <input type="hidden" id="bayar" name="total" class="form-control" value="<?= $total_bayar ?>">
                    </div>
                    <div class="form-group">
                        <label>Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>
        </div>
    </div>
</div>