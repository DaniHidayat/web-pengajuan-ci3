<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabkota extends CI_Controller {
        public function __construct() {
                parent::__construct();
           
                $this->load->model('pengajuan_model');
                $this->load->model('Pr_model');
				$this->load->model('M_Kegiatan');
				$this->load->model('M_kro');
				$this->load->model('M_Ro');
				$this->load->model('M_Komponen');
				$this->load->model('M_satuan');
				$this->load->model('User_model');
                $this->load->library('upload');
                $this->load->library('session');
				$this->load->library('form_validation');
				
				
              // Load PhpSpreadsheet helper
        $this->load->helper('phpspreadsheet');
            }
	public function index()
	{
        $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_kab();
		
        $this->load->view('template/header');
        $this->load->view('template/sidebatkabkota');
        $this->load->view('kabupaten_kota_dashboard',$data);
        $this->load->view('template/footer');
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
    
        redirect('Kabkota');
    }
    
    
    
            
    public function tambahpengajuan()
	{

        $this->load->view('template/header');
        $this->load->view('template/sidebatkabkota');
        $this->load->view('kota/tambahpengajuan');
        $this->load->view('template/footer');
	}
    public function tambah_pengajuan() {
	
        $id_user = $this->session->userdata('user_id'); // Ambil user_id dari session
        $kodenama_daerah =  $this->session->userdata('ID_KotaKab');
   
        // Tambahkan log untuk debugging
        log_message('debug', 'User ID: ' . $id_user);
        log_message('debug', 'Kode Nama Daerah: ' . $kodenama_daerah);
    
        if (empty($id_user) || empty($kodenama_daerah)) {
		
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan atau Kode Nama Daerah tidak diisi!</div>');
            redirect('kabkota');
            return;
        }
	
    
        // Periksa apakah kodenama_daerah valid
        $data_user = $this->db->select('ID_kotakab')
            ->from('kota_kabupaten')
            ->where('ID_kotakab', $kodenama_daerah)
            ->get()
            ->row_array();
		
        // Tambahkan log untuk debugging
        log_message('debug', 'Data User: ' . print_r($data_user, true));
    
        if (empty($data_user) || !isset($data_user['ID_kotakab'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kota/Kabupaten tidak ditemukan!</div>');
            redirect('kabkota');
            return;
        }
    
	
        // Ambil data pengajuan dari input form
        $data_pengajuan = array(
            'kodenama_daerah' => $kodenama_daerah,
            'Nama_pengajuan' => $this->input->post('Nama_pengajuan'),
            'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
            'file_bukti' => $this->_uploadFile(),
        );
    
        // Tambahkan log untuk debugging
        log_message('debug', 'Data Pengajuan: ' . print_r($data_pengajuan, true));
    
        // Jika file_bukti gagal diunggah
        if ($data_pengajuan['file_bukti'] === false) {
            print_r('errorda ');
            exit();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengunggah berkas!</div>');
            redirect('Kabkota');
            return;
        }
    	
        // Mulai transaksi
        $this->db->trans_start();
        $id_pengajuan = $this->pengajuan_model->tambah_pengajuan_kabkota($data_pengajuan);
		
	
        // Tambahkan log untuk debugging
        log_message('debug', 'ID Pengajuan: ' . $id_pengajuan);
    
        if ($id_pengajuan) {
            $file_path = FCPATH . $data_pengajuan['file_bukti'];
            $this->_importExcelData($file_path, $id_pengajuan);
        } else {
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan pengajuan!</div>');
            redirect('Kabkota');
            return;
        }
    
        // Selesaikan transaksi
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan pengajuan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diajukan!</div>');
        }
    
        redirect('Kabkota');
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
		
		$this->pengajuan_model->tambah_item($data_item);

		$data_pengajuan = $this->db->select('anggaran')
		->from('pengajuan_kabkota')
		->where('id_pengajuan', $id_pengajuan)
		->get()
		->row_array();
		
		$data = [
			'anggaran' => $data_pengajuan['anggaran'] + $total
		];
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan_kabkota', $data);
		redirect('Kabkota/editpengajuan/'.$id_pengajuan);
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
	

    // Function to upload file
    private function _uploadFile() {
        $config['upload_path'] = FCPATH . 'uploads/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size'] = 2048; // in kilobytes
    
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
    
    
    public function editpengajuan($id_pengajuan)
    {
        // Mengambil data pengajuan dengan ID yang diberikan
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
        $this->load->view('template/sidebatkabkota');
        $this->load->view('kota/editpengajuan', $data);
        $this->load->view('template/footer');
    
        // Panggil fungsi _importExcelData dengan memberikan kedua argumen yang diperlukan
        // Anda perlu menentukan nilai $file_path, misalnya dengan mengambilnya dari $pengajuan->file_bukti
        $file_path = ""; // Tentukan nilai default untuk $file_path
        if(isset($pengajuan['file_bukti'])) {
            $file_path = $pengajuan['file_bukti'];
        }
        $this->_importExcelData($file_path, $id_pengajuan);
    }
    
    
    
            

        
            public function update_pengajuan() {
                // Memvalidasi input
                $this->form_validation->set_rules('kodenama_daerah', 'Kode/Nama Daerah', 'required');
                $this->form_validation->set_rules('Nama_pengajuan', 'Nama Pengajuan', 'required');
                // Tambahkan validasi lainnya sesuai kebutuhan
                
                if ($this->form_validation->run() == FALSE) {
                    // Jika validasi gagal, kembali ke halaman edit dengan data yang sama
                    $this->editpengajuan($this->input->post('id_pengajuan'));
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
                    );
                    $result = $this->pengajuan_model->update_pengajuan($id_pengajuan, $data);
                    
                    if ($result) {
                        // Set flash data untuk pesan sukses
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil diperbarui!</div>');
                        // Redirect kembali ke halaman 'Kabkota'
                        redirect('Kabkota');
                    } else {
                        // Set flash data untuk pesan gagal
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui pengajuan!</div>');
                        // Redirect kembali ke halaman 'Kabkota'
                        redirect('Kabkota');
                    }
                }
            }
            
            public function tambahitem()
            {

				$data['program'] = $this->Pr_model->get();
				$data['kegiatan'] = $this->M_Kegiatan->get();
				$data['kro'] = $this->M_kro->get();
				$data['ro'] = $this->M_Ro->get();
				$data['komponen'] = $this->M_Komponen->get();
				$data['satuan'] = $this->M_satuan->get();
                $this->load->view('template/header');
                $this->load->view('template/sidebatkabkota',$data);
                $this->load->view('kota/tambahitem');
                $this->load->view('template/footer');
                $this->load->view('kota/scripts');
            }
            public function editpengajuandummy()
            {
                 // Mengambil data pengajuan dengan ID yang diberikan
                $data['pengajuan'] = $this->pengajuan_model->get_pengajuan_by_id($id);
            
                // Periksa apakah data pengajuan ditemukan
                if (!$data['pengajuan']) {
                    // Jika tidak ditemukan, tampilkan pesan kesalahan atau lakukan penanganan kesalahan lainnya
                    echo "Pengajuan tidak ditemukan.";
                    return;
                }
            
                $this->load->view('template/header');
                $this->load->view('template/sidebatkabkota');
                $this->load->view('kota/tambahitem');
                $this->load->view('template/footer');
            }
    public function faq()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebatkabkota');
        $this->load->view('kota/faq');
        $this->load->view('template/footer');
	}
    public function Profile()
	{
		
        $this->load->view('template/header');
        $this->load->view('template/sidebatkabkota');
        $this->load->view('kota/setting');
        $this->load->view('template/footer');
	}
    public function downloadData($id_pengajuan) {
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
    public function updateProfile()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$username =  $this->input->post('username');
		$email =  $this->input->post('email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user_form');
        } else {
            $data = array(
                'username' => $username ,
                'email' => $email
            );
			$id= $this->session->userdata('user_id');
            $insert = $this->user_model->update_user($id,$data);
			
            if ($insert) {
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('email');
				$this->session->set_userdata('username', $username);
           		$this->session->set_userdata('email', $email);
                $this->session->set_flashdata('success', 'User data update successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to save user data');
            }

            redirect('Kabkota/Profile');
        }
    }
	public function change_password()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('renew_password', 'Re-enter New Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
			$this->load->view('kota/setting');
        } else {
            $current_password = $this->input->post('current_password');
            // $new_password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);
            $new_password = $this->input->post('new_password');
            $user_id = $this->session->userdata('user_id'); // Pastikan Anda menyimpan user_id di sesi

            $user = $this->user_model->get_user_by_id($user_id);
			//NEw
            if ($user && $current_password && $user->password) {
                $data = array(
                    'password' => $new_password
                );

                $update = $this->user_model->update_user($user_id, $data);

                if ($update) {
                    $this->session->set_flashdata('success', 'Password updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update password');
                }
            } else {
                $this->session->set_flashdata('error', 'Current password is incorrect');
            }

            redirect('Kabkota/Profile');
        }
    }
    
    
}