<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends CI_Controller {
        public function __construct() {
                parent::__construct();
                $this->load->model('account_model');
                $this->load->model('pengajuan_model');
            }
	public function index()
	{
        
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departement');
        $this->load->view('template/footer');
	}
    public function akunprov()
	{
                $data['users'] = $this->account_model->get_prov_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/akunprov',$data);
        $this->load->view('template/footer');
	}
    public function akunkabkota()
	{
                $data['users'] = $this->account_model->get_kab_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/akunkab',$data);
        $this->load->view('template/footer');
	}
    public function anggaran()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggaran();
                $this->load->view('template/header');
                $this->load->view('template/sidebardepartement');
                $this->load->view('departemen/anggaran_pengajuan',$data);
                $this->load->view('template/footer');
	}
    public function anggarankabkota()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarankab();
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/anggaran_pengajuan1',$data);
        $this->load->view('template/footer');
	}
        public function lihatpengajuan()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/lihatpengajuan');
        $this->load->view('template/footer');
	}
        public function lihatpengajuandetailprov()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/lihatpengajuandetailprov');
        $this->load->view('template/footer');
	}
    public function Profile()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/setting');
        $this->load->view('template/footer');
	}
    public function faq()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/faq');
        $this->load->view('template/footer');
	}
        public function wilayah()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarankab();
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/detaipengajuanprov',$data);
        $this->load->view('template/footer');
	}

    public function editpengajuan()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/editanggaran');
        $this->load->view('template/footer');
	}
        public function anggaran_pengajuan()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebardepartement');
        $this->load->view('departemen/editanggaran');
        $this->load->view('template/footer');
	}
   
        public function hapusanggaran($id) {
                // Panggil model untuk melakukan hapus pengajuan
                $result = $this->pengajuan_model->hapus_pengajuan($id);
                
                if ($result) {
                    // Set flash data untuk pesan sukses
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil dihapus!</div>');
                } else {
                    // Set flash data untuk pesan gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus pengajuan!</div>');
                }
                // Redirect kembali ke halaman pengajuan
                redirect('departemen/anggarankabkota');
            }
      
}