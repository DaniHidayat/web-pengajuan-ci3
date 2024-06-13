<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
    

        

	public function get_laporan() {
		$this->db->select('
			provinsi.Nama_Provinsi,
			SUM(IFNULL(pengajuan_provinsi.anggaran, 0)) AS total_anggaran_provinsi,
			(SELECT SUM(IFNULL(pengajuan_kabkota.anggaran, 0))
				FROM pengajuan_kabkota
				LEFT JOIN kota_kabupaten ON pengajuan_kabkota.kodenama_daerah = kota_kabupaten.ID_KotaKab
				WHERE kota_kabupaten.ID_Provinsi = provinsi.ID_Provinsi AND pengajuan_kabkota.status = "Approved") AS total_anggaran_kabkota,
			SUM(IFNULL(pengajuan_provinsi.anggaran, 0)) +
			(SELECT SUM(IFNULL(pengajuan_kabkota.anggaran, 0))
				FROM pengajuan_kabkota
				LEFT JOIN kota_kabupaten ON pengajuan_kabkota.kodenama_daerah = kota_kabupaten.ID_KotaKab
				WHERE kota_kabupaten.ID_Provinsi = provinsi.ID_Provinsi AND pengajuan_kabkota.status = "Approved") AS total_anggaran
		');
		$this->db->from('provinsi');
		$this->db->join('pengajuan_provinsi', 'provinsi.ID_Provinsi = pengajuan_provinsi.kodenama_daerah', 'left');
		
		// Menambahkan klausa WHERE untuk status "Approved" pada pengajuan_provinsi
		// $this->db->where('pengajuan_provinsi.status', 'Approved');
		
		$this->db->group_by('provinsi.Nama_Provinsi');
		return $this->db->get()->result_array();
	}
	public function get_pengajuan_by_provinsi($id_provinsi) {
        $this->db->select('kota_kabupaten.Nama_KotaKab, SUM(IFNULL(pengajuan_kabkota.anggaran, 0)) as anggaran');
        $this->db->from('pengajuan_kabkota');
        $this->db->join('kota_kabupaten', 'pengajuan_kabkota.kodenama_daerah = kota_kabupaten.ID_KotaKab', 'left');
        $this->db->where('kota_kabupaten.ID_Provinsi', $id_provinsi);
        $this->db->group_by('kota_kabupaten.Nama_KotaKab');
        return $this->db->get()->result_array();
    }
	
}
