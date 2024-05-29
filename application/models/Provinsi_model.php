<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Load other necessary models, libraries, etc.
    }

    public function tambah_akun_provinsi($data) {
        // Simpan data akun provinsi ke dalam database
        $this->db->insert('tabel_akun_provinsi', $data);
    }

    public function get_all_akun_provinsi() {
        // Ambil semua data akun provinsi dari database
        return $this->db->get('tabel_akun_provinsi')->result();
    }
}