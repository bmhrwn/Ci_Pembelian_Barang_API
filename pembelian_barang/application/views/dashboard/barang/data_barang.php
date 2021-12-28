<h1 class="mt-3">Data Barang</h1>
<?php if ($this->session->flashdata('msg')) { ?>
    <div class="col-6">
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('msg') ?>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('msgg')) { ?>
    <div class="col-6">
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('msgg') ?>
        </div>
    </div>
<?php } ?>
<button onClick="tambahBarang('<?= base_url() ?>barang/tambahbarang')" type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    Tambah Data
</button>
<a href="<?= base_url()?>export/pdfbarang" class="btn btn-danger mt-3 mb-3">Export Pdf</a>
<a href="<?= base_url()?>export/excellbarang" class="btn btn-success mt-3 mb-3">Export Excell</a>
<div class="col-6">
    <div class="form-control">
        <table class="table mb-3">
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
                <?php $i = 1;
                foreach ($data_barang as $barang) { ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $barang['nama_barang'] ?></td>
                        <td><?= $barang['qty'] ?></td>
                        <td>RP. <?= number_format($barang['harga'], 0, ",", ".") ?></td>
                        <td>
                            <button onClick="updateBarang('<?= base_url() ?>barang/updatebarang/<?= $barang['id_barang'] ?>','<?= $barang['nama_barang'] ?>','<?= $barang['qty'] ?>','<?= $barang['harga'] ?>')" type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button onClick="deleteBarang('<?= base_url() ?>barang/deletebarang/<?= $barang['id_barang'] ?>')" type="button" class="btn btn-danger mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="qty" id="qty" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" name="harga" id="harga" aria-describedby="emailHelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="sumbit" id="button" class="btn btn-primary"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Form Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Untuk Menghapus Data Tersebut?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a type="sumbit" href="" id="button_delete" class="btn btn-primary">Hapus Data</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function tambahBarang(base_url) {
        document.getElementById('title').innerHTML = "Form Tambah Barang";
        document.getElementById('form').action = base_url;
        document.getElementById('nama_barang').value = "";
        document.getElementById('qty').value = "";
        document.getElementById('harga').value = "";
        document.getElementById('button').innerHTML = "Tambah Data"
    }

    function updateBarang(base_url, nama, jumlah, harga) {
        document.getElementById('title').innerHTML = "Form Update Barang";
        document.getElementById('form').action = base_url;
        document.getElementById('nama_barang').value = nama;
        document.getElementById('qty').value = jumlah;
        document.getElementById('harga').value = harga;
        document.getElementById('button').innerHTML = "Update Data"
    }

    function deleteBarang(base_url) {
        document.getElementById('button_delete').href = base_url;
    }
</script>