<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
   
public function index() {
	header("Location: /");
}

public function work_book() {
	if ($this->uri->segment(3) == '') { // основаная страница
		
		$data['window_title'] = "Журналы производства работ";
		$data['meta_description'] = "Журналы производства работ";
		$data['meta_keywords'] = "Журналы производства работ";
		$data['doc_title'] = "Журналы производства работ";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li class="active">Журналы работ</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
		
		$this->load->view('info/work_book/work_book_view', $data);
		
		$this->load->view('templates/footer_view', $data);
	} else {
		switch ($this->uri->segment(3)) {
		
		case "general":
			$title = "Общий журнал работ";
			break;
			
		case "beton":
			$title = "Журнал бетонных работ";
			break;
			
		case "welding":
			$title = "Журнал сварочных работ";
			break;
			
		case "installation":
			$title = "Журнал работ по монтажу строительных конструкций";
			break;
			
		case "welding_paint":
			$title = "Журнал антикоррозионной защиты сварных соединений";
			break;
			
		case "monolit":
			$title = "Журнал замоноличивания монтажных стыков";
			break;
			
		case "bolt":
			$title = "Журнал выполнения монтажных соединений на болтах с контролируемым натяжением";
			break;
			
		case "tarirovka":
			$title = "Журнал контрольной тарировки динамометрических ключей";
			break;
			
		case "svai":
			$title = "Журнал погружения (забивки) свай";
			break;
			
		case "check_material":
			$title = "Журнал учета результатов входного контроля";
			break;
			
		default:
			header("Location: /info/work_book");
		}
		
		$data['window_title'] = $title." Скачать журналы производства работ";
		$data['meta_description'] = $title." Скачать журналы производства работ";
		$data['meta_keywords'] = $title." Скачать журналы производства работ";
		$data['doc_title'] = "<a href='/info/work_book'>Журналы производства работ</a>";
		$data['doc_title_desc'] = '';
		$data['title'] = $title;
		$data['breadcrumb'] = '<li class="active">Журналы</li>';
		$data['breadcrumb'] = '<li><a href="'.base_url().'#info">Справка</a></li>
							   <li><a href="'.base_url().'info/work_book">Журанлы работ</a></li>
							   <li class="active">'.substr($title, 0, 50).'</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
		
		$this->load->view('info/work_book/'.$this->uri->segment(3).'_view', $data);
		
		$this->load->view('templates/footer_view', $data);
	}
}

public function e_veter() {
   
    $data['window_title'] = "Построение розы ветров для городов России";
    $data['meta_description'] = "Построение розы ветров для городов России";
    $data['meta_keywords'] = "Построение розы ветров для городов России";
    $data['doc_title'] = "Построение розы ветров для городов России";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li><a href="'.base_url().'#info">Справка</a></li>
                           <li class="active">Построение розы ветров</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('info/e_veter_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function getVeterByAjax() {
    $this->load->library('Datatables');
    $this->load->helper('datatables_callback_helper');
    $this->datatables
          ->select('country, region, city, id, jan_s, jan_sv, jan_v, jan_uv, jan_u, jan_uz, jan_z, jan_sz, jul_s, jul_sv, jul_v, jul_uv, jul_u, jul_uz, jul_z, jul_sz')
          ->from('sd_wind_route')
          //->where('switch', '1')
          //->edit_column('id', '<button type="button" class="btn btn-block btn-info btn-xs">Построить</button>','jan_s')
          ->add_column('draw', '<button type="button" class="btn btn-block btn-info btn-xs" onclick="drawVeter($2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17,\'$1\');">Построить','city, jan_s, jan_sv, jan_v, jan_uv, jan_u, jan_uz, jan_z, jan_sz, jul_s, jul_sv, jul_v, jul_uv, jul_u, jul_uz, jul_z, jul_sz');
          //<a href="'.base_url().'sortament/view/$1">$2</a>','key, name')
          //->edit_column('status', '$1','callback_status(status)')
          ;
    echo $this->datatables->generate();
}





}
