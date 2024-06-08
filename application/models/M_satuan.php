<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_satuan extends CI_Model {
    

        

    public function get() {
        return $this->db->get('satuan')->result_array();
    }
 
}