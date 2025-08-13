<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator_stock_model');
        $this->load->model('operator_stock_detail_model');
        $this->load->model('stock_model');
        // Cek apakah pengguna sudah login
        // if (!$this->session->userdata('logged_in')) {
        //     redirect(INDEX_URL . 'auth');
        // }
    }

    public function index()
    {
        // $this->load->view('dashboard/stock');
    }


    public function list_stock()
    {
        $this->load->view('dashboard/list_stock');
    }

    public function get_list_stock()
    {

        $list = $this->stock_model->get_datatables();
        $data = array();

        $no = $this->input->post('start');
        foreach ($list as $list_data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list_data->barcode;
            $row[] = $list_data->kd_buku;
            $row[] = $list_data->operator;
            $row[] = $list_data->tgl;
            $row[] = "";
            // $row[] = '<div class="form-button-action">
            // 				<a href="' . site_url("dashboard/stock/detail_operator?operator=") . $list_data->operator . '" data-bs-toggle="tooltip" title="Detail" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
            // 					<i class="fa fa-edit"></i>
            // 				</a>									
            // 		</div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->stock_model->count_all(),
            "recordsFiltered" => $this->stock_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }


    public function scan_stock()
    {
        $this->load->view('dashboard/stock');
    }

    public function proccess_scan()
    {
        $barcode = trim($this->input->post('scan'));

        $check_stock = $this->stock_model->get_stock_by_barcode($barcode);

        // Panggil model untuk mencari produk berdasarkan barcode
        $check_buku = $this->stock_model->get_item_buku_by_barcode($barcode);

        if ($check_buku) {

            $check_stock = $this->stock_model->get_stock_by_barcode($barcode);
            if ($check_stock) {
                $response = array(
                    'status' => 'gagal',
                    'message' => 'Buku Sudah Diproses'
                );
            } else {
                // Produk ditemukan, berikan respons sukses
                $insert_data = array(
                    'barcode' => $barcode,
                    'kd_buku' => $check_buku['kd_buku'],
                    'tgl' => date('Y-m-d h:i:s'),
                    'operator' => $this->session->userdata('nama')
                );


                $insert_stock = $this->stock_model->insert_stock($insert_data);

                $response = array(
                    'status' => 'success',
                    'message' => 'Buku ditemukan.',
                    'data' => $check_buku
                );
            }
        } else {
            $response = array(
                'status' => 'gagal',
                'message' => 'Buku tidak ditemukan.',
            );
        }

        // Kirim respons dalam format JSON
        echo json_encode($response);
    }


    public function operator()
    {
        $this->load->view('dashboard/operator');
    }


    public function detail_operator()
    {

        $data = array(
            'operator' => $this->input->get('operator')
        );


        $this->load->view('dashboard/detail_operator', $data);
    }


    public function get_operator_stock_data()
    {
        $list = $this->operator_stock_model->get_datatables();
        $data = array();

        $no = $this->input->post('start');
        foreach ($list as $list_data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list_data->operator;
            $row[] = $list_data->jml;
            $row[] = $list_data->mn;
            $row[] = $list_data->mx;
            $row[] = '<div class="form-button-action">
							<a href="' . site_url("dashboard/stock/detail_operator?operator=") . $list_data->operator . '" data-bs-toggle="tooltip" title="Detail" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
								<i class="fas fa-eye"> Lihat </i>
							</a>									
					</div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->operator_stock_model->count_all(),
            "recordsFiltered" => $this->operator_stock_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }


    public function get_operator_stock_detail()
    {
        $operator = $this->input->get('operator');
        $list = $this->operator_stock_detail_model->get_datatables($operator);
        $data = array();

        $no = $this->input->post('start');
        foreach ($list as $list_data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list_data->barcode;
            $row[] = $list_data->kd_buku;
            $row[] = $list_data->operator;
            $row[] = $list_data->tgl;
            $row[] = "";
            // $row[] = '<div class="form-button-action">
            // 				<a href="' . site_url("dashboard/stock/detail_operator?operator=") . $list_data->operator . '" data-bs-toggle="tooltip" title="Detail" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
            // 					<i class="fa fa-edit"></i>
            // 				</a>									
            // 		</div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->operator_stock_detail_model->count_all($operator),
            "recordsFiltered" => $this->operator_stock_detail_model->count_filtered($operator),
            "data" => $data,
        );

        echo json_encode($output);
    }
}
