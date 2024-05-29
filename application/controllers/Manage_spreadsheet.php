<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
 
//load package composer
require 'vendor/autoload.php';
 
//deklarasi package yang ingin digunakan
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Manage_spreadsheet extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// Load file model yang akan digunakan
		$this->load->model('manage_spreadsheet_model');
	}
	
	public function index() {
		// Load view form upload
	    $this->load->view("manage_spreadsheet/index");
	}
 
	public function import() {
		// Path directory/folder untuk menyimpan file xls yang di upload
		$path 		= './assets/temp/files/';
 
		// Memanggil fungsi upload_config() untuk inisialisasi fungsi upload
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			//jika proses upload gagal, set flash message error lalu redirect ke halaman form
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			redirect('/manage_spreadsheet');
		} else {
			//get data file yang di upload
			$file_data 	= $this->upload->data();
			//get full path hingga ke filename
			$file_name 	= $path.$file_data['file_name'];
			//proses untuk get extension file
			$arr_file 	= explode('.', $file_name);
			$extension 	= end($arr_file);
			//cek dan validasi jika file yang di upload ber ekstensi xlsx
			if($extension == 'xlsx') {
				 // jika file xlsx, buat object reader xlsx.
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				// jika salah, set flash message error lalu redirect ke halaman form
				$this->session->set_flashdata('alert',array(
                        'class' => 'warning',
                        'message' => 'Tipe file yang diijinkan hanya .xlsx'
                    )
                );				
				redirect('/manage_spreadsheet');
			}
			//proses extrac data yang ada pada file xlsx
			$spreadsheet 	= $reader->load($file_name);
			$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
			$list 			= [];
			foreach($sheet_data as $key => $val) {
				if($key != 0) {
					// cek supaya tidak ada duplikasi data
					$result 	= $this->manage_spreadsheet_model->get(array("isbn" => $val[5]));
					if($result == FALSE || empty($result)) {
						$list [] = [
							'judul'				=> $val[0],
							'penulis'			=> $val[1],
							'penerbit'			=> $val[2],
							'tgl_terbit'		=> $val[3],
							'jml_halaman'		=> $val[4],
							'isbn'				=> $val[5],
							'tgl_ditambahkan' 	=> date("Y-m-d H:i:s")
						];
					} 
				}
			}
			if(file_exists($file_name))
				//hapus kembali file, supaya tidak memenuhi server
				unlink($file_name);
			
			if(count($list) > 0) {
				// proses insert batch data dari file xlsx ke mysql
				$result 	= $this->manage_spreadsheet_model->add_batch($list);
				if($result) {
					$this->session->set_flashdata('alert',array(
                        	'class' => 'success',
                        	'message' => 'Sukses Import Data'
                    	)
                	);	
					redirect('/manage_spreadsheet');
				} else {
					$this->session->set_flashdata('alert',array(
                        	'class' => 'danger',
                        	'message' => 'Maaf, Import Data Gagal'
                    	)
                	);
					redirect('/manage_spreadsheet');
				}
			} else {
				$this->session->set_flashdata('alert',array(
                        	'class' => 'warning',
                        	'message' => 'Data Sudah Ada di Database'
                    	)
                );
				redirect('/manage_spreadsheet');
			}
		}
		redirect('/manage_spreadsheet');
	}
 
	public function upload_config($path) {
		if (!is_dir($path)) 
			mkdir($path, 0755, TRUE);		
		$config['upload_path'] 		= './'.$path;		
		$config['allowed_types'] 	= 'xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096; 
		$this->load->library('upload', $config);
	}
}