<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan  extends CI_Model {
    

        

    public function get() {
        return $this->db->get('kegiatan')->result_array();
    }
 
}