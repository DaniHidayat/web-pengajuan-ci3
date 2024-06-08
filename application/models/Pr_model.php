<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pr_model extends CI_Model {
    

        

    public function get() {
        return $this->db->get('program')->result_array();
    }
 
}