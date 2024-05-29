<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_model extends CI_Model {
    

        

    public function get() {
        return $this->db->get('satuan')->result_array();
    }
 
}
