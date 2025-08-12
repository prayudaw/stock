<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mendapatkan data exemplar buku berdasarkan barcode
    public function get_item_buku_by_barcode($barcode)
    {
        $this->db->where('no_barcode', $barcode);
        $query = $this->db->get('item_buku'); // table item_buku
        return $query->row_array();
    }
}
