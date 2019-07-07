<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("muser");
    }


    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $usr = ['username' => $this->input->post('username'), 'password' => $this->input->post('password')];

        if ($this->muser->login($usr)) {
            redirect('home');
        } else {
            redirect('user');
        }
    }


    public function logout()
    {


        $this->session->sess_destroy();
        redirect('user');
    }
}