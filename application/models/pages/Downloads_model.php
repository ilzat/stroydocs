<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Downloads_model extends CI_Model {

public function __construct() {
	
	parent::__construct();
	
}

public function get_downloads_1() {
	
	return $this->db->get("downloads_1");
	
}

public function get_downloads_1_row($segment) {
	
	$this->db->where('segment', $segment);
	return $this->db->get("downloads_1");
	
}

public function get_downloads_2_row($segment, $cat_1_id) {
	
	$this->db->where('segment', $segment);
	$this->db->where('parent_id', $cat_1_id);
	return $this->db->get("downloads_2");
	
}

public function get_downloads_2($segment) {
	
	$this->db->where('segment', $segment);
	$downloads_1 = $this->db->get("downloads_1")->row_array();
	$this->db->where('parent_id', $downloads_1['id']);
	return $this->db->get("downloads_2");
	
}


public function get_downloads_3($id) {
	
	$this->db->where('parent_id', $id);
	return $this->db->get("downloads_3");
	
}












}
?>