<?php

use PhpParser\Node\Expr\FuncCall;

Class Export extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
        $this->load->model('ModelTransaksi');
    }
    public function excellbarang(){
        $data['title'] = 'Laporan Barang';
        $data['data_barang'] = $this->ModelBarang->getBarang();
        $this->load->view('dashboard/barang/excell/excell', $data);
    }
    public function pdfbarang(){
        $data['title'] = 'Laporan Barang';
        $data['data_barang'] = $this->ModelBarang->getBarang();
        $this->load->view('dashboard/barang/pdf/pdf', $data);
    }
    public function excelltransaksi(){
        $data['title'] = 'Laporan Transaksi';
        $data['data_transaksi'] = $this->ModelTransaksi->getTransaksi();
        $this->load->view('dashboard/transaksi/excell/excell', $data);
    }
}