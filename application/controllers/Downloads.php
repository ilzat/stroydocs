<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Downloads extends CI_Controller {

function __construct()
{
	parent::__construct();
}

public function index()
{
	if ($this->uri->segment(1) != 'downloads') {
		die("downloads error");
	}
	$this->load->model('pages/downloads_model');
	
	if ($this->uri->segment(2) == false) { // главная страница //downloads
		
		$cat_1_arr = $this->downloads_model->get_downloads_1()->result_array();
		
		$data['cat_1_arr'] = $cat_1_arr;
		
		$title = "Файловый архив";
		$data['window_title'] = $title;
		$data['meta_description'] = $title;
		$data['meta_keywords'] = $title;
		$data['doc_title'] = '<a href="'.base_url().'downloads">'.$title.'</a>';
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li class="active">Файловый архив</li>';
		
		$this->load->view('templates/header_view', $data);
		$this->load->view('templates/main_sidebar_view', $data);		
		$this->load->view('pages/downloads/downloads_1_view', $data);
		$this->load->view('templates/footer_view', $data);
	} else {
		
		if ($this->uri->segment(3) == false) { // второстепенная страница //downloads/app			
			
			$cat_1_row = $this->downloads_model->get_downloads_1_row($this->uri->segment(2))->row_array();
			
			if (empty($cat_1_row)) {
				header("Location: /404");
			}
			
			$cat_2_arr = $this->downloads_model->get_downloads_2($this->uri->segment(2))->result_array();
			
			$data['cat_2_arr'] = $cat_2_arr;
			$data['cat_1_row'] = $cat_1_row;
			
			$title = "Файловый архив > ".$cat_1_row['category'];
			$data['window_title'] = $title;
			$data['meta_description'] = $title;
			$data['meta_keywords'] = $title;
			$data['doc_title'] = '<a href="'.base_url().'downloads">Файловый архив</a> <br/> 
								  <a href="'.base_url().'downloads/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a>';
			$data['doc_title_desc'] = "";
			$data['breadcrumb'] = '<li><a href="'.base_url().'downloads">Файловый архив</a></li>
							       <li class="active">'.$cat_1_row['category'].'</li>';
			
			$this->load->view('templates/header_view', $data);
			$this->load->view('templates/main_sidebar_view', $data);		
			$this->load->view('pages/downloads/downloads_2_view', $data);
			$this->load->view('templates/footer_view', $data);
			
		} else { // третьестепенная страница //downloads/app/calc
			
			$cat_1_row = $this->downloads_model->get_downloads_1_row($this->uri->segment(2))->row_array();
			
			if (empty($cat_1_row)) {
				header("Location: /404");
			}
			
			$cat_2_row = $this->downloads_model->get_downloads_2_row($this->uri->segment(3), $cat_1_row['id'])->row_array();
			if (empty($cat_2_row)) {
				header("Location: /404");
			}
			
			$cat_3_arr = $this->downloads_model->get_downloads_3($cat_2_row['id'])->result_array();
			
			$data['cat_1_row'] = $cat_1_row;
			$data['cat_2_row'] = $cat_2_row;
			$data['cat_3_arr'] = $cat_3_arr;
			
			$title = "Файловый архив > ".$cat_1_row['category']." > ".$cat_2_row['sub_category'];
			$data['window_title'] = $title;
			$data['meta_description'] = $title;
			$data['meta_keywords'] = $title;
			$data['doc_title'] = '<a href="'.base_url().'downloads">Файловый архив</a> <br/> 
								  <a href="'.base_url().'downloads/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a> > '.$cat_2_row['sub_category'];
			$data['doc_title_desc'] = '';
			$data['breadcrumb'] = '<li><a href="'.base_url().'downloads">Файловый архив</a></li>
								   <li><a href="'.base_url().'downloads/'.$cat_1_row['segment'].'">'.$cat_1_row['category'].'</a></li>
							       <li class="active">'.$cat_2_row['sub_category'].'</li>
								   
								   ';
			
			$this->load->view('templates/header_view', $data);
			$this->load->view('templates/main_sidebar_view', $data);		
			$this->load->view('pages/downloads/downloads_3_view', $data);
			$this->load->view('templates/footer_view', $data);
			
		}
		
	}
}













}