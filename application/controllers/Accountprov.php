<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountprov extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
    }

    public function addkab() {
        $data['message'] = $this->session->flashdata('message');
        $data['provinces'] = $this->Account_model->get_provinces();
        $data['wilayah'] = $this->Account_model->get_wilayah();
        $this->load->view('template/header');
        $this->load->view('template/sidebarprov');
        $this->load->view('prov/add_accountkab', $data);
        $this->load->view('template/footer');
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
        $result = $this->Account_model->create_account($data);

        if ($result) {
            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('accountprov/addkab');
        } else {
            // Set flash data untuk pesan gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun!</div>');
            // Redirect kembali ke halaman tambah akun
            redirect('accountprov/addkab');
        }
    }
    public function get_cities() {
        $province_id = $this->input->post('province_id');
        $cities = $this->Account_model->get_cities_by_province($province_id);
        echo json_encode($cities);
    }
}