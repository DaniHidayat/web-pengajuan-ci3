<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ro extends CI_Model {
    
 public function get() {
        return $this->db->get('ro')->result_array();
    }
 
}