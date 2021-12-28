<?php

Class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
            $this->load->model('ModelBarang');
    }
    public function index(){
        $data = array(
            'title' => 'Halaman Data Barang',
            'data_barang' => $this->ModelBarang->getBarang()
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/barang/data_barang');
        $this->load->view('dashboard/layout/footer');
    }
}