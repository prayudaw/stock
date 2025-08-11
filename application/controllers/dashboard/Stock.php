<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator_stock_model');
        // Cek apakah pengguna sudah login
        // if (!$this->session->userdata('logged_in')) {
        //     redirect(INDEX_URL . 'auth');
        // }
    }

    public function index()
    {
        // $this->load->view('dashboard/stock');
    }

    public function scan_stock()
    {
        $this->load->view('dashboard/stock');
    }


    public function operator()
    {
        $this->load->view('dashboard/operator');
    }


    public function get_operator_stock_data()
    {
        $filters = $this->input->post('filters'); // Ambil filter dari AJAX POST

        $list = $this->operator_stock_model->get_operator_stock_filtered($filters);
        $data = array();

        // var_dump($list);
        // die();

        $no = $this->input->post('start');
        foreach ($list as $list_data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list_data->barcode;
            $row[] = $list_data->kd_buku;
            $row[] = $list_data->operator;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->operator_stock_model->count_all(),
            "recordsFiltered" => $this->operator_stock_model->count_filtered($filters),
            "data" => $data,
        );

        echo json_encode($output);
    }
}