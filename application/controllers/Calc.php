<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calc extends CI_Controller {

public function index() {
	
	header("Location: /");
}

public function armatura() {
	
	$data['window_title'] = "Таблица веса арматуры. Сортамент";
	$data['meta_description'] = "Арматура вес сортамент таблица расчет 10 12";
	$data['meta_keywords'] = "Арматура вес сортамент таблица расчет 10 12";
	$data['doc_title'] = "Сортамент арматуры";
	$data['doc_title_desc'] = "сколько весит погонный метр";
	$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
                           <li class="active">Сортамент арматуры</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calc/armatura_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}

public function volume_pipes() {
    $data['window_title'] = "Расчет объема воды в трубе";
    $data['meta_description'] = "Расчет объема труб. Определение объема жидкости (воды) в трубе";
    $data['meta_keywords'] = "Расчет объема труб. Определение объема жидкости (воды) в трубе";
    $data['doc_title'] = "Расчет объема воды в трубе";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
                           <li class="active">Расчет объема воды в трубе</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calc/volume_pipes_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function slope() {    
    $data['window_title'] = "Калькулятор уклонов";
    $data['meta_description'] = "Калькулятор уклонов. Перевод из градусов в проценты. Определение уклона";
    $data['meta_keywords'] = "Калькулятор уклонов. Перевод из градусов в проценты. Определение уклона";
    $data['doc_title'] = "Калькулятор уклонов";
    $data['doc_title_desc'] = "Перевод из градусов в проценты";
    $data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
                           <li class="active">Калькулятор уклонов</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calc/slope_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function e_ground_works($id = '') {
    if (!empty($id)) {
        header("Location: /calc/e_ground_works");
    }
	$data['window_title'] = "Расчет объемов земляных работ";
	$data['meta_description'] = "Расчет объемов земляных работ. Треншея. Котлован";
	$data['meta_keywords'] = "Расчет объемов земляных работ. Треншея. Котлован";
	$data['doc_title'] = "Расчет объемов земляных работ";
	$data['doc_title_desc'] = "";
	$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
	                       <li class="active">Расчет объемов земляных работ</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calc/e_ground_works_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}





}