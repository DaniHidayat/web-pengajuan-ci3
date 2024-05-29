<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }

    public function add() {
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/add_accountpusat', $data);
        $this->load->view('template/footer');
    }

    public function addprov() {
        $data['provinces'] = $this->account_model->get_provinces();
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/add_accountprov', $data);
        $this->load->view('template/footer');
    }
    public function addkab() {
        $data['provinces'] = $this->account_model->get_provinces();
        $data['wilayah'] = $this->account_model->get_wilayah();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/add_accountkab', $data);
        $this->load->view('template/footer');
    }
    public function register() {
        // Ambil data dari form
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Menambahkan role 'pusat' ke dalam data
        $data = array(
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Enkripsi password sebelum disimpan
            'role' => 'pusat' // Menambahkan role 'pusat'
        );

        // Panggil model untuk menyimpan data ke dalam database
        $result = $this->account_model->create_account($data);

        if ($result) {
            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/add');
        } else {
            // Set flash data untuk pesan gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/add');
        }
    }
    public function registerprov() {
        // Ambil data dari form
        $name_prov = $this->input->post('name_prov');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $province_id = $this->input->post('province');
        $password = $this->input->post('password');

        // Menambahkan role 'pusat' ke dalam data
        $data = array(
            'name_prov' => $name_prov,
            'email' => $email,
            'username' => $username,
            'ID_Provinsi' => $province_id,
            'password' => $password,  // Enkripsi password sebelum disimpan
            'role' => 'provinsi' // Menambahkan role 'pusat'
        );

        // Panggil model untuk menyimpan data ke dalam database
        $result = $this->account_model->create_account($data);

        if ($result) {
            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/addprov');
        } else {
            // Set flash data untuk pesan gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/addprov');
        }
    }
    public function registerkab() {
        // Ambil data dari form
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        // $wilayah = $this->input->post('wilayah');
        $province_id = $this->input->post('province');
        $kabkota_id= $this->input->post('city');
        $password = $this->input->post('password');

        // Menambahkan role 'pusat' ke dalam data
        $data = array(
            'name' => $name,
            'email' => $email,
            'username' => $username,
            // 'wilayah' => $wilayah,
            'password' => $password, // Enkripsi password sebelum disimpan
            'role' => 'kabupaten_kota', // Menambahkan role 'pusat'
            'ID_Provinsi' => $province_id,
            'ID_KotaKab' => $kabkota_id
        );

        // Panggil model untuk menyimpan data ke dalam database
        $result = $this->account_model->create_account($data);

        if ($result) {
            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/addkab');
        } else {
            // Set flash data untuk pesan gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('account/addkab');
        }
    }
    public function get_cities() {
        $province_id = $this->input->post('province_id');
        $cities = $this->account_model->get_cities_by_province($province_id);
        echo json_encode($cities);
    }
}