<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>

<h3>Laporan Transaksi Tanggal : <?= date('d F y') ?></h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Nama Barang</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($data_transaksi as $transaksi) { ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td> <?= $transaksi['nama_lengkap'] ?></td>
                <td> <?= $transaksi['nama_barang'] ?></td>
                <td><?= date('d F Y', strtotime($transaksi['tanggal_transaksi'])) ?></td>
                <td><?= $transaksi['jumlah_barang'] ?></td>
                <td>RP. <?= number_format($transaksi['harga'] * $transaksi['jumlah_barang'], 0, ",", ".") ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>