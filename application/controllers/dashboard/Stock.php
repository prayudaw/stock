<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
}