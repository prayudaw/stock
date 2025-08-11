<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // Menampilkan halaman login
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $data['error_message'] = $this->session->flashdata('error');
        $this->load->view('login_form', $data);
    }

    // Memproses formulir login
    public function login_process()
    {
        $this->form_validation->set_message('required', 'Kolom %s Harus Diisi.');

        // Aturan validasi
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // Jika validasi gagal
        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user = $this->User_model->get_user_by_username($username, $password);
            if ($user) {

                $admin = array('YUDA');
                if (in_array($user->inisial, $admin)) {
                    $level = 'admin';
                } else {
                    $level = 'user';
                }

                // Login berhasil, buat sesi
                $user_data = array(
                    'kd_operator' => $user->kd_operator,
                    'inisial' => $user->inisial,
                    'nama' => $user->nama,
                    'level' => $level,
                    'logged_in' => TRUE
                );


                $this->session->set_userdata($user_data);

                // Redirect ke halaman dashboard
                redirect(INDEX_URL . 'dashboard/home');
            } else {
                // Login gagal
                $this->session->set_flashdata('error', 'Username atau Password salah. Silakan coba lagi.');
                redirect(INDEX_URL . 'auth');
            }
        }
    }

    // Logout
    public function logout()
    {
        $this->session->unset_userdata(array('kd_operator', 'inisial', 'nama', 'level', 'logged_in'));
        $this->session->sess_destroy();
        redirect(INDEX_URL . 'auth');
    }
}