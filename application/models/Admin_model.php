<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUsers()
    {
        return $this->db->get('users')->result_array();
    }
    public function getUsersById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }
}
