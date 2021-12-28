<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>

<h3>Laporan Barang Tanggal : <?= date('d F y')?></h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $i= 1; foreach($data_barang as $barang) { ?> 
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $barang['id_barang']?></td>
            <td><?= $barang['nama_barang']?></td>
            <td><?= $barang['qty']?></td>
            <td>RP. <?= number_format($barang['harga'], 0, ",", ".") ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>