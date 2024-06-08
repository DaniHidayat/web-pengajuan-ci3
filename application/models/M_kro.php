<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kro  extends CI_Model {
    

        

    public function get() {
        return $this->db->get('kro')->result_array();
    }
 
}