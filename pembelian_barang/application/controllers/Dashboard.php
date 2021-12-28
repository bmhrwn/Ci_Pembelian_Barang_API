<?php

Class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
            $this->load->model('ModelBarang');
            $this->load->model('ModelTransaksi');
            $this->load->model('ModelLogin');
    }
    public function index(){
        $data = array(
            'title' => 'Halaman Utama Dashboard',
            'active_dashboard'    => 'active'
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/layout/dashboard');
        $this->load->view('dashboard/layout/footer');
    }
    public function data_barang(){
        $data = array(
            'title' => 'Halaman Data Barang',
            'data_barang' => $this->ModelBarang->getBarang(),
            'active_barang' => 'active'
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/barang/data_barang');
        $this->load->view('dashboard/layout/footer');
    }
    public function data_transaksi(){
        $data = array(
            'title' => 'Halaman Data Transaksi',
            'data_transaksi' => $this->ModelTransaksi->getTransaksi(),
            'data_barang'  => $this->ModelBarang->getBarang(),
            'data_customer' => $this->ModelLogin->getCustomer(),
            'active_transaksi' => 'active'
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/transaksi/data_transaksi');
        $this->load->view('dashboard/layout/footer');
    }
}