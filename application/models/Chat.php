<?php
defined('BASEPATH') or exit('No direct script access allowed');

class chat extends CI_Model
{


    public function post($message)
    {
        // return $this->session->userdata('username');
        return $this->db->insert('message', [
            'userId' => $this->session->userdata('userId'),
            'username' => $this->session->userdata('username'),
            'message' => $message
        ]);
    }
}