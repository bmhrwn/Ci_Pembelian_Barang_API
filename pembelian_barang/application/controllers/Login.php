<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLogin');
    }
    public function index()
    {
        $this->load->view('login/index');
    }
    public function proseslogin()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username != null && $password != null) {
            $dataUsers = $this->ModelLogin->getUsername($username);
            if ($dataUsers != null) {
                $db_password = $dataUsers['password'];
                if ($password == $db_password) {
                    $this->session->set_userdata('username', $dataUsers['username']);
                    $this->session->set_userdata('nama_lengkap', $dataUsers['nama_lengkap']);
                    $this->session->set_userdata('email', $dataUsers['email']);
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('msg', 'Password Anda Masukkan Salah!');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('msg', 'Username Tidak Terdaftar!');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('msg', 'Username dan Password Tidak Boleh Kosong!');
            redirect(base_url());
        }
    }
    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}
