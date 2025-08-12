<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_stock_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_operator_stock_filtered($filters)
    {
        $this->db->select('*');
        $this->db->from('stock');

        // Logika Filter
        if (!empty($filters['name'])) {
            $this->db->like('name', $filters['name']);
        }
        // if (!empty($filters['category'])) {
        //     $this->db->where('category', $filters['category']);
        // }
        // if (!empty($filters['min_price'])) {
        //     $this->db->where('price >=', $filters['min_price']);
        // }
        // if (!empty($filters['max_price'])) {
        //     $this->db->where('price <=', $filters['max_price']);
        // }

        // Contoh untuk DataTables (pagination, sorting, searching)
        if (isset($_POST['length']) && $_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $order_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $order_dir = $_POST['order'][0]['dir'];
        $this->db->order_by($order_column, $order_dir);

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('stock');
    }

    public function count_filtered($filters)
    {
        $this->db->from('stock');
        if (!empty($filters['name'])) {
            $this->db->like('name', $filters['name']);
        }
        // if (!empty($filters['category'])) {
        //     $this->db->where('category', $filters['category']);
        // }
        // if (!empty($filters['min_price'])) {
        //     $this->db->where('price >=', $filters['min_price']);
        // }
        // if (!empty($filters['max_price'])) {
        //     $this->db->where('price <=', $filters['max_price']);
        // }
        return $this->db->count_all_results();
    }
}
