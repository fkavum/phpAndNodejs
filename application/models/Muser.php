<?php


class muser extends CI_Model
{

    public function login($user)
    {
        $result = $this->db->query('select * from users where username=? and password=?', $user);

        if ($result->num_rows() > 0) {
            $this->session->set_userdata($result->row_array());
            return true;
        } else {
            return false;
        }
    }
}