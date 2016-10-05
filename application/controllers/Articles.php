<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {
   
public function index() {
   
    header("Location: /");
}

public function ispolnitelnaya_dokumentaciya() {
   
    $data['window_title'] = "Порядок ведения исполнительной документации при строительстве";
    $data['meta_description'] = "Порядок ведения исполнительной документации при строительстве";
    $data['meta_keywords'] = "Порядок ведения исполнительной документации при строительстве";
    $data['doc_title'] = "Исполнительная документация";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li>Инженеру ПТО</li>
                           <li class="active">ИД</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('articles/itd_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function zapolnenie_akta_osvidetelstvovaniya_skrytyx_rabot() {
   
    $data['window_title'] = "Заполнение акта освидетельствования скрытых работ";
    $data['meta_description'] = "Заполнение акта освидетельствования скрытых работ. Образец. Бланк. Скачать";
    $data['meta_keywords'] = "Заполнение акта освидетельствования скрытых работ. Образец. Бланк. Скачать";
    $data['doc_title'] = "Заполнение акта освидетельствования скрытых работ";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li>Инженеру ПТО</li>
                           <li class="active">Заполнение акта ОСР</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('articles/akt_osr_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}




}
