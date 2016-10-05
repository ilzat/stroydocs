<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calc_metall_model extends CI_Model {

public function __construct() {
	
	parent::__construct();
	
}
public function profile_taken($prokat_type)
{    
	$this->db->where('switch', '1');
	$this->db->where('father_key', $prokat_type);
	return $this->db->get('met_calc_2');
}
public function profile_taken_by_profile($profile)
{    
	$this->db->where('key', $profile);
	return $this->db->get('met_calc_2');
}
public function size_taken($profile)
{    
	$this->db->where('father_key', $profile);
	return $this->db->get('met_base');
}
public function weight_1_m_taken($size)
{    
	$this->db->where('id', $size);
	return $this->db->get('met_base');
}
public function save($arr)
{    
	if ($this->db->insert('met_calc_users_save', $arr)) {
		$this->db->select('id');
		$this->db->order_by('id', 'desc'); 
		$res = $this->db->get('met_calc_users_save', 1)->result_array();
		return $res[0]['id'];
	}
}
public function open($id)
{    
	$this->db->where('id', $id);
	$res = $this->db->get('met_calc_users_save')->result_array();
    if ($res) {
       return $res[0]['data']; 
    } else {
        return false;
    }
    
}












}
?>