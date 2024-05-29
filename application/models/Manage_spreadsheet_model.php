<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage_spreadsheet_model extends CI_Model{
 
  public function __construct() {
    parent::__construct();
    $this->table = 'import';
    $this->db = $this->load->database('default',TRUE);
  }
 
  public function add($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
 
  public function get($where = 0) {
    if($where) 
      $this->db->where($where);
    $query = $this->db->get($this->table);
    return $query->row();
  }
 
  public function add_batch($data) {
    return $this->db->insert_batch($this->table, $data);
  }
}