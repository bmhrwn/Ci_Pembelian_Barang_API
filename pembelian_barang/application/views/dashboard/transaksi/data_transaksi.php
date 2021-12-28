<h1 class="mt-3">Data Transaksi</h1>
<?php if ($this->session->flashdata('msg')) { ?>
    <div class="col-8">
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('msg') ?>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('msgg')) { ?>
    <div class="col-8">
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('msgg') ?>
        </div>
    </div>
<?php } ?>
<button onClick="tambahTransaksi('<?= base_url() ?>transaksi/tambahtransaksi')" type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    Tambah Data
</button>
<a href="<?= base_url()?>export/pdfbarang" class="btn btn-danger mt-3 mb-3">Export Pdf</a>
<a href="<?= base_url()?>export/excelltransaksi" class="btn btn-success mt-3 mb-3">Export Excell</a>
<div class="col-8">
    <div class="form-control">
        <table class="table mb-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach($data_transaksi as $transaksi) { ?>
                    <tr>
                        <td scope="row"><?= $i++?></td>
                        <td> <?= $transaksi['nama_lengkap']?></td>
                        <td> <?= $transaksi['nama_barang']?></td>
                        <td><?= date('d F Y',strtotime($transaksi['tanggal_transaksi'])) ?></td>
                        <td><?= $transaksi['jumlah_barang']?></td>
                        <td>RP. <?= number_format($transaksi['harga'] * $transaksi['jumlah_barang'], 0, ",", ".") ?></td>
                        <td>
                            <button onClick="updateBarang('<?= base_url() ?>transaksi/updatetransaksi/<?= $transaksi['id_transaksi']?>','<?= $transaksi['id_users']?>','<?= $transaksi['id_barang']?>','<?= $transaksi['tanggal_transaksi']?>','<?= $transaksi['jumlah_barang']?>')" type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button onClick="deleteTransaksi('<?= base_url() ?>transaksi/deletetransaksi/<?= $transaksi['id_transaksi']?>')" type="button" class="btn btn-danger mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modalDelete">
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
                    <label for="">Nama Customer</label>
                    <select class="form-control" name="nama_lengkap" id="nama_lengkap">
                      <option value="">--Pilih Nama Customer--</option>
                      <?php foreach($data_customer as $customer) { ?>
                        <option value="<?= $customer['id_users']?>"><?= $customer['nama_lengkap']?></option>  
                        <?php } ?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="">Nama Barang</label>
                    <select class="form-control" name="nama_barang" id="nama_barang">
                      <option value="">--Pilih Nama Barang--</option>
                      <?php foreach($data_barang as $barang) {?>
                        <option value="<?= $barang['id_barang']?>"><?= $barang['nama_barang']?></option>  
                        <?php } ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" aria-describedby="emailHelp">
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
    function tambahTransaksi(base_url) {
        document.getElementById('title').innerHTML = "Form Tambah Transaksi";
        document.getElementById('form').action = base_url;
        document.getElementById('nama_barang').value = "";
        document.getElementById('nama_lengkap').value = "";
        document.getElementById('tanggal_transaksi').value = "";
        document.getElementById('jumlah_barang').value = "";
        document.getElementById('button').innerHTML = "Tambah Data"
    }

    function updateBarang(base_url,users,barang,tanggal,jumlah) {
        document.getElementById('title').innerHTML = "Form Update Transaksi";
        document.getElementById('form').action = base_url;
        document.getElementById('nama_barang').value = barang;
        document.getElementById('nama_lengkap').value = users;
        document.getElementById('tanggal_transaksi').value = tanggal;
        document.getElementById('jumlah_barang').value = jumlah;
        document.getElementById('button').innerHTML = "Update Data"
    }

    function deleteTransaksi(base_url) {
        document.getElementById('button_delete').href = base_url;
    }
</script>