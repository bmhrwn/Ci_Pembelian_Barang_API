<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Barang extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }

    public function index_get()
    {
        $id_barang = $this->get('id_barang');
        if ($id_barang === null) {
            $barang = $this->ModelBarang->getBarang();
        } else {
            $barang = $this->ModelBarang->getBarang($id_barang);
        }
        if ($barang) {
            $this->response([
                'status' => true,
                'data' => $barang
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
        $id_barang = $this->delete('id_barang');

        if ($id_barang === null) {
            $this->response([
                'status' => false,
                'message' => 'Id tidak ditemukan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->ModelBarang->deleteBarang($id_barang) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $id_barang,
                    'message' => 'Berhasil Delete!'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Id tidak ditemukan!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post()
    {

        $data = [
            'nama_barang' => $this->post('nama_barang'),
            'qty'       => $this->post('qty'),
            'harga'     => $this->post('harga'),
        ];

        if ($this->ModelBarang->createBarang($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil menambahkan barang!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Tidak berhasil menambahkan barang!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {

        $id_barang = $this->put('id_barang');
        $data = [
            'nama_barang' => $this->put('nama_barang'),
            'qty'       => $this->put('qty'),
            'harga'     => $this->put('harga'),
        ];
        if ($this->ModelBarang->updateBarang($data, $id_barang) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil mengupdate barang!'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Tidak berhasil mengupdate barang!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
