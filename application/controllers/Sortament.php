<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sortament extends CI_Controller {
   
   
   
public function index() {
   
    $data['window_title'] = "Сортамент металлопроката";
    $data['meta_description'] = "";
    $data['meta_keywords'] = "";
    $data['doc_title'] = "Сортамент металлопроката";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li class="active">Сортамент металлопроката</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('sortament/angle_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function getSortamentByAjax() {
    $this->load->library('Datatables');
    $this->load->helper('datatables_callback_helper');
    $this->datatables
          ->select('m_list.id, m_list.name, m_list.status, m_list.key')
          ->from('m_list')  
          ->where('switch', '1')
          ->edit_column('name', '<a href="'.base_url().'sortament/view/$1">$2</a>','key, name')
          ->edit_column('status', '$1','callback_status(status)')
          ;
    echo $this->datatables->generate();
}




}
