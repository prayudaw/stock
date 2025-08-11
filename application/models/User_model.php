<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan email
    public function get_user_by_username($username, $password)
    {
        $query = $this->db->get_where('operator', array('inisial' => $username, 'password' => $password));
        return $query->row();
    }
}