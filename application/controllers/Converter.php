<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Converter extends CI_Controller {



public function index()
{
	$title = "Преобразование едениц измерения";
	$data['window_title'] = $title;
	$data['meta_description'] = $title;
	$data['meta_keywords'] = $title;
	$data['doc_title'] = "Преобразование едениц измерения";
	$data['doc_title_desc'] = '';
	$data['breadcrumb'] = '<li class="active">Конверторы</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calculators/converter/converter_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}
private function default_meta($name){
	$segment = $this->uri->segment(2);
	$title = "Преобразование едениц измерения. ".$name;
	$data['window_title'] = $title;
	$data['meta_description'] = $title;
	$data['meta_keywords'] = $title;
	$data['doc_title'] = "Преобразование едениц измерения";
	$data['doc_title_desc'] = $name;
	$data['breadcrumb'] = '<li><a href="'.base_url().'converter">Конверторы</a></li>
	                       <li class="active">'.$name.'</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calculators/converter/'.$segment.'_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}
public function sila()
{	
	$this->default_meta('Силы');
}
public function lin_size()
{		
	$this->default_meta('Линейные размеры');
}
public function square()
{		
	$this->default_meta('Площади');
}
public function volume()
{		
	$this->default_meta('Объемы');
}
public function angles()
{		
	$this->default_meta('Углы');
}
public function times()
{		
	$this->default_meta('Времена');
}


public function raspred_sila()
{		
	$this->default_meta('Распределенные силы');
}
public function pressure()
{		
	$this->default_meta('Давления');
}
public function weight()
{		
	$this->default_meta('Удельные веса');
}
public function speed()
{		
	$this->default_meta('Скорости');
}
public function acceleration()
{		
	$this->default_meta('Ускорения');
}
public function moments()
{		
	$this->default_meta('Моменты');
}
















}