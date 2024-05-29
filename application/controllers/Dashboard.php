<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('pengajuan_model');
    }

    public function index() {
        $role = $this->session->userdata('role');
        switch ($role) {
            case 'super_admin':
                $this->load->view('template/header');
                $this->load->view('template/sidebarsuperadmin');
                $this->load->view('super_admin_dashboard');
                $this->load->view('template/footer');
                break;
            case 'kabupaten_kota':
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_kab();
                $this->load->view('template/header');
                $this->load->view('template/sidebatkabkota');
                $this->load->view('kabupaten_kota_dashboard',$data);
                $this->load->view('template/footer');
                break;
            case 'provinsi':
                $id_provinsi = $this->session->userdata('ID_Provinsi');
                if (!$id_provinsi) {
                    $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
                    redirect('login');
                }
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_by_provinsi($id_provinsi);
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('provinsi_dashboard',$data);
                $this->load->view('template/footer');
                break;
            case 'pusat':
                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat_dashboard');
                $this->load->view('template/footer');
                break;
            case 'departement':
                    $this->load->view('template/header');
                    $this->load->view('template/sidebardepartement');
                    $this->load->view('departement');
                    $this->load->view('template/footer');
                    break;
            case 'monitoring':
                    $this->load->view('template/header');
                    $this->load->view('template/sidebarmonitoring');
                    $this->load->view('monitoring_dashboard');
                    $this->load->view('template/footer');
                    break;
            default:
                redirect('login');
                break;
        }
    }
}