<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessControl
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function checkAccess()
    {
        // Periksa apakah pengguna telah login
        if (!$this->CI->session->userdata('user_id')) {
            // Jika belum, arahkan kembali ke halaman login dan tampilkan pesan alert
            $this->CI->session->set_flashdata('error', 'Anda harus login untuk mengakses halaman ini.');
            redirect('login'); // Ganti 'login' dengan halaman login Anda
        }

        // Periksa hak akses pengguna (misalnya, role)
        $allowed_roles = array('admin', 'super_admin'); // Contoh hak akses yang diizinkan
        $user_role = $this->CI->session->userdata('role');

        if (!in_array($user_role, $allowed_roles)) {
            // Jika pengguna tidak memiliki hak akses yang sesuai, arahkan kembali ke halaman sebelumnya dan tampilkan pesan alert
            $this->CI->session->set_flashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            redirect($_SERVER['HTTP_REFERER']); // Arahkan kembali ke halaman sebelumnya
        }
    }
}