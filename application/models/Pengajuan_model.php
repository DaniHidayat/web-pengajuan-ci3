<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {
    

        // Fungsi untuk menambah data pengajuan
        public function hapus_import_data_by_pengajuan($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('import');
        }
        public function hapus_import_data_by_pengajuanprov($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('import_prov');
        }
        public function hapus_import_data_by_pengajuandept($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('import_dept');
        }
    
        public function hapus_pengajuan_kabkota($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('pengajuan_kabkota');
        }
        public function hapus_pengajuan_provinsi($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('pengajuan_provinsi');
        }
        public function hapus_pengajuan_dept($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->delete('pengajuan_departement');
        }
        public function tambah_pengajuan_prov($data) {
             $this->db->insert('pengajuan_provinsi', $data);
            return $this->db->insert_id();
        }
        public function tambah_pengajuan_departement($data) {
            $this->db->insert('pengajuan_departement', $data);
           return $this->db->insert_id();
       }
        public function tambah_pengajuan_kabkota($data_pengajuan) {
            // Tambahkan log untuk debugging
            log_message('debug', 'Data untuk insert: ' . print_r($data_pengajuan, true));
            
            $this->db->insert('pengajuan_kabkota', $data_pengajuan);
            $insert_id = $this->db->insert_id();
            
            // Tambahkan log untuk debugging
            log_message('debug', 'Insert ID: ' . $insert_id);
    
            return $insert_id;
        }
       
		public function tambah_item($data_item) {
            return $this->db->insert('import', $data_item);
        }
        public function tambah_itemprov($data_item) {
            return $this->db->insert('import_prov', $data_item);
        }
        public function tambah_itemdept($data_item) {
            return $this->db->insert('import_dept', $data_item);
        }
    
        public function checkImportStatus($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $query = $this->db->get('import');
            return $query->num_rows() > 0;
        }
        public function checkImportStatusprov($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $query = $this->db->get('import_prov');
            return $query->num_rows() > 0;
        }
        public function checkImportStatusdept($id_pengajuan) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $query = $this->db->get('import_dept');
            return $query->num_rows() > 0;
        }
    
        public function insert_import_data($data) {
            $this->db->insert('import', $data);
        }
        public function insert_import_dataprov($data) {
            $this->db->insert('import_prov', $data);
        }
        public function insert_import_datadept($data) {
            $this->db->insert('import_dept', $data);
        }
    
        public function setImportStatus($id_pengajuan, $status) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->update('pengajuan_kabkota', ['is_imported' => $status]);
        }
        public function setImportStatusprov($id_pengajuan, $status) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->update('pengajuan_provinsi', ['is_imported' => $status]);
        }
        public function setImportStatusdept($id_pengajuan, $status) {
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->update('pengajuan_departement', ['is_imported' => $status]);
        }
        // Fungsi untuk mendapatkan semua data pengajuan
        public function get_all_pengajuan() {
            return $this->db->get('pengajuan')->result();
        }


        
        public function get_import_by_id_pengajuan($id_pengajuan)
        {
            // Query untuk mengambil data excel dari database berdasarkan id_pengajuan
            $this->db->where('id_pengajuan', $id_pengajuan);
            return $this->db->get('import')->result();
        }
        public function get_import_by_id_pengajuanprov($id_pengajuan)
        {
            // Query untuk mengambil data excel dari database berdasarkan id_pengajuan
            $this->db->where('id_pengajuan', $id_pengajuan);
            return $this->db->get('import_prov')->result();
        }
        public function get_import_by_id_pengajuandept($id_pengajuan)
        {
            // Query untuk mengambil data excel dari database berdasarkan id_pengajuan
            $this->db->where('id_pengajuan', $id_pengajuan);
            return $this->db->get('import_dept')->result();
        }
        public function get_latest_pengajuan_kabkota() {
            $this->db->order_by('id_pengajuan', 'DESC');
            $this->db->limit(1);
            return $this->db->get('pengajuan_kabkota')->row_array();
        }

    public function get_pengajuan_anggaran() {
        
        $this->db->select('pengajuan_provinsi.*, provinsi.Nama_Provinsi');
        $this->db->from('pengajuan_provinsi');
        $this->db->join('provinsi', 'pengajuan_provinsi.kodenama_daerah = ID_provinsi');
        $query = $this->db->get();
        return $query->result_array();
    }
        public function get_pengajuan_anggarandepartement() {
        
        $this->db->select('pengajuan_departement.*, departemen.nama');
        $this->db->from('pengajuan_departement');
        $this->db->join('departemen', 'pengajuan_departement.kodenama_daerah = id_dep');
        $query = $this->db->get();
        return $query->result_array();
    }  public function get_pengajuan_anggarankabkota() {
        
        $this->db->select('pengajuan_kabkota.*, kota_kabupaten.Nama_KotaKab');
        $this->db->from('pengajuan_kabkota');
        $this->db->join('kota_kabupaten', 'pengajuan_kabkota.kodenama_daerah = ID_kotakab');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_pengajuan_anggaranall() {
        return $this->db->get('pengajuan_kabkota')->result_array();
    }
    public function get_pengajuan_prov() {
        // Pilih kolom yang diperlukan dari pengajuan_provinsi, total anggaran dari tabel import, dan nama provinsi dari tabel provinsi
        $this->db->select('pengajuan_provinsi.*, SUM(import_prov.total) as anggaran, provinsi.Nama_Provinsi');
        $this->db->from('pengajuan_provinsi');
        $this->db->join('import_prov', 'import_prov.id_pengajuan = pengajuan_provinsi.id_pengajuan', 'left');
        $this->db->join('provinsi', 'pengajuan_provinsi.kodenama_daerah = provinsi.ID_Provinsi', 'left');
        
        // Tambahkan kondisi berdasarkan ID_Provinsi dari session
        $this->db->where('pengajuan_provinsi.kodenama_daerah', $this->session->userdata('ID_Provinsi'));
        
        // Grup berdasarkan id_pengajuan
        $this->db->group_by('pengajuan_provinsi.id_pengajuan');
        
        // Jalankan query dan kembalikan hasilnya
        return $this->db->get()->result_array();
    }

 
    
    public function get_pengajuan_anggarankab() {
        // Pilih kolom yang diperlukan dari pengajuan_kabkota, total anggaran dari tabel import, dan nama kota/kabupaten dari tabel_kabkota
        $this->db->select('pk.*,kab.Nama_kotaKab');
        $this->db->from('pengajuan_kabkota as pk');
		$this->db->join('kota_kabupaten as kab', 'kab.ID_KotaKab = pk.kodenama_daerah','left');
		$this->db->join('provinsi as prov', 'prov.ID_Provinsi = kab.ID_Provinsi','left');
		if( $this->session->userdata('role') == 'kabupaten_kota'){
			$this->db->where('kab.ID_KotaKab', $this->session->userdata('ID_KotaKab'));
		}else{
			$this->db->where('kab.ID_Provinsi', $this->session->userdata('ID_Provinsi'));
		}
		
        // Jalankan query dan kembalikan hasilnya
        return $this->db->get()->result_array();
    }
    public function get_pengajuan_departement() {
        $id_provinsi = $this->session->userdata('ID_Provinsi');

        $this->db->select('pengajuan_departement.*, SUM(import_dept.total) as anggaran, departemen.nama');
        $this->db->from('pengajuan_departement');
        $this->db->join('import_dept', 'import_dept.id_pengajuan = pengajuan_departement.id_pengajuan', 'left');
        $this->db->join('departemen', 'pengajuan_departement.kodenama_daerah = departemen.id_dep', 'left');
        
        if ($id_provinsi) {
            $this->db->where('pengajuan_departement.kodenama_daerah', $id_provinsi);
        }
        
        $this->db->group_by('pengajuan_departement.id_pengajuan');
        return $this->db->get()->result_array();
    }
    public function get_pengajuan_kab() {
        $id_provinsi = $this->session->userdata('ID_Provinsi');
        $id_Kab = $this->session->userdata('ID_KotaKab');
    
        $this->db->select('pengajuan_kabkota.*, SUM(import.total) as anggaran, provinsi.Nama_Provinsi, kota_kabupaten.Nama_KotaKab');
        $this->db->from('pengajuan_kabkota');
        $this->db->join('import', 'import.id_pengajuan = pengajuan_kabkota.id_pengajuan', 'left');
        $this->db->join('provinsi', 'pengajuan_kabkota.kodenama_daerah = provinsi.ID_Provinsi', 'left');
        $this->db->join('kota_kabupaten', 'pengajuan_kabkota.kodenama_daerah = kota_kabupaten.ID_KotaKab', 'left'); // Join dengan ID_KotaKab

        if($this->session->userdata('role') == 'kabupaten_kota'){
            $this->db->where('pengajuan_kabkota.kodenama_daerah', $id_Kab);
        } else if($this->session->userdata('role') == 'provinsi'){
            $this->db->where('pengajuan_provinsi.kodenama_daerah', $id_provinsi);
        }

        $this->db->group_by('pengajuan_kabkota.id_pengajuan');

        $query = $this->db->get();
        
        // Debugging: Tampilkan hasil query
        $result = $query->result_array();
        log_message('debug', 'Result: ' . print_r($result, true));
        
        if ($query) {
            return $result;
        } else {
            log_message('error', 'Error in get_pengajuan_kab: ' . $this->db->last_query());
            return array();
        }
    }
    
    
	
    public function get_pengajuan_by_id($id_pengajuan) {
        return $this->db->get_where('pengajuan_kabkota', ['id_pengajuan' => $id_pengajuan])->row_array();
    }
    public function get_pengajuan_by_idprov($id_pengajuan) {
        return $this->db->get_where('pengajuan_provinsi', ['id_pengajuan' => $id_pengajuan])->row_array();
    }
    public function get_pengajuan_by_iddept($id_pengajuan) {
        return $this->db->get_where('pengajuan_departement', ['id_pengajuan' => $id_pengajuan])->row_array();
    }


    // Metode untuk menghapus data di tabel import berdasarkan id_pengajuan
    // public function hapus_import_data_by_pengajuan($id_pengajuan) {
    //     $this->db->where('id_pengajuan', $id_pengajuan);
    //     return $this->db->delete('import');
    // }

    // // Metode untuk menghapus data di tabel pengajuan_kabkota
    // public function hapus_pengajuan_kabkota($id_pengajuan) {
    //     $this->db->where('id_pengajuan', $id_pengajuan);
    //     return $this->db->delete('pengajuan_kabkota');
    // }
    public function hapus_pengajuan($id_pengajuan) {
        // Gantilah 'tabel_pengajuan' dengan nama tabel yang sesuai
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->delete('pengajuan_kabkota');
    }

    // public function get_pengajuan_by_id($id_pengajuan) {
    //     $this->db->where('id_pengajuan', $id_pengajuan);
    //     $query = $this->db->get('pengajuan_kabkota');
        
    //     // Mengembalikan hasil query dalam bentuk array
    //     return $query->row_array();
    // }
    public function update_pengajuankab($id_pengajuan, $data) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->update('pengajuan_kabkota', $data);
    }
    public function update_pengajuan($id_pengajuan, $data) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->update('pengajuan_kabkota', $data);
    }
    public function update_pengajuanprov($id_pengajuan, $data) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_provinsi', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function update_pengajuandept($id_pengajuan, $data) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_departement', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    // Dalam Pengajuan_model.php
// Dalam Pengajuan_model.php
public function get_data_for_download($id_pengajuan) {
    $this->db->select('Program, Kegiatan, KRO, RO, Komponen, Satuan, Qty, subtotal, total');
    $this->db->from('import'); // Gantilah 'import' dengan nama tabel yang sesuai
    $this->db->where('id_pengajuan', $id_pengajuan);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false; // Kembalikan false jika data tidak ditemukan
    }
}
public function get_data_for_downloadprov($id_pengajuan) {
    $this->db->select('Program, Kegiatan, KRO, RO, Komponen, Satuan, Qty, subtotal, total');
    $this->db->from('import_prov'); // Gantilah 'import' dengan nama tabel yang sesuai
    $this->db->where('id_pengajuan', $id_pengajuan);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false; // Kembalikan false jika data tidak ditemukan
    }
}
public function get_data_for_downloaddept($id_pengajuan) {
    $this->db->select('Program, Kegiatan, KRO, RO, Komponen, Satuan, Qty, subtotal, total');
    $this->db->from('import_dept'); // Gantilah 'import' dengan nama tabel yang sesuai
    $this->db->where('id_pengajuan', $id_pengajuan);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false; // Kembalikan false jika data tidak ditemukan
    }
}
}

