<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function create_account($data) {
        // Masukkan data ke dalam tabel 'accounts'
        $this->db->insert('users', $data);
        
        // Kembalikan true jika data berhasil dimasukkan, false jika gagal
        return $this->db->affected_rows() > 0 ? true : false;
    }
    public function get_provinces() {
        return $this->db->get('Provinsi')->result();
    }
    public function get_pusat_users() {
        // Query untuk mengambil data users dengan role 'pusat' dari tabel 'users'
        $this->db->where('role', 'pusat');
        $query = $this->db->get('users');
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
    public function get_cities_by_province($province_id) {
        return $this->db->get_where('Kota_Kabupaten', array('ID_Provinsi' => $province_id))->result();
    }
    public function get_prov_users() {
        // Query untuk mengambil data users dengan role 'pusat' dari tabel 'users'
        $this->db->where('role', 'provinsi');
        $query = $this->db->get('users');
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
    public function get_kab_users() {
        // Query untuk mengambil data users dengan role 'pusat' dari tabel 'users'
        $this->db->where('role', 'kabupaten_kota');
        $query = $this->db->get('users');
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
    public function get_user_by_id($id) {
        // Mengambil data user berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        
        // Mengembalikan hasil query dalam bentuk array
        return $query->row_array();
    }
    public function update_user($id, $data) {
        // Lakukan update data pengguna berdasarkan ID
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    
        // Periksa apakah proses update berhasil
        return $this->db->affected_rows() > 0;
    }
    
    public function get_wilayah() {
        // Ambil data wilayah dari tabel user kolom wilayah
        $this->db->select('name_prov');
        $this->db->from('users');// Pastikan data wilayah unik
        $query = $this->db->get();
        
        return $query->result_array();
    }
    public function delete_user($id) {
        // Menghapus data user berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
    
}