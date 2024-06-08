<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {
    

        

    public function get() {
        return $this->db->get('program')->result_array();
    }
 
}