<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{

    private $table = "stock_v2";
    private $column_order = array('bc', 'jm');
    // private $column_search = array('operator', 'barcode', 'kd_buku', 'tgl');
    private $order = array('bc' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    private function _get_datatables_query()
    {
        $this->db->select('substr(barcode,3,2) as bc, count(substr(barcode,3,2)) as jm');
        $this->db->from($this->table);
        $this->db->group_by('bc');




        // jika datatable mengirim POST untuk order
        if ($this->input->post('order')) {
            $Order = $this->input->post('order');
            $this->db->order_by($this->column_order[$Order['0']['column']], $Order['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select('substr(barcode,3,2) as bc, count(substr(barcode,3,2)) as jm');
        $this->db->from($this->table);
        $this->db->group_by('bc');
        return $this->db->count_all_results();
    }


    public function get_data_scan()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function get_total_item_buku()
    {
        $this->db->from('item_buku');
        $query = $this->db->get();
        return $query->num_rows();
    }



    public function get_data_scan_by_jns_koleksi($jns_koleksi)
    {
        $this->db->from($this->table);
        $this->db->where('substr(barcode,3,2) ="' . $jns_koleksi . '" ');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_total_item_buku_by_jns_koleksi($jns_koleksi)
    {
        $this->db->from('item_buku');
        $this->db->where('substr(no_barcode,3,2) ="' . $jns_koleksi . '" ');
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function get_total_transaksi_by_jns_koleksi($jns_koleksi)
    {
        $this->db->from('transaksi');
        $this->db->where('substr(no_barcode,3,2) ="' . $jns_koleksi . '" ');
        $this->db->where('tgl_dikembalikan = "0000-00-00"');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
