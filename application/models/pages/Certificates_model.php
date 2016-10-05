<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificates_model extends CI_Model {

public function __construct() {
	
	parent::__construct();
	
}

public function get_certificates_1() {
	
	return $this->db->get("certificates_1");
	
}

public function get_certificates_1_row($segment) {
	
	$this->db->where('segment', $segment);
	return $this->db->get("certificates_1");
	
}

public function get_certificates_2_row($segment, $cat_1_id) {
	
	$this->db->where('segment', $segment);
	$this->db->where('parent_id', $cat_1_id);
	return $this->db->get("certificates_2");
	
}

public function get_certificates_2($segment) {
	
	$this->db->where('segment', $segment);
	$certificates_1 = $this->db->get("certificates_1")->row_array();
	$this->db->where('parent_id', $certificates_1['id']);
	return $this->db->get("certificates_2");
	
}


public function get_certificates_3($segment) {
	
	$this->db->where('type', $segment);
	return $this->db->get("certificates_3");
	
}












}
?>