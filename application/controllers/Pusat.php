<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//load package composer
require 'vendor/autoload.php';
 
//deklarasi package yang ingin digunakan
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Pusat extends CI_Controller {
        public function __construct() {
                parent::__construct();
                $this->load->model('account_model');
                $this->load->model('pengajuan_model');
                $this->load->model('M_laporan');
            }
	public function index()
	{
        
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat_dashboard');
        $this->load->view('template/footer');
	}
    public function akunprov()
	{
                $data['users'] = $this->account_model->get_prov_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/akunprov',$data);
        $this->load->view('template/footer');
	}
        public function editprov($id) {
                // Mengambil data user berdasarkan ID
                $data['users'] = $this->account_model->get_user_by_id($id);
                
                // Menampilkan view form edit
                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/edit_accountprov', $data);
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
                    redirect('pusat/akunprov?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('pusat/editprov/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('pusat/akunprov');
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
                redirect('pusat/akunprov');
            }
    public function akunkabkota()
	{
                $data['users'] = $this->account_model->get_kab_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/akunkab',$data);
        $this->load->view('template/footer');
	}
        public function editkab($id) {
                // Mengambil data user berdasarkan ID
                $data['users'] = $this->account_model->get_user_by_id($id);
                $data['wilayah'] = $this->account_model->get_wilayah();
                // Menampilkan view form edit
                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/edit_accountkab', $data);
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
                    redirect('pusat/akunkabkota?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('pusat/editkab/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('pusat/akunkabkota');
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
                redirect('pusat/akunkabkota');
            }
        public function anggaran()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggaran();
                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/anggaran_pengajuan',$data);
                $this->load->view('template/footer');
	}
        public function lihatpengajuan($id_pengajuan)
        {
                $data['import_prov'] = $this->pengajuan_model->get_import_by_id_pengajuanprov($id_pengajuan);
                $pengajuan = $this->pengajuan_model->get_pengajuan_by_idprov($id_pengajuan);
                $data['id_pengajuan'] = $id_pengajuan;
            
                // Periksa apakah data pengajuan ditemukan
                if (!$pengajuan) {
                    // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                    echo "Pengajuan tidak ditemukan.";
                    return;
                }
            
                // Ambil ID pengajuan dari data pengajuan
                $id_pengajuan = $pengajuan['id_pengajuan'];
            
                // Load view untuk halaman edit dengan data pengajuan
                $data['pengajuan'] = $pengajuan;
                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/lihatpengajuan', $data);
                $this->load->view('template/footer');
            
                // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
                // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
                $file_path = ""; // Tentukan nilai default untuk $file_path
                if(isset($pengajuan['file_bukti'])) {
                    $file_path = $pengajuan['file_bukti'];
                }
                $this->_importExcelDataprov($file_path, $id_pengajuan);
               
        }
        private function _importExcelDataprov($file_path, $id_pengajuan) {
		$this->load->model('pengajuan_model');
		$is_imported = $this->pengajuan_model->checkImportStatusprov($id_pengajuan);
	
		if (!$is_imported) {
			// Load the spreadsheet file using the helper function
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
			$sheet = $spreadsheet->getActiveSheet();
			$data = [];
			$cumulative_total = 0;  // Initialize the cumulative total
	
			$isFirstRow = true;
			foreach ($sheet->getRowIterator() as $row) {
				if ($isFirstRow) {
					$isFirstRow = false;
					continue; // Skip the header row
				}
	
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false);
	
				$rowData = [];
				foreach ($cellIterator as $cell) {
					$rowData[] = $cell->getValue();
				}
	
				$rowData[] = $id_pengajuan;
				$data[] = $rowData;
			}
	
			foreach ($data as $row) {
				// Calculate total
				$qty = $row[7];
				$subtotal = $row[8];
				$total = intval($qty) * intval($subtotal);
	
				// Add to cumulative total
				$cumulative_total += $total;
	
				$import_data = [
					'No' => $row[0],
					'Program' => $row[1],
					'Kegiatan' => $row[2],
					'KRO' => $row[3],
					'RO' => $row[4],
					'Komponen' => $row[5],
					'Satuan' => $row[6],
					'Qty' => $qty,
					'subtotal' => $subtotal,
					'total' => $total,
					'id_pengajuan' => $id_pengajuan,
				];
				$this->pengajuan_model->insert_import_dataprov($import_data);
			}
	
			// Update the pengajuan_kabkota table with the cumulative total
			$this->pengajuan_model->setImportStatusprov($id_pengajuan, true);
			$data = [
				'anggaran' => $cumulative_total
			];
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->update('pengajuan_provinsi', $data);
		}
	}
        public function hapuspengajuan($id_pengajuan) {
                $this->db->trans_start();
                $pengajuan = $this->pengajuan_model->get_pengajuan_by_iddept($id_pengajuan);
                if ($pengajuan) {
                    if (isset($pengajuan['file_bukti'])) {
                        $file_path = FCPATH . $pengajuan['file_bukti'];
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
            
                    $this->pengajuan_model->hapus_import_data_by_pengajuandept($id_pengajuan);
                    $result = $this->pengajuan_model->hapus_pengajuan_dept($id_pengajuan);
                    $this->db->trans_complete();
            
                    if ($this->db->trans_status() === FALSE || !$result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengajuan berhasil dihapus</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengajuan berhasil dihapus!</div>');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengajuan tidak ditemukan!</div>');
                }
            
                redirect('pusat/anggarandept');
            }
        public function hapuspengajuan1($id_pengajuan) {
                $this->db->trans_start();
                $pengajuan = $this->pengajuan_model->get_pengajuan_by_id($id_pengajuan);
            
                if ($pengajuan) {
                    if (isset($pengajuan['file_bukti'])) {
                        $file_path = FCPATH . $pengajuan['file_bukti'];
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
            
                    $this->pengajuan_model->hapus_import_data_by_pengajuan($id_pengajuan);
                    $result = $this->pengajuan_model->hapus_pengajuan_kabkota($id_pengajuan);
                    $this->db->trans_complete();
            
                    if ($this->db->trans_status() === FALSE || !$result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data pengajuan!</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengajuan berhasil dihapus!</div>');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengajuan tidak ditemukan!</div>');
                }
            
                redirect('pusat/anggarankabkota');
            }
             public function downloadDatadept($id_pengajuan) {
                // Pastikan untuk memuat model yang diperlukan
                $this->load->model('pengajuan_model');
            
                // Ambil data berdasarkan id_pengajuan
                $data = $this->pengajuan_model->get_data_for_downloaddept($id_pengajuan);
            
                // Periksa apakah data ditemukan
                if (empty($data)) {
                    // Set flash data untuk pesan kesalahan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Pengajuan tidak ditemukan. Tidak dapat mengunduh data.</div>');
                    // Redirect kembali ke halaman sebelumnya atau halaman utama
                    redirect('pusat/anggarandept');
                    return;
                }
            
                // Buat file CSV sementara
                $csvFileName = 'data_' . $id_pengajuan . '.csv';
                $csvFile = fopen('php://temp', 'w');
            
                // Header untuk file CSV
                $header = array(
                    'Program',
                    'Kegiatan',
                    'KRO',
                    'RO',
                    'Komponen',
                    'Satuan',
                    'Qty',
                    'Subtotal',
                    'Total'
                );
                fputcsv($csvFile, $header);
            
                // Tulis data ke file CSV
                foreach ($data as $row) {
                    fputcsv($csvFile, array(
                        $row->Program,
                        $row->Kegiatan,
                        $row->KRO,
                        $row->RO,
                        $row->Komponen,
                        $row->Satuan,
                        $row->Qty,
                        $row->subtotal,
                        $row->total
                    ));
                }
            
                // Atur header untuk memicu unduhan file
                header('Content-Type: application/csv');
                header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
            
                // Baca file CSV sementara dan kirimkan ke output
                rewind($csvFile);
                echo stream_get_contents($csvFile);
            
                // Tutup file CSV
                fclose($csvFile);
            
                // Hentikan eksekusi kode lebih lanjut
                exit();
            }
        public function downloadDatakab($id_pengajuan) {
                // Pastikan untuk memuat model yang diperlukan
                $this->load->model('pengajuan_model');
            
                // Ambil data berdasarkan id_pengajuan
                $data = $this->pengajuan_model->get_data_for_download($id_pengajuan);
            
                // Periksa apakah data ditemukan
                if (empty($data)) {
                    // Set flash data untuk pesan kesalahan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Pengajuan tidak ditemukan. Tidak dapat mengunduh data.</div>');
                    // Redirect kembali ke halaman sebelumnya atau halaman utama
                    redirect('Kabkota');
                    return;
                }
            
                // Buat file CSV sementara
                $csvFileName = 'data_' . $id_pengajuan . '.csv';
                $csvFile = fopen('php://temp', 'w');
            
                // Header untuk file CSV
                $header = array(
                    'Program',
                    'Kegiatan',
                    'KRO',
                    'RO',
                    'Komponen',
                    'Satuan',
                    'Qty',
                    'Subtotal',
                    'Total'
                );
                fputcsv($csvFile, $header);
            
                // Tulis data ke file CSV
                foreach ($data as $row) {
                    fputcsv($csvFile, array(
                        $row->Program,
                        $row->Kegiatan,
                        $row->KRO,
                        $row->RO,
                        $row->Komponen,
                        $row->Satuan,
                        $row->Qty,
                        $row->subtotal,
                        $row->total
                    ));
                }
            
                // Atur header untuk memicu unduhan file
                header('Content-Type: application/csv');
                header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
            
                // Baca file CSV sementara dan kirimkan ke output
                rewind($csvFile);
                echo stream_get_contents($csvFile);
            
                // Tutup file CSV
                fclose($csvFile);
            
                // Hentikan eksekusi kode lebih lanjut
                exit();
            }
        public function downloadData($id_pengajuan) {
                // Pastikan untuk memuat model yang diperlukan
                $this->load->model('pengajuan_model');
            
                // Ambil data berdasarkan id_pengajuan
                $data = $this->pengajuan_model->get_data_for_downloadprov($id_pengajuan);
            
                // Periksa apakah data ditemukan
                if (empty($data)) {
                    // Set flash data untuk pesan kesalahan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Pengajuan tidak ditemukan. Tidak dapat mengunduh data.</div>');
                    // Redirect kembali ke halaman sebelumnya atau halaman utama
                    redirect('pusat/anggaran');
                    return;
                }
            
                // Buat file CSV sementara
                $csvFileName = 'data_' . $id_pengajuan . '.csv';
                $csvFile = fopen('php://temp', 'w');
            
                // Header untuk file CSV
                $header = array(
                    'Program',
                    'Kegiatan',
                    'KRO',
                    'RO',
                    'Komponen',
                    'Satuan',
                    'Qty',
                    'Subtotal',
                    'Total'
                );
                fputcsv($csvFile, $header);
            
                // Tulis data ke file CSV
                foreach ($data as $row) {
                    fputcsv($csvFile, array(
                        $row->Program,
                        $row->Kegiatan,
                        $row->KRO,
                        $row->RO,
                        $row->Komponen,
                        $row->Satuan,
                        $row->Qty,
                        $row->subtotal,
                        $row->total
                    ));
                }
            
                // Atur header untuk memicu unduhan file
                header('Content-Type: application/csv');
                header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
            
                // Baca file CSV sementara dan kirimkan ke output
                rewind($csvFile);
                echo stream_get_contents($csvFile);
            
                // Tutup file CSV
                fclose($csvFile);
            
                // Hentikan eksekusi kode lebih lanjut
                exit();
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
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/anggaran_pengajuan1',$data);
        $this->load->view('template/footer');
	}

        public function lihatpengajuandetailprov()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/lihatpengajuandetailprov');
        $this->load->view('template/footer');
	}
    public function Profile()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/setting');
        $this->load->view('template/footer');
	}
    public function faq()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/faq');
        $this->load->view('template/footer');
	}
        public function wilayah()
	{
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarankab();
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/detaipengajuanprov',$data);
        $this->load->view('template/footer');
	}
        
        public function editanggaran($id_pengajuan)
        {
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_by_idprov($id_pengajuan);

                // Periksa apakah data pengajuan ditemukan
                if (!$data['pengajuan']) {
                        // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                        echo "Pengajuan tidak ditemukan.";
                        return;
                }

                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/editanggaran', $data);
                $this->load->view('template/footer');
        }
       
        public function editanggaran1($id_pengajuan)
        {
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_by_iddept($id_pengajuan);

                // Periksa apakah data pengajuan ditemukan
                if (!$data['pengajuan']) {
                        // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                        echo "Pengajuan tidak ditemukan.";
                        return;
                }

                $this->load->view('template/header');
                $this->load->view('template/sidebarpusat');
                $this->load->view('pusat/editanggaran1', $data);
                $this->load->view('template/footer');
        }
        public function update_pengajuan()
        {
                $this->form_validation->set_rules('kodenama_daerah', 'Kode/Nama Daerah', 'required');
                $this->form_validation->set_rules('Nama_pengajuan', 'Nama Pengajuan', 'required');
                // Tambahkan validasi lainnya sesuai kebutuhan

                // Tambahkan validasi lainnya sesuai kebutuhan

                if ($this->form_validation->run() == FALSE) {
                        // Jika validasi gagal, kembali ke halaman edit dengan data yang sama
                        $this->editanggaran($this->input->post('id_pengajuan'));
                } else {
                        // Handle update pengajuan

                        // Panggil model untuk melakukan update pengajuan
                        $id_pengajuan = $this->input->post('id_pengajuan'); // Perbaiki pengambilan id_pengajuan
                        $data = array(
                                'kodenama_daerah' => $this->input->post('kodenama_daerah'),
                                'Nama_pengajuan' => $this->input->post('Nama_pengajuan'),
                                'anggaran' => $this->input->post('anggaran'),
                                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                                'file_bukti' => $this->input->post('file_bukti'), // Jika menggunakan file upload
                                'keterangan' => $this->input->post('keterangan'),
                                'status' => $this->input->post('status')
                        );
                        $result = $this->pengajuan_model->update_pengajuanprov($id_pengajuan, $data);

                        if ($result) {
                                // Set flash data untuk pesan sukses
                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diperbarui!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('pusat/anggaran');
                        } else {
                                // Set flash data untuk pesan gagal
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui pengajuan!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('pusat/anggaran');
                        }
                }
        }
        public function update_pengajuan1()
        {
                $this->form_validation->set_rules('kodenama_daerah', 'Kode/Nama Daerah', 'required');
                $this->form_validation->set_rules('nama_pengajuan', 'nama Pengajuan', 'required');
                // Tambahkan validasi lainnya sesuai kebutuhan

                // Tambahkan validasi lainnya sesuai kebutuhan

                if ($this->form_validation->run() == FALSE) {
                        // Jika validasi gagal, kembali ke halaman edit dengan data yang sama
                        $this->editanggaran1($this->input->post('id_pengajuan'));
                } else {
                        // Handle update pengajuan

                        // Panggil model untuk melakukan update pengajuan
                        $id_pengajuan = $this->input->post('id_pengajuan'); // Perbaiki pengambilan id_pengajuan
                        $data = array(
                                'kodenama_daerah' => $this->input->post('kodenama_daerah'),
                                'nama_pengajuan' => $this->input->post('nama_pengajuan'),
                                'anggaran' => $this->input->post('anggaran'),
                                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                                'file_bukti' => $this->input->post('file_bukti'), // Jika menggunakan file upload
                                'keterangan' => $this->input->post('keterangan'),
                                'status' => $this->input->post('status')
                        );
                        $result = $this->pengajuan_model->update_pengajuandept($id_pengajuan, $data);

                        if ($result) {
                                // Set flash data untuk pesan sukses
                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diperbarui!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('pusat/anggarandept');
                        } else {
                                // Set flash data untuk pesan gagal
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui pengajuan!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('pusat/anggarandept');
                        }
                }
        }
        public function hapuspengajuan2($id_pengajuan) {
                $this->db->trans_start();
                $pengajuan = $this->pengajuan_model->get_pengajuan_by_idprov($id_pengajuan);
            
                if ($pengajuan) {
                    if (isset($pengajuan['file_bukti'])) {
                        $file_path = FCPATH . $pengajuan['file_bukti'];
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
            
                    $this->pengajuan_model->hapus_import_data_by_pengajuanprov($id_pengajuan);
                    $result = $this->pengajuan_model->hapus_pengajuan_provinsi($id_pengajuan);
                    $this->db->trans_complete();
            
                    if ($this->db->trans_status() === FALSE || !$result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data pengajuan!</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengajuan berhasil dihapus!</div>');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengajuan tidak ditemukan!</div>');
                }
            
                redirect('pusat/anggaran');
            }
            public function lihatpengajuan1($id_pengajuan)
    {
            $data['import'] = $this->pengajuan_model->get_import_by_id_pengajuan($id_pengajuan);
            $pengajuan = $this->pengajuan_model->get_pengajuan_by_id($id_pengajuan);
            $data['id_pengajuan'] = $id_pengajuan;
        
            // Periksa apakah data pengajuan ditemukan
            if (!$pengajuan) {
                // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                echo "Pengajuan tidak ditemukan.";
                return;
            }
        
            // Ambil ID pengajuan dari data pengajuan
            $id_pengajuan = $pengajuan['id_pengajuan'];
        
            // Load view untuk halaman edit dengan data pengajuan
            $data['pengajuan'] = $pengajuan;
            $this->load->view('template/header');
            $this->load->view('template/sidebarpusat');
            $this->load->view('pusat/lihatpengajuan1', $data);
            $this->load->view('template/footer');
        
            // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
            // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
            $file_path = ""; // Tentukan nilai default untuk $file_path
            if(isset($pengajuan['file_bukti'])) {
                $file_path = $pengajuan['file_bukti'];
            }
            $this->_importExcelData($file_path, $id_pengajuan);
           
    }
    private function _importExcelData($file_path, $id_pengajuan) {
        $this->load->model('pengajuan_model');
        $is_imported = $this->pengajuan_model->checkImportStatus($id_pengajuan);

        if (!$is_imported) {
                // Load the spreadsheet file using the helper function
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
                $sheet = $spreadsheet->getActiveSheet();
                $data = [];
                $cumulative_total = 0;  // Initialize the cumulative total

                $isFirstRow = true;
                foreach ($sheet->getRowIterator() as $row) {
                        if ($isFirstRow) {
                                $isFirstRow = false;
                                continue; // Skip the header row
                        }

                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);

                        $rowData = [];
                        foreach ($cellIterator as $cell) {
                                $rowData[] = $cell->getValue();
                        }

                        $rowData[] = $id_pengajuan;
                        $data[] = $rowData;
                }

                foreach ($data as $row) {
                        // Calculate total
                        $qty = $row[7];
                        $subtotal = $row[8];
                        $total = intval($qty) * intval($subtotal);

                        // Add to cumulative total
                        $cumulative_total += $total;

                        $import_data = [
                                'No' => $row[0],
                                'Program' => $row[1],
                                'Kegiatan' => $row[2],
                                'KRO' => $row[3],
                                'RO' => $row[4],
                                'Komponen' => $row[5],
                                'Satuan' => $row[6],
                                'Qty' => $qty,
                                'subtotal' => $subtotal,
                                'total' => $total,
                                'id_pengajuan' => $id_pengajuan,
                        ];
                        $this->pengajuan_model->insert_import_data($import_data);
                }

                // Update the pengajuan_kabkota table with the cumulative total
                $this->pengajuan_model->setImportStatus($id_pengajuan, true);
                $data = [
                        'anggaran' => $cumulative_total
                ];
                $this->db->where('id_pengajuan', $id_pengajuan);
                $this->db->update('pengajuan_kabkota', $data);
        }
}
public function editpengajuan1($id_pengajuan)
{
    // Mengambil data pengajuan dengan ID yang diberikan
    $data['import_dept'] = $this->pengajuan_model->get_import_by_id_pengajuandept($id_pengajuan);
    $pengajuan = $this->pengajuan_model->get_pengajuan_by_iddept($id_pengajuan);
    $data['id_pengajuan'] = $id_pengajuan;

    // Debug statements
    if (empty($pengajuan)) {
        echo "Pengajuan tidak ditemukan.";
        return;
    }

    if (empty($data['import_dept'])) {
        echo "Data import tidak ditemukan.";
        return;
    }


    // Ambil ID pengajuan dari data pengajuan
    $id_pengajuan = $pengajuan['id_pengajuan'];

    // Load view untuk halaman edit dengan data pengajuan
    $data['pengajuan'] = $pengajuan;
    $this->load->view('template/header');
    $this->load->view('template/sidebarpusat');
    $this->load->view('pusat/editpengajuan',$data);
    $this->load->view('template/footer');

    // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
    // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
    $file_path = ""; // Tentukan nilai default untuk $file_path
    if(isset($pengajuan['file_bukti'])) {
        $file_path = $pengajuan['file_bukti'];
    }
    $this->_importExcelDatadept($file_path, $id_pengajuan);
}
private function _importExcelDatadept($file_path, $id_pengajuan) {
        $this->load->model('pengajuan_model');
        $is_imported = $this->pengajuan_model->checkImportStatusdept($id_pengajuan);

        if (!$is_imported) {
                // Load the spreadsheet file using the helper function
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
                $sheet = $spreadsheet->getActiveSheet();
                $data = [];
                $cumulative_total = 0;  // Initialize the cumulative total

                $isFirstRow = true;
                foreach ($sheet->getRowIterator() as $row) {
                        if ($isFirstRow) {
                                $isFirstRow = false;
                                continue; // Skip the header row
                        }

                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);

                        $rowData = [];
                        foreach ($cellIterator as $cell) {
                                $rowData[] = $cell->getValue();
                        }

                        $rowData[] = $id_pengajuan;
                        $data[] = $rowData;
                }

                foreach ($data as $row) {
                        // Calculate total
                        $qty = $row[7];
                        $subtotal = $row[8];
                        $total = intval($qty) * intval($subtotal);

                        // Add to cumulative total
                        $cumulative_total += $total;

                        $import_data = [
                
                                'Program' => $row[1],
                                'Kegiatan' => $row[2],
                                'KRO' => $row[3],
                                'RO' => $row[4],
                                'Komponen' => $row[5],
                                'Satuan' => $row[6],
                                'Qty' => $qty,
                                'subtotal' => $subtotal,
                                'total' => $total,
                                'id_pengajuan' => $id_pengajuan,
                        ];
                        $this->pengajuan_model->insert_import_datadept($import_data);
                }

                // Update the pengajuan_kabkota table with the cumulative total
                $this->pengajuan_model->setImportStatusdept($id_pengajuan, true);
                $data = [
                        'anggaran' => $cumulative_total
                ];
                $this->db->where('id_pengajuan', $id_pengajuan);
                $this->db->update('pengajuan_departement', $data);
        }
}
    public function editpengajuan()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/editanggaran');
        $this->load->view('template/footer');
	}
        public function anggaran_pengajuan()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebarpusat');
        $this->load->view('pusat/editanggaran');
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
                redirect('pusat/anggarankabkota');
            }
			public function Laporan()
			{
				$data['provinces'] = $this->account_model->get_provinces();
				$data['data'] = $this->M_laporan->get_laporan();
				$this->load->view('template/header');
				$this->load->view('template/sidebarpusat');
				$this->load->view('pusat/laporan',$data);
				$this->load->view('template/footer');
			}
			function getlapByProvince(){
				$idProvince = $this->input->post('provinsi');
    $data['data'] = $this->M_laporan->getLaporanByProvinceID($idProvince);
	
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $sheet->setCellValue('A1', 'ID Pengajuan');
    $sheet->setCellValue('B1', 'Nama Daerah');
    $sheet->setCellValue('C1', 'Anggaran');
    $sheet->setCellValue('D1', 'Keterangan');
    $sheet->setCellValue('E1', 'Nama Pengajuan');
    $sheet->setCellValue('F1', 'Tanggal Pengajuan');
    $sheet->setCellValue('G1', 'Status');

    // Set data
    $row = 2;
		foreach ($data['data'] as $row_data) {
			$sheet->setCellValue('A' . $row, $row_data['id_pengajuan']);
			$sheet->setCellValue('B' . $row, isset($row_data['Nama_KotaKab']) ? $row_data['Nama_KotaKab'] : $row_data['Nama_Provinsi']);
			$sheet->setCellValue('C' . $row, $row_data['anggaran']);
			$sheet->setCellValue('D' . $row, $row_data['keterangan']);
			$sheet->setCellValue('E' . $row, $row_data['Nama_pengajuan']);
			$sheet->setCellValue('F' . $row, $row_data['tanggal_pengajuan']);
			$sheet->setCellValue('G' . $row, $row_data['status']);
			$row++;
		}

		// Set file name and save to Excel2007 format
		$filename = 'laporan_excel.xlsx';
		$writer = new Xlsx($spreadsheet);
		$writer->save($filename);

		// Force download file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'. $filename .'"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');

				}
      
}
