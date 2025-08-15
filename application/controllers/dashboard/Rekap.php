<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekap_model');
        // Cek apakah pengguna sudah login
        // if (!$this->session->userdata('logged_in')) {
        //     redirect(INDEX_URL . 'auth');
        // }
    }

    public function index()
    {
        $this->load->view('dashboard/rekap/list');
    }

    public function get_list_rekap()
    {

        $list = $this->rekap_model->get_datatables();
        $data = array();

        $no = $this->input->post('start');
        foreach ($list as $list_data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list_data->bc;
            $row[] = $list_data->jm;
            $row[] = '<div class="form-button-action" style="width:100px">
            				<a href="javascript:void(0)" id="proses_rekap" data-id="' . $list_data->bc . '" class="btn btn-primary btn-sm  me-2"><i class ="fa fa-edit"></i> Hasil Rekap</a>									
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->rekap_model->count_all(),
            "recordsFiltered" => $this->rekap_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function proses_rekap()
    {
        $jenis_koleksi = $this->input->post('jenis_koleksi');
        $num_data_scan_by_jns_koleksi = $this->rekap_model->get_data_scan_by_jns_koleksi($jenis_koleksi);
        $num_item_buku_by_jns_koleksi = $this->rekap_model->get_total_item_buku_by_jns_koleksi($jenis_koleksi);
        $num_transaksi_by_jns_koleksi = $this->rekap_model->get_total_transaksi_by_jns_koleksi($jenis_koleksi);


        $total_scan_valid = $num_data_scan_by_jns_koleksi;
        $hitung_persen = ($total_scan_valid * 100) / $num_item_buku_by_jns_koleksi;

        $persen_total_scan_valid = round($hitung_persen, 2);

        $selish = $num_item_buku_by_jns_koleksi -  $total_scan_valid;

        $persen_selisih = 100 - $persen_total_scan_valid;


        $response = array(
            'status' => 1,
            'total_scan_valid' =>  $total_scan_valid,
            'persen_total_scan_valid' =>  $persen_total_scan_valid,
            'total_koleksi' =>  $num_item_buku_by_jns_koleksi,
            'jenis_koleksi' =>  $jenis_koleksi,
            'selesih' => $selish,
            'persen_selisih' => $persen_selisih,
        );

        // Kirim respons dalam format JSON
        echo json_encode($response);
    }

    public function rekap_semua()
    {

        $num_data_scan = $this->rekap_model->get_data_scan();
        $num_item_buku = $this->rekap_model->get_total_item_buku();

        $total_scan_valid = $num_data_scan;

        $hitung_persen = ($total_scan_valid * 100) / $num_item_buku;
        $persen_total_scan_valid = round($hitung_persen, 2);
        $selish = $num_item_buku -  $num_data_scan;
        $persen_selisih = 100 - $persen_total_scan_valid;


        $response = array(
            'status' => 1,
            'total_scan_valid' =>  $total_scan_valid,
            'persen_total_scan_valid' =>  $persen_total_scan_valid,
            'total_koleksi' =>  $num_item_buku,
            'selesih' => $selish,
            'persen_selisih' => $persen_selisih,
        );

        // Kirim respons dalam format JSON
        echo json_encode($response);
    }
}
