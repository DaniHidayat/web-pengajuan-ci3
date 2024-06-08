<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        // Load AccessControl hook
    
    }

    public function index() {
        $this->load->view('login');
    }

    public function process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('role', $user->role);
            $this->session->set_userdata('id_dep', $user->id_dep);
            $this->session->set_userdata('ID_Provinsi', $user->ID_Provinsi);
            $this->session->set_userdata('ID_KotaKab', $user->ID_KotaKab);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }

    public function logout()
    {
        // Destroy session data
        $this->session->sess_destroy();
        // Redirect to login page
        redirect('login');
    }

}