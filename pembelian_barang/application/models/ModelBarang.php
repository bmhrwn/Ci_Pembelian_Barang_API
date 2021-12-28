<?php

Class ModelBarang extends CI_Model{
    public function getBarang($id_barang = null){

        if($id_barang === null){
            return $this->db->get('tbl_barang')->result_array();
        }else{
            return $this->db->get_where('tbl_barang', array('id_barang' => $id_barang))->result_array();
        }
    }
   public function deleteBarang($id_barang){
       $this->db->delete('tbl_barang', array('id_barang' => $id_barang));
       return $this->db->affected_rows();
   }
   public function createBarang($data){
       $this->db->insert('tbl_barang', $data);
       return $this->db->affected_rows();
   }
   public function updateBarang($data, $id_barang){
       $this->db->update('tbl_barang', $data, array('id_barang' => $id_barang));
       return $this->db->affected_rows();
   }
}