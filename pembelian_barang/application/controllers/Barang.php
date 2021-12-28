<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }
    public function tambahbarang()
    {

        $nama_barang = $this->input->post('nama_barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');

        if ($nama_barang != null && $qty != null && $harga != null) {
            $data = array(
                'nama_barang' => $nama_barang,
                'qty'   => $qty,
                'harga' => $harga
            );
            $this->ModelBarang->createBarang($data);
            $this->session->set_flashdata('msgg', 'Data Berhasil Ditambahkan!');
            redirect(base_url('dashboard/data_barang'));
        } else {
            $this->session->set_flashdata('msg', 'Data Tidak Boleh Kosong!');
            redirect(base_url('dashboard/data_barang'));
        }
    }
    public function updatebarang()
    {
        $id_barang = $this->uri->segment(3);
        $nama_barang = $this->input->post('nama_barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');

        if ($nama_barang != null && $qty != null && $harga != null) {
          $data = array(
            'nama_barang' => $nama_barang,
            'qty'       => $qty,
            'harga'     => $harga
          );
          $this->ModelBarang->updateBarang($data, $id_barang);
          $this->session->set_flashdata('msgg', 'Data Berhasil DiUpdate!');
          redirect(base_url('dashboard/data_barang'));
        } else {
            $this->session->set_flashdata('msg', 'Data Tidak Boleh Kosong!');
            redirect(base_url('dashboard/data_barang'));
        }
    }
    public function deletebarang(){
        $id_barang = $this->uri->segment(3);

        $this->ModelBarang->deleteBarang($id_barang);
        $this->session->set_flashdata('msgg', 'Data Berhasil DiHapus!');
        redirect(base_url('dashboard/data_barang'));

    }
}
