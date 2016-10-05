<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
   
public function index() {
   
    header("Location: /");
}

public function news() {
   
    $data['window_title'] = "Новости";
    $data['meta_description'] = "Новости. Строительные расчеты и калькуляторы онлайн";
    $data['meta_keywords'] = "Новости. Строительные расчеты и калькуляторы онлайн";
    $data['doc_title'] = "Новости";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li class="active">Новости</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('pages/news_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function pto() {
   
    $data['window_title'] = "Новый сервис";
    $data['meta_description'] = "";
    $data['meta_keywords'] = "";
    $data['doc_title'] = "Онлайн сервис для инженеров ПТО";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li class="active">ПТО</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('pages/stroyadmin_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}
public function pto_work() {
   
    $data['window_title'] = "Работа современного инженера ПТО";
    $data['meta_description'] = "Работа современного инженера ПТО. Строительство";
    $data['meta_keywords'] = "Работа современного инженера ПТО. Строительство";
    $data['doc_title'] = "Работа современного инженера ПТО";
    $data['doc_title_desc'] = "";
    $data['breadcrumb'] = '<li class="active">ПТО</li>';
    
    $this->load->view('templates/header_view', $data);
    
    $this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('pages/pto_work_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}

public function page_404() {
   
   $data['window_title'] = "Страница не найдена";
   $data['meta_description'] = "";
   $data['meta_keywords'] = "";
   $data['doc_title'] = "Страница не найдена";
   $data['doc_title_desc'] = "";
   $data['breadcrumb'] = '<li class="active">Страница не найдена</li>';
   
	 $this->load->view('templates/header_view', $data);
   
   $this->load->view('templates/main_sidebar_view', $data);
   
   $this->load->view('pages/page_404_view', $data);
   
   $this->load->view('templates/footer_view', $data);
}

public function forum() {
   
   $data['window_title'] = "Форум";
   $data['meta_description'] = "";
   $data['meta_keywords'] = "";
   $data['doc_title'] = "Форум";
   $data['doc_title_desc'] = "";
   $data['breadcrumb'] = '<li class="active">Форум</li>';
   
	 $this->load->view('templates/header_view', $data);
   
   $this->load->view('templates/main_sidebar_view', $data);
   
   $this->load->view('pages/forum_view', $data);
   
   $this->load->view('templates/footer_view', $data);
}

public function polls()
{
	$data['window_title'] = "Опросы";
	$data['meta_description'] = "Опросы";
	$data['meta_keywords'] = "Опросы";
	$data['doc_title'] = "Опросы";
	$data['doc_title_desc'] = '';
	$data['breadcrumb'] = '<li class="active">Опросы</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('pages/polls/polls_index_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}

public function poll()
{
	$this->load->model('pages/polls_model');
	
	switch ($this->uri->segment(3)) {
	
	case "required_service":
		$data['question'] = "Выберите нужный вам сервис";
		$data['desc'] = "Команда stroydocs.com планирует разработать множество полезных онлайн сервисов, выскажи свое мнение, какой сервис небходим тебе.<br/>
Самый популярный выбор мы будем разрабатывать в первую очередь.";
		$data['poll_id'] = 1;
		$title = "Выбор необходимого сервиса";
		break;
		
	case "rating_service":
		$data['question'] = "Рейтинг сервисов stroydocs.com";
		$data['desc'] = "Прошу вас выбрать из списка самый востребованный вами сервис. Данная информация поможет нам понять в какую сторону двигаться при разработке новых сервисов.";
		$data['poll_id'] = 2;
		$title = "Оценка существующих сервисов";
		break;
				
	default:
		header("Location: /pages/polls");
	}
	
	$data['window_title'] = "Опросы";
	$data['meta_description'] = "Опросы";
	$data['meta_keywords'] = "Опросы";
	$data['doc_title'] = "Опросы";
	$data['doc_title_desc'] = $title;
	$data['breadcrumb'] = '<li><a href="'.base_url().'pages/polls">Опросы</a></li>
	                       <li class="active">'.$title.'</li>';
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('pages/polls/polls_view', $data);
	
	$this->load->view('templates/footer_view', $data);
}

private function pollsShowresults($poll_id) {
	$this->load->model('pages/polls_model');
	$votes_arr = $this->polls_model->get_votes_arr($poll_id);
	
	$votes_total = $votes_arr[0]['totalvotes'];
	
	$votes_arr_2 = $this->polls_model->get_votes_arr_2($poll_id);
	$votes = count($votes_arr_2);
	$return = '';
	foreach ($votes_arr_2 as $row) {		
		$percent = round(($row['votes'] * 100) / $votes_total);
		$return .= '<div class="option" ><p>'.$row['value'].' (<em>'.$percent.'%, '.$row['votes'].' голосов</em>)</p>';
		$return .= '<div class="bar_2 ';
		if($this->input->post('poll')==$row['id']) $return .= ' yourvote';
		$return .= '" style="width: '.$percent.'%; " ></div></div>';
	}
	$return .= '<p>Всего голосов: '.$votes_total.'</p>';
	return $return;
}

public function pollsAjax()
{
	$this->load->model('pages/polls_model');
	
	
	if(!$this->input->post('poll') || !$this->input->post('pollid')){
	
	
		$poll_id = intval($this->uri->segment(3));
		
		if($this->input->get('result')==1 || $this->input->cookie("voted".$poll_id)=='yes'){
			//if already voted or asked for result
			echo $this->pollsShowresults($poll_id);
			exit;
		}
		else{
		//display options with radio buttons
			$options_arr = $this->polls_model->get_options_arr($poll_id);
			
			$output = '<div id="formcontainer" ><form method="post" id="pollform" action="'.base_url().'" >';
			$output .= '<input type="hidden" name="pollid" value="'.$poll_id.'" />';
			
			foreach ($options_arr as $key => $row) {
				$output .= '
						<div class="radio">
							<label>
								<input type="radio" name="poll" id="option-'.$row['id'].'" value="'.$row['id'].'" />
								'.$row['value'].'
							</label>
						</div>';
			}
			$output .= '<p>		
			<input type="submit"  value="Голосовать" class="btn btn-info btn-sm" /> | <a href="'.base_url().'?result=1" id="viewresult">Результаты</a></p></form>';
			echo $output;
		}
	}
	else{
		if($this->input->cookie("voted".$this->input->post('pollid'))!='yes'){
			
			//Check if selected option value is there in database?
			$options_arr_2 = $this->polls_model->get_options_arr_2($this->input->post('poll'));
			if (!empty($options_arr_2)) {
				$array = array('option_id' => $this->input->post('poll'), 'voted_on' => date('Y-m-d H:i:s'), 'ip' => $_SERVER['REMOTE_ADDR']);
				$insert = $this->polls_model->insert_vote($array);
				if (!empty($insert)){
					setcookie("voted".$this->input->post('pollid'), 'yes', time()+86400*300);
				}
			}
		}
		echo $this->pollsShowresults(intval($this->input->post('pollid')));
	}
}



}
