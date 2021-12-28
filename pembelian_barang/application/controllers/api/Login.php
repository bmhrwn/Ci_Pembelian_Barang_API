<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLogin');
    }
    public function index_get(){
        $username = $this->get('username');
        if($username != null){
          $dataUser = $this->ModelLogin->getUsername($username);
        }else{
            $this->response([
                'status' => false,
                'massage' => 'Data Tidak Ditemukan!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        if($dataUser){
            $this->response([
                'status' => true,
                'data' => $dataUser
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'massage' => 'Data Tidak Ditemukan!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    }