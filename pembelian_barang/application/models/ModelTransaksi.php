<?php

Class ModelTransaksi extends CI_Model{
    public function getTransaksi($id_transaksi = null){
        if($id_transaksi === null){
        $sql = "SELECT * FROM tbl_transaksi,tbl_barang,tbl_users
            WHERE
            tbl_transaksi.id_users = tbl_users.id_users and
            tbl_transaksi.id_barang = tbl_barang.id_barang ORDER BY tbl_transaksi.id_transaksi DESC";
            return $this->db->query($sql)->result_array();
        }else{
            $sql = "SELECT * FROM tbl_transaksi,tbl_barang,tbl_users
            WHERE
            tbl_transaksi.id_users = tbl_users.id_users and
            tbl_transaksi.id_barang = tbl_barang.id_barang AND
            tbl_transaksi.id_transaksi = ? ORDER BY tbl_transaksi.id_transaksi DESC";
            return $this->db->query($sql,$id_transaksi)->result_array();
        }
    }
    public function insertTransaksi($data){
        return $this->db->insert('tbl_transaksi', $data);
    }
    public function deleteTransaksi($id_transaksi){
        $this->db->delete('tbl_transaksi', array('id_transaksi' => $id_transaksi));
       return $this->db->affected_rows();
    }
    public function updateTransaksi($id_transaksi, $data){
        $this->db->update('tbl_transaksi', $data, array('id_transaksi' => $id_transaksi));
        return $this->db->affected_rows();
    }
}