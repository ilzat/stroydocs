<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Column_calc extends CI_Controller {
   
   
   
public function index() {
   
   $data['window_title'] = "Stroydocs.com. Расчет колонны (колонны) онлайн";
   $data['meta_description'] = "";
   $data['meta_keywords'] = "";
   $data['doc_title'] = "Расчет колонны (колонны)";
   $data['doc_title_desc'] = "";
   $data['breadcrumb'] = '<li class="active">Расчет колонны</li>';
   
	 $this->load->view('templates/header_view', $data);
   
   $this->load->view('templates/main_sidebar_view', $data);
   
   $this->load->view('calc/column/step_1_view', $data);
   
   $this->load->view('templates/footer_view', $data);
}




}
