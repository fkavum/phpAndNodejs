<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('dashboard');
    }


    public function post()
    {
        $message = $this->input->post('msg');
        // generate json 
        $buffer = json_encode(['key' => session_id(), 'username' => $this->session->userdata('username'), 'message' => $message]);

        //connection node
        if ($this->channel->send($buffer)) {
            // connection mysql
            $this->load->model('chat');
            echo $this->chat->post($message);
        } else {
            echo false;
        }
    }
}