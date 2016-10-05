<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function index() {
    
    $data['poll_id'] = 3;
    
	$data['window_title'] = "Stroydocs.com. Строительные расчеты и калькуляторы онлайн";
	$data['meta_description'] = "Stroydocs.com. Строительные расчеты и калькуляторы онлайн. Стройдокс";
	$data['meta_keywords'] = "Stroydocs.com. Строительные расчеты и калькуляторы онлайн. Стройдокс";
	$data['doc_title'] = "Главная";
	$data['doc_title_desc'] = "строительные расчеты и калькуляторы онлайн";
	$data['breadcrumb'] = '';
    
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('email', 'E-mail', 'trim|min_length[3]|max_length[40]|valid_email|required');
    
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    if ($this->form_validation->run()) {
          
        $this->load->library(array('email'));
        
        $this->email->from('admin@stroydocs.com', 'stroydocs.com');
        $this->email->to('admin@stroydocs.com');
        $this->email->subject('Заявка на StroyAdmin с сайта');
        $mess = "E-mail: ".$this->input->post('email');
        $this->email->message($mess);	
            
        if  ($this->email->send()) {
        $data['result'] = '1';
        } else {
        $data['result'] = '0';
        }
    } else {
    	$data['result'] = '0';
    }    
    
	$this->load->view('templates/header_view', $data);
	$this->load->view('templates/main_sidebar_view', $data);
	$this->load->view('index_view', $data);
	$this->load->view('templates/footer_view', $data);
}



}