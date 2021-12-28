<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Transaksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelTransaksi');
    }
    public function index_get()
    {
        $id_transaksi = $this->get('id_transaksi');

        if ($id_transaksi != null) {
            $dataTransaksi = $this->ModelTransaksi->getTransaksi($id_transaksi);
        } else {
            $dataTransaksi = $this->ModelTransaksi->getTransaksi();
        }
        if ($dataTransaksi) {
            $this->response([
                'status' => true,
                'data' => $dataTransaksi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'massage' => 'Data Tidak Ditemukan!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id_transaksi = $this->delete('id_transaksi');

        if ($id_transaksi != null) {
            $dataTerhapus = $this->ModelTransaksi->deleteTransaksi($id_transaksi);
            $this->response([
                'status' => true,
                'data'  => $dataTerhapus,
                'message' => 'Berhasil Delete!'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Id tidak ditemukan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_post()
    {
        $data = [
            'id_barang' => $this->post('id_barang'),
            'id_users' => $this->post('id_users'),
            'tanggal_transaksi'       => $this->post('tanggal_transaksi'),
            'jumlah_barang'     => $this->post('jumlah_barang'),
            'total_harga'     => $this->post('total_harga'),
        ];

        if ($this->ModelTransaksi->insertTransaksi($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil menambahkan data!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Tidak berhasil menambahkan data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {

        $id_transaksi = $this->put('id_transaksi');
        $data = [
            'id_barang' => $this->put('id_barang'),
            'id_users' => $this->put('id_users'),
            'tanggal_transaksi' => $this->put('tanggal_transaksi'),
            'jumlah_barang'       => $this->put('jumlah_barang'),
            'total_harga'     => $this->put('total_harga'),
        ];
        if ($this->ModelTransaksi->updateTransaksi($id_transaksi, $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil mengupdate barang!'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Tidak berhasil mengupdate barang!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
