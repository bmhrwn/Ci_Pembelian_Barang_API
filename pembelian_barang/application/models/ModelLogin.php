<?php

Class ModelLogin extends CI_Model{
        public function getUsername($username){
            return $this->db->get_where('tbl_users', array('username' => $username))->row_array();
        }
    }
