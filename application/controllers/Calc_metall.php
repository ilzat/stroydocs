<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calc_metall extends CI_Controller {

function __construct()
{
	parent::__construct();
}

public function index() {
	
	$data['window_title'] = "Удобный калькулятор металлопроката";
	$data['meta_description'] = "Удобный калькулятор металлопроката. Двутавр, балка, швеллер, уголок, листовая сталь, трубы, пруток";
	$data['meta_keywords'] = "Удобный калькулятор металлопроката. Двутавр, балка, швеллер, уголок, листовая сталь, трубы, пруток";
	$data['doc_title'] = "Удобный калькулятор металлопроката";
	$data['doc_title_desc'] = "";
	$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
                           <li class="active">Калькулятор металлопроката</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calc/calc_metall_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}

public function profile_taken() {
	
	$this->load->model('calc/calc_metall_model');
	
	$prokat_type = trim($_POST['prokat_type']);
	
	$profile_arr = $this->calc_metall_model->profile_taken($prokat_type)->result_array();
	
	$data_arr['profile'] = "";
	foreach ($profile_arr as $key => $value){
		$data_arr['profile'] .=  '<option value="'.$value['key'].'" data-pattern="'.$value['pattern'].'">'.$value['name'].'</option>';
	}
	echo $data_arr['profile'];
}

public function size_taken() {
	
	$this->load->model('calc/calc_metall_model');
	
	$profile = trim($_POST['profile']);
	
	$size_arr = $this->calc_metall_model->size_taken($profile)->result_array();
	
	$profile_arr = $this->calc_metall_model->profile_taken_by_profile($profile)->result_array();
	$data_arr['size_desc'] = $profile_arr[0]['size_desc'];
	$data_arr['pattern'] = $profile_arr[0]['pattern'];
	$data_arr['status'] = $profile_arr[0]['status'];
	
	$data_arr['size'] = "";
	foreach ($size_arr as $value){
		$data_arr['size'] .= '<option value="'.$value['id'].'">'.$profile_arr[0]['symbol'].$value['size'].'</option>';
	}
	
	
	echo json_encode($data_arr);
}

public function weight_1_m_taken() {
	
	$this->load->model('calc/calc_metall_model');
	
	$size = trim($_POST['size']);
	
	$weight_1_m_arr = $this->calc_metall_model->weight_1_m_taken($size)->result_array();
	
	$weight_1_m = $weight_1_m_arr[0]['weight_1_m'];
	
	echo $weight_1_m;
}

private function isJSON($string) {
    return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
}


public function save() {
	
	$this->load->model('calc/calc_metall_model');
	
	if ($this->isJSON(trim($_POST['specArrJSON']))) {
		$result = $this->calc_metall_model->save(array('data'  => trim($_POST['specArrJSON'])));

		if ($result > 0) {
			echo $result;
		} else {
			echo 'error';
		}		
	} else {
		echo 'error';
	}
}

public function spec() {
	
    $this->load->model('calc/calc_metall_model');
    $specArrJSON = $this->calc_metall_model->open($this->uri->segment(3));
    if (!$specArrJSON) {
        header("Location: /kalkulyator_metalloprokata");
    } else {
        $data['specArrJSON'] = $specArrJSON;
        $data['id'] = $this->uri->segment(3);
    }
    
	$data['window_title'] = "Спецификация металлопроката";
	$data['meta_description'] = "Удобный калькулятор металлопроката. Двутавр, балка, швеллер, уголок, листовая сталь, трубы, пруток";
	$data['meta_keywords'] = "Удобный калькулятор металлопроката. Двутавр, балка, швеллер, уголок, листовая сталь, трубы, пруток";
	$data['doc_title'] = "Спецификация металлопроката";
	$data['doc_title_desc'] = "";
	$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
                           <li class="active">Калькулятор металлопроката</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calc/calc_metall_spec_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}

















}