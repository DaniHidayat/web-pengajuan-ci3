<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komponen   extends CI_Model {
    

        

    public function get() {
        return $this->db->get('komponen')->result_array();
    }
 
}