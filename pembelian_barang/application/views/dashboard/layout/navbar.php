<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Rest-Api</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php if(isset($active_dashboard)) { ?>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url()?>dashboard">Home</a>
          </li>
          <?php }else{  ?>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url()?>dashboard">Home</a>
          </li>
            <?php } ?>
            <?php if(isset($active_barang)) { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url()?>dashboard/data_barang">Data Barang</a>
          </li>
          <?php }else{ ?>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url()?>dashboard/data_barang">Data Barang</a>
          </li>
            <?php } ?>
            <?php if(isset($active_transaksi)) { ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url()?>dashboard/data_transaksi">Data Transaksi</a>
          </li>
          <?php }else{ ?>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>dashboard/data_transaksi">Data Transaksi</a>
          </li>
            <?php }?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>login/logout">Logout</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>