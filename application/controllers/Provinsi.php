<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();

                $this->load->model('pengajuan_model');
                $this->load->model('program_model');
				$this->load->model('kegiatan_model');
				$this->load->model('kro_model');
				$this->load->model('ro_model');
				$this->load->model('komponen_model');
				$this->load->model('satuan_model');
                $this->load->model('account_model');
                $this->load->library('session');
                $this->load->helper(array('form', 'url'));
                $this->load->library('upload');
                $this->load->helper('phpspreadsheet');
        }
        public function index()
        {
                $this->load->library('session');
                
                
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
        }
        public function anggarandaerah()
        {
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_anggarankab();
		
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/anggarandaerah', $data);
                $this->load->view('template/footer');
        }

        public function editanggaran($id_pengajuan)
        {
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_by_id($id_pengajuan);

                // Periksa apakah data pengajuan ditemukan
                if (!$data['pengajuan']) {
                        // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                        echo "Pengajuan tidak ditemukan.";
                        return;
                }

                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/editanggaran', $data);
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
                        $result = $this->pengajuan_model->update_pengajuankab($id_pengajuan, $data);

                        if ($result) {
                                // Set flash data untuk pesan sukses
                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diperbarui!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('Provinsi/anggarandaerah');
                        } else {
                                // Set flash data untuk pesan gagal
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui pengajuan!</div>');
                                // Redirect kembali ke halaman editanggaran
                                redirect('Provinsi/anggarandaerah');
                        }
                }
        }



        public function akunkabkota()
        {$data['users'] = $this->account_model->get_kab_users();
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov',$data);
                $this->load->view('prov/akunkab');
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
                    redirect('Provinsi/akunkabkota?alert=success');
                } else {
                    // Jika update gagal, redirect ke halaman lain dengan pesan gagal
                    redirect('Provinsi/editkab/'.$id.'?alert=failed');
                }
                
                // Redirect kembali ke halaman daftar akun
                redirect('Provinsi/akunkabkota');
            }
        public function deletekab($id) {
                // Menghapus data user berdasarkan ID
                $delete_status = $this->account_model->delete_user($id);
                if ($delete_status) {
                        // Jika delete berhasil, tampilkan alert sukses
                        $thais->session->set_flashdata('success', 'User berhasil dihapus.');
                    } else {
                        // Jika delete gagal, tampilkan alert gagal
                        $this->session->set_flashdata('error', 'Gagal menghapus user.');
                    }
                // Redirect kembali ke halaman daftar akun
                redirect('provinsi/akunkabkota');
            }
        public function tambahakunkabkota()
        {
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/tambahakun');
                $this->load->view('template/footer');
        }
        public function editkab($id)
        {
                $data['users'] = $this->account_model->get_user_by_id($id);
                $data['wilayah'] = $this->account_model->get_wilayah();
                $data['message'] = $this->session->flashdata('message');
                $data['provinces'] = $this->account_model->get_provinces();
                

                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/editakun',$data);
                $this->load->view('template/footer');
        }
        public function pengajuan()
        {
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_prov();
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/pengajuananggaran',$data);
                $this->load->view('template/footer');
        }
        public function editpengajuan($id_pengajuan)
        {
            // Mengambil data pengajuan dengan ID yang diberikan
            $data['import_prov'] = $this->pengajuan_model->get_import_by_id_pengajuanprov($id_pengajuan);
            $pengajuan = $this->pengajuan_model->get_pengajuan_by_idprov($id_pengajuan);
            $data['id_pengajuan'] = $id_pengajuan;
        
            // Debug statements
            if (empty($pengajuan)) {
                echo "Pengajuan tidak ditemukan.";
                return;
            }
        
            if (empty($data['import_prov'])) {
                echo "Data import tidak ditemukan.";
                return;
            }
        
        
            // Ambil ID pengajuan dari data pengajuan
            $id_pengajuan = $pengajuan['id_pengajuan'];
        
            // Load view untuk halaman edit dengan data pengajuan
            $data['pengajuan'] = $pengajuan;
            $this->load->view('template/header');
            $this->load->view('template/sidebarprov');
            $this->load->view('prov/editpengajuan',$data);
            $this->load->view('template/footer');
        
            // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
            // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
            $file_path = ""; // Tentukan nilai default untuk $file_path
            if(isset($pengajuan['file_bukti'])) {
                $file_path = $pengajuan['file_bukti'];
            }
            $this->_importExcelDataprov($file_path, $id_pengajuan);
        }
        public function tambahpengajuan()
        {
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/tambahpengajuan');
                $this->load->view('template/footer');
        }
        public function tambah_pengajuan() {
                $id_user = $this->session->userdata('user_id'); // Ambil user_id dari session
                $ID_Provinsi = $this->session->userdata('ID_Provinsi'); // Ambil ID_Provinsi dari session
        
                if (empty($id_user) || empty($ID_Provinsi)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan atau tidak memiliki ID Provinsi!</div>');
                    redirect('provinsi/pengajuan');
                    return;
                }
        
                // Mendapatkan data user dengan join ke tabel kota_kabupaten berdasarkan ID_Provinsi
                $data_user = $this->db->select('kab.ID_Provinsi')
                    ->from('kota_kabupaten as kab')
                    ->join('users as usr', 'kab.ID_Provinsi = usr.ID_Provinsi', 'left')
                    ->where('usr.ID_Provinsi', $ID_Provinsi)
                    ->get()
                    ->row_array(); 
					
					
                if (empty($data_user) || !isset($data_user['ID_Provinsi'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kota/Kabupaten tidak ditemukan untuk provinsi ini!</div>');
                    redirect('provinsi/pengajuan');
                    return;
                }
        
                $data_pengajuan = array(
                    'kodenama_daerah' => $data_user['ID_Provinsi'],
                    'Nama_pengajuan' => $this->input->post('Nama_pengajuan'),
                    'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                    'file_bukti' => $this->_uploadFile(),
                );
				// print_r($data_pengajuan);
				// exit();
                // Pastikan file_bukti berhasil diunggah
                if ($data_pengajuan['file_bukti'] === false) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengunggah berkas!</div>');
                    redirect('provinsi/pengajuan');
                    return;
                }
        
                // Pastikan tidak ada nilai null yang seharusnya tidak null di database
                if (empty($data_pengajuan['kodenama_daerah']) || empty($data_pengajuan['Nama_pengajuan'])  || empty($data_pengajuan['tanggal_pengajuan'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengajuan tidak lengkap!</div>');
                    redirect('provinsi/pengajuan');
                    return;
                }
        
                $this->db->trans_start();
                $id_pengajuan = $this->pengajuan_model->tambah_pengajuan_prov($data_pengajuan);
        
		
                if ($id_pengajuan) {
                    $file_path = FCPATH . $data_pengajuan['file_bukti'];
                    $this->_importExcelDataprov($file_path, $id_pengajuan);
                } else {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan pengajuan!</div>');
                    redirect('provinsi/pengajuan');
                    return;
                }
        
                $this->db->trans_complete();
        
                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan pengajuan!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diajukan!</div>');
                }
        
                redirect('provinsi/pengajuan');
            }
        
            private function _uploadFile() {
                $config['upload_path'] = FCPATH . 'uploads/';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
                // $config['max_size'] = 2048; // in kilobytes
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('file_bukti')) {
                    $data = $this->upload->data();
                    return 'uploads/' . $data['file_name']; // Mengembalikan path relatif
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    return false;
                }
            }
        
        
        public function Profile()
        {
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/setting');
                $this->load->view('template/footer');
        }
        public function faq()
        {
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/faq');
                $this->load->view('template/footer');
        }
        public function wilayah()
        {
                $this->load->view('template/header');
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/wilayah');
                $this->load->view('template/footer');
        }
        public function lihatpengajuan($id_pengajuan)
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
                $this->load->view('template/sidebarprov');
                $this->load->view('prov/lihatpengajuan', $data);
                $this->load->view('template/footer');
            
                // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
                // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
                $file_path = ""; // Tentukan nilai default untuk $file_path
                if(isset($pengajuan['file_bukti'])) {
                    $file_path = $pengajuan['file_bukti'];
                }
                $this->_importExcelData($file_path, $id_pengajuan);
               
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
    public function lihatBerkas($filename) {
        // Sanitasi nama file untuk menghindari karakter ilegal
        $filename = basename($filename);
    
        // Set path lengkap ke file
        $file_path = FCPATH . $filename;
    
        if (file_exists($file_path)) {
            $this->output
                ->set_content_type(mime_content_type($file_path))
                ->set_output(file_get_contents($file_path));
        } else {
            show_404();
        }
    }
    public function hapuspengajuan($id_pengajuan) {
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
    
        redirect('provinsi/pengajuan');
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
            redirect('provinsi/pengajuan');
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
    public function tambahitem()
    {

        $data['program'] = $this->program_model->get();
        $data['kegiatan'] = $this->kegiatan_model->get();
        $data['kro'] = $this->kro_model->get();
        $data['ro'] = $this->ro_model->get();
        $data['komponen'] = $this->komponen_model->get();
        $data['satuan'] = $this->satuan_model->get();
        $this->load->view('template/header');
        $this->load->view('template/sidebarprov',$data);
        $this->load->view('prov/tambahitem');
        $this->load->view('template/footer');
        $this->load->view('kota/scripts');
    }
    public function tambah_item() {
		
		$qty = $this->input->post('qty');
		$subtotal = $this->input->post('subtotal');
		$total = $qty * $subtotal;
		$id_pengajuan =$this->input->post('id_pengajuan');
        $data_item = array(
            'program' => $this->input->post('program'),
            'kegiatan' => $this->input->post('kegiatan'),
            'kro' => $this->input->post('kro'),
            'ro' => $this->input->post('ro'),
            'komponen' => $this->input->post('komponen'),
            'satuan' => $this->input->post('satuan'),
            'qty' => $this->input->post('qty'),
            'subtotal' => $subtotal,
            'total' =>$total,
			'id_pengajuan'=> $id_pengajuan
        );
		
		$this->pengajuan_model->tambah_itemprov($data_item);

		$data_pengajuan = $this->db->select('anggaran')
		->from('pengajuan_provinsi')
		->where('id_pengajuan', $id_pengajuan)
		->get()
		->row_array();
		
		$data = [
			'anggaran' => $data_pengajuan['anggaran'] + $total
		];
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan_provinsi', $data);
		redirect('provinsi/editpengajuan/'.$id_pengajuan);
	}
	
}