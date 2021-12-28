<?php 

Class Transaksi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
        $this->load->model('ModelTransaksi');

    }
    public function tambahtransaksi(){
        $id_users = $this->input->post('nama_lengkap');
        $id_barang = $this->input->post('nama_barang');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $jumlah_barang = $this->input->post('jumlah_barang');
    

        $dataBarang = $this->ModelBarang->getBarang($id_barang);
        $harga = $dataBarang['harga'];
        $total_harga = $harga * $jumlah_barang;
     
        if($id_users != null && $id_barang != null && $tanggal_transaksi != null && $jumlah_barang != null) {
            
            $data = array(
                'id_users' => $id_users,
                'id_barang' => $id_barang,
                'tanggal_transaksi' => $tanggal_transaksi,
                'jumlah_barang'     => $jumlah_barang,
                'total_harga'   => $total_harga
            );
            $this->ModelTransaksi->insertTransaksi($data);
            $this->session->set_flashdata('msgg', 'Data Berhasil Ditambahkan!');
            redirect(base_url('dashboard/data_transaksi'));
        }else{
            $this->session->set_flashdata('msg', 'Data Tidak Boleh Kosong!');
            redirect(base_url('dashboard/data_transaksi'));
        }
    }
    public function deletetransaksi(){
        $id_transaksi = $this->uri->segment(3);

        $this->ModelTransaksi->deleteTransaksi($id_transaksi);
        $this->session->set_flashdata('msgg', 'Data Berhasil DiHapus!');
        redirect(base_url('dashboard/data_transaksi'));
    }
    public function updatetransaksi(){
        $id_transaksi = $this->uri->segment(3);

        $id_users = $this->input->post('nama_lengkap');
        $id_barang = $this->input->post('nama_barang');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $jumlah_barang = $this->input->post('jumlah_barang');

        $dataBarang = $this->ModelBarang->getBarang($id_barang);
        $harga = $dataBarang['harga'];
        $total_harga = $harga * $jumlah_barang;

        if($id_users != null && $id_barang != null && $tanggal_transaksi != null && $jumlah_barang != null) {
            $data = array(
                'id_users' => $id_users,
                'id_barang' => $id_barang,
                'tanggal_transaksi' => $tanggal_transaksi,
                'jumlah_barang'     => $jumlah_barang,
                'total_harga'   => $total_harga
            );
            $this->ModelTransaksi->updateTransaksi($id_transaksi, $data);
            $this->session->set_flashdata('msgg', 'Data Berhasil Diupdate!');
            redirect(base_url('dashboard/data_transaksi'));
        }else{
            $this->session->set_flashdata('msg', 'Data Tidak Boleh Kosong!');
            redirect(base_url('dashboard/data_transaksi'));
        }


    }
}