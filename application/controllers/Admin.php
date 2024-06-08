<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
        public function __construct() {
                parent::__construct();
                $this->load->model('account_model');
                $this->load->model('pengajuan_model');
            }
	public function index()
	{
        $data['users'] = $this->account_model->get_pusat_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/pusat',$data);
        $this->load->view('template/footer');
	}
        public function editpusat($id) {
                // Mengambil data user berdasarkan ID
                $data['users'] = $this->account_model->get_user_by_id($id);
                
                // Menampilkan view form edit
                $this->load->view('template/header');
                $this->load->view('template/sidebarsuperadmin');
                $this->load->view('admin/edit_account', $data);
                $this->load->view('template/footer');
            }
        
            public function updatepusat() {
                
                $id = $this->input->post('id');
                
                // Persiapkan data yang akan diperbarui
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                );
            
                // Panggil metode model untuk memperbarui data pengguna
                $update = $this->account_model->update_user($id, $data);
            
                if ($update) {
                    // Jika update berhasil, redirect ke halaman lain dengan pesan sukses
                    redirect('Admin/index?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('Admin/editpusat/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('admin');
            }
            public function editprov($id) {
                // Mengambil data user berdasarkan ID
                $data['users'] = $this->account_model->get_user_by_id($id);
                
                // Menampilkan view form edit
                $this->load->view('template/header');
                $this->load->view('template/sidebarsuperadmin');
                $this->load->view('admin/edit_accountprov', $data);
                $this->load->view('template/footer');
            }
        
            public function updateprov() {
                
                $id = $this->input->post('id');
                
                // Persiapkan data yang akan diperbarui
                $data = array(
                    'name_prov' => $this->input->post('name_prov'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                );
            
                // Panggil metode model untuk memperbarui data pengguna
                $update = $this->account_model->update_user($id, $data);
            
                if ($update) {
                    // Jika update berhasil, redirect ke halaman lain dengan pesan sukses
                    redirect('Admin/akunprov?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('Admin/editprov/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('admin/akunprov');
            }
            public function editkab($id) {
                // Mengambil data user berdasarkan ID
                $data['users'] = $this->account_model->get_user_by_id($id);
                $data['wilayah'] = $this->account_model->get_wilayah();
                // Menampilkan view form edit
                $this->load->view('template/header');
                $this->load->view('template/sidebarsuperadmin');
                $this->load->view('admin/edit_accountkab', $data);
                $this->load->view('template/footer');
            }
        
            public function updatekab() {
                
                $id = $this->input->post('id');
                
                // Persiapkan data yang akan diperbarui
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'wilayah' => $this->input->post('wilayah'),
                    'password' => $this->input->post('password')
                );
            
                // Panggil metode model untuk memperbarui data pengguna
                $update = $this->account_model->update_user($id, $data);
            
                if ($update) {
                    // Jika update berhasil, redirect ke halaman lain dengan pesan sukses
                    redirect('Admin/akunkabkota?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('Admin/editkab/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('admin/akunkabkota');
            }
            public function deletepusat($id) {
                // Menghapus data user berdasarkan ID
                $delete_status = $this->account_model->delete_user($id);
                if ($delete_status) {
                        // Jika delete berhasil, tampilkan alert sukses
                        $this->session->set_flashdata('success', 'User berhasil dihapus.');
                    } else {
                        // Jika delete gagal, tampilkan alert gagal
                        $this->session->set_flashdata('error', 'Gagal menghapus user.');
                    }
                // Redirect kembali ke halaman daftar akun
                redirect('admin');
            }
            public function deleteprov($id) {
                // Menghapus data user berdasarkan ID
                $delete_status = $this->account_model->delete_user($id);
                if ($delete_status) {
                        // Jika delete berhasil, tampilkan alert sukses
                        $this->session->set_flashdata('success', 'User berhasil dihapus.');
                    } else {
                        // Jika delete gagal, tampilkan alert gagal
                        $this->session->set_flashdata('error', 'Gagal menghapus user.');
                    }
                // Redirect kembali ke halaman daftar akun
                redirect('admin/akunprov');
            }
            public function deletekab($id) {
                // Menghapus data user berdasarkan ID
                $delete_status = $this->account_model->delete_user($id);
                if ($delete_status) {
                        // Jika delete berhasil, tampilkan alert sukses
                        $this->session->set_flashdata('success', 'User berhasil dihapus.');
                    } else {
                        // Jika delete gagal, tampilkan alert gagal
                        $this->session->set_flashdata('error', 'Gagal menghapus user.');
                    }
                // Redirect kembali ke halaman daftar akun
                redirect('admin/akunkabkota');
            }
    public function akunprov()
	{
                $data['users'] = $this->account_model->get_prov_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/akunprov',$data);
        $this->load->view('template/footer');
	}
    public function akunkabkota()
	{
                $data['users'] = $this->account_model->get_kab_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/akunkab',$data);
        $this->load->view('template/footer');
	}
    public function anggaran()
	{
        $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggaran();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/anggaran_pengajuan',$data);
        $this->load->view('template/footer');
	}
    public function anggarandept()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarandepartement();
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/anggaran_pengajuan2',$data);
        $this->load->view('template/footer');
	}
    public function anggarankabkota()
	{
        $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarankabkota();
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/anggaran_pengajuan1',$data);
        $this->load->view('template/footer');
	}
    public function Profile()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/setting');
        $this->load->view('template/footer');
	}
    public function faq()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/faq');
        $this->load->view('template/footer');
	}
        public function wilayah()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarsuperadmin');
        $this->load->view('admin/wilayah');
        $this->load->view('template/footer');
	}
}