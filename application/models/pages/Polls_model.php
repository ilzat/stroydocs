<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polls_model extends CI_Model {

public function __construct() {
	
	parent::__construct();
	
}

public function get_options_arr($poll_id) {
	
	$this->db->where('ques_id', $poll_id);
	return $this->db->get("poll_options")->result_array();
	
}

public function get_options_arr_2($poll) {
	
	$this->db->where('id', $poll);
	return $this->db->get("poll_options")->result_array();
	
}

function insert_vote($data)
{
	return $this->db->insert('poll_votes', $data);
}

public function get_votes_arr($poll_id) {
	
	return $this->db->query("
	     SELECT COUNT(*) as totalvotes 
		 FROM poll_votes 
		 WHERE poll_votes.option_id 
		 IN(SELECT poll_options.id FROM poll_options WHERE ques_id='$poll_id')
	     ")->result_array();
}

public function get_votes_arr_2($poll_id) {
	return $this->db->query("
	     SELECT poll_options.id, poll_options.value, COUNT(*) as votes FROM poll_votes, poll_options 
		 WHERE poll_votes.option_id=poll_options.id AND poll_votes.option_id 
		 IN(SELECT id FROM poll_options WHERE ques_id='$poll_id') 
		 GROUP BY poll_votes.option_id
	     ")->result_array();
}







}
?>