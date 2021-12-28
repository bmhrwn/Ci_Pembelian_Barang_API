<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2>Halaman Utama Dashboard</h2>


            <div class="card mt-3" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <hr>
                    <div class="form-control">
                    <h4 class="card-subtitle mb-2 text-muted"><?= $this->session->userdata('nama_lengkap')?></h6>
                    <p class="card-text"><?= $this->session->userdata('email')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>