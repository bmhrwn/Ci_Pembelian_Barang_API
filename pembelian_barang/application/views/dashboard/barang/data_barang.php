<h1 class="mt-3">Data Barang</h1>
<button class="btn btn-primary mb-3 mt-3">Tambah Data</button>
<div class="col-6">
    <div class="form-control">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data_barang as $barang ) { ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $barang['nama_barang']?></td>
                    <td><?= $barang['qty']?></td>
                    <td>RP. <?= number_format($barang['harga'], 0, ",", ".") ?></td>
                    <td></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>