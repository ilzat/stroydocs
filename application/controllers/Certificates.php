<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificates extends CI_Controller {

function __construct()
{
	parent::__construct();
}

public function index()
{
	if ($this->uri->segment(1) != 'certificates') {
		die("certificates error");
	}
	$this->load->model('pages/certificates_model');
	
	if ($this->uri->segment(2) == false) { // главная страница //certificates
		
		$cat_1_arr = $this->certificates_model->get_certificates_1()->result_array();
		
		$data['cat_1_arr'] = $cat_1_arr;
		
		$title = "Сертификаты на материалы";
		$data['window_title'] = $title;
		$data['meta_description'] = $title;
		$data['meta_keywords'] = $title;
		$data['doc_title'] = '<a href="'.base_url().'certificates">'.$title.'</a>';
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li class="active">'.$title.'</li>';
		
		$this->load->view('templates/header_view', $data);
		$this->load->view('templates/main_sidebar_view', $data);		
		$this->load->view('pages/certificates/certificates_1_view', $data);
		$this->load->view('templates/footer_view', $data);
	} else {
		
		if ($this->uri->segment(3) == false) { // второстепенная страница //certificates/app			
			
			$cat_1_row = $this->certificates_model->get_certificates_1_row($this->uri->segment(2))->row_array();
			
			if (empty($cat_1_row)) {
				header("Location: /404");
			}
			
			$cat_2_arr = $this->certificates_model->get_certificates_2($this->uri->segment(2))->result_array();
			
			$data['cat_2_arr'] = $cat_2_arr;
			$data['cat_1_row'] = $cat_1_row;
			
			$title = "Сертификаты на материалы > ".$cat_1_row['category'];
			$data['window_title'] = $title;
			$data['meta_description'] = $title;
			$data['meta_keywords'] = $title;
			$data['header'] = '<a href="'.base_url().'certificates/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a>';
			$data['doc_title'] = '<a href="'.base_url().'certificates">Сертификаты на материалы</a>';
			$data['doc_title_desc'] = "";
			$data['breadcrumb'] = '<li><a href="'.base_url().'certificates">Сертификаты на материалы</a></li>
							       <li class="active">'.$cat_1_row['category'].'</li>';
			
			$this->load->view('templates/header_view', $data);
			$this->load->view('templates/main_sidebar_view', $data);		
			$this->load->view('pages/certificates/certificates_2_view', $data);
			$this->load->view('templates/footer_view', $data);
			
		} else { // третьестепенная страница //certificates/app/calc
			
			$cat_1_row = $this->certificates_model->get_certificates_1_row($this->uri->segment(2))->row_array();
			
			if (empty($cat_1_row)) {
				header("Location: /404");
			}
			
			$cat_2_row = $this->certificates_model->get_certificates_2_row($this->uri->segment(3), $cat_1_row['id'])->row_array();
			if (empty($cat_2_row)) {
				header("Location: /404");
			}
			
			$cat_3_arr = $this->certificates_model->get_certificates_3($cat_2_row['segment'])->result_array();
			
			$data['cat_1_row'] = $cat_1_row;
			$data['cat_2_row'] = $cat_2_row;
			$data['cat_3_arr'] = $cat_3_arr;
			
			$title = "Сертификаты на материалы > ".$cat_1_row['category']." > ".$cat_2_row['sub_category'];
			$data['window_title'] = $title;
			$data['meta_description'] = $title;
			$data['meta_keywords'] = $title;
			$data['header'] = '<a href="'.base_url().'certificates/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a> > '.$cat_2_row['sub_category'];
			$data['doc_title'] = '<a href="'.base_url().'certificates">Сертификаты на материалы</a>';
			$data['doc_title_desc'] = '';
			$data['breadcrumb'] = '<li><a href="'.base_url().'certificates">Сертификаты на материалы</a></li>
								   <li><a href="'.base_url().'certificates/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a></li>
							       <li class="active">'.$cat_2_row['sub_category'].'</li>
								   
								   ';
			
			$this->load->view('templates/header_view', $data);
			$this->load->view('templates/main_sidebar_view', $data);		
			$this->load->view('pages/certificates/certificates_3_view', $data);
			$this->load->view('templates/footer_view', $data);
			
		}
		
	}
}













}