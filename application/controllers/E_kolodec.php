<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class E_kolodec extends CI_Controller {
  
function __construct()
{
	parent::__construct();
}
public function index() {
	$data['window_title'] = "Подбор железобетонных элементов водопроводных и канализационных колодцев";
	$data['meta_description'] = "Подбор железобетонных элементов водопроводных и канализационных колодцев";
	$data['meta_keywords'] = "Подбор железобетонных элементов водопроводных и канализационных колодцев";
	$data['doc_title'] = "Подбор железобетонных элементов <br/>водопроводных и канализационных колодцев";
	$data['doc_title_desc'] = "";
	$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
						   <li class="active">Подбор элементов колодца</li>';
	
	$this->load->helper('form');
	$this->load->library('form_validation');  
	
	$this->form_validation->set_rules('name', 'Название', 'trim|max_length[10]');
	$this->form_validation->set_rules('place', 'Место установки', 'trim|max_length[10]');
	$this->form_validation->set_rules('diameter', 'Диаметр', 'trim|max_length[10]');
	$this->form_validation->set_rules('depth', 'Глубина по профилю', 'trim|required|max_length[10]');
	$this->form_validation->set_rules('h_work', 'Высота рабочей части', 'trim|max_length[10]');
	$this->form_validation->set_rules('trap_type', 'Тип люка', 'trim|max_length[10]');
	$this->form_validation->set_rules('k_300_have', 'Использовать кольца высотой 0.3 м.', 'trim|max_length[10]');
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
	if ($this->form_validation->run()) { // форма прошла
		
		$this->load->library('kolodec_draw');
		
		$name_user = $this->input->post('name');
		$place_user = $this->input->post('place');
		$diameter_user = $this->input->post('diameter');
		$depth_user = $this->input->post('depth');
		$h_work_user = $this->input->post('h_work');
		$trap_type_user = $this->input->post('trap_type');
		$k_300_have_user = $this->input->post('k_300_have');
		
		//толлщина стенки колец рабочей части
		if ($diameter_user=="1000"){
		  $t_st=80;
		} 
		if ($diameter_user=="1500"){
		  $t_st=90;
		} 
		if ($diameter_user=="2000"){
		  $t_st=100;
		} 
		
		// определяем толщину конструкции
		if ($trap_type_user=="heavy"){
		  $h_luk=120;
		} else {
		  $h_luk=90;
		}
		if($place_user=="city"){
		      $h_konstruk=$depth_user+50;
		} 
		if ($place_user=="car"){
		      $h_konstruk=$depth_user;
		}
		
		// определяем толщину днища
		if ($diameter_user=="1000"){
		  $h_dnisha=100;
		} else {
		  $h_dnisha=120;
		}
		// опрделяем толщину перекрытия
		if ($diameter_user=="2000"){
		  $h_perekrit=160;
		} else {
		  $h_perekrit=150;
		}
		// определяем высоту рабочей части
		$h_work_raschetn=floor($h_work_user/300)*300;
		$count=1;
		if ($k_300_have_user=="1"){ // если кольца 300 используем
		// определяем кольца рабочей части
		// Цикл выполняющий код n_ciklov раз /////////////////////////////////
			$n_ciklov_9=floor($h_work_raschetn/900); // количество колец 900 мм
			for ($i=1;$i<=$n_ciklov_9;$i++){
			$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".9";
			$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
			$kolca_rab_chasti_arr[$count]['h']=900;
			$count++;
			}
			$n_ciklov_6=floor(($h_work_raschetn-$n_ciklov_9*900)/600); // количество колец 600 мм
			for ($i=1;$i<=$n_ciklov_6;$i++){
			$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".6";
			$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
			$kolca_rab_chasti_arr[$count]['h']=600;
			$count++;
			}
			$n_ciklov_3=floor(($h_work_raschetn-$n_ciklov_9*900-$n_ciklov_6*600)/300); // количество колец 300 мм
			for ($i=1;$i<=$n_ciklov_3;$i++){
			$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".3";
			$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
			$kolca_rab_chasti_arr[$count]['h']=300;
			$count++;
			}
		} else { // если кольца 300 не используем
			// определяем кольца рабочей части
			// Цикл выполняющий код n_ciklov раз /////////////////////////////////
			
			$n_ciklov_9=floor($h_work_raschetn/900); // количество колец 900 мм
			if (($h_work_raschetn-$n_ciklov_9*900)==300){
				for ($i=1;$i<=$n_ciklov_9-1;$i++){
				$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".9";
				$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
				$kolca_rab_chasti_arr[$count]['h']=900;
				$count++;
				}
				$n_ciklov_6=2;
				for ($i=1;$i<=$n_ciklov_6;$i++){
				$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".6";
				$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
				$kolca_rab_chasti_arr[$count]['h']=600;
				$count++;
				}
			} else {
				for ($i=1;$i<=$n_ciklov_9;$i++){
				$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".9";
				$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
				$kolca_rab_chasti_arr[$count]['h']=900;
				$count++;
				}
				$n_ciklov_6=floor(($h_work_raschetn-$n_ciklov_9*900)/600); // количество колец 600 мм
				for ($i=1;$i<=$n_ciklov_6;$i++){
				$kolca_rab_chasti_arr[$count]['marka']="КС ".($diameter_user/100).".6";
				$kolca_rab_chasti_arr[$count]['d']=$diameter_user;
				$kolca_rab_chasti_arr[$count]['h']=600;
				$count++;
				}
			}
		}
		
		//определяем высоту горловины
		$h_gorlov=$h_konstruk-$h_luk-10-$h_perekrit-10-$h_work_user-$h_dnisha-80;
		$h_gorlov_raschetn=floor($h_gorlov/300)*300;
		// определяем кольца горловины
		$count=1;
		$n_ciklov_9=floor($h_gorlov_raschetn/900); // количество колец 900 мм
		for ($i=1;$i<=$n_ciklov_9;$i++){
		$h_kolca_gorlov_arr[$count]['marka']="КС 7.9";
		$h_kolca_gorlov_arr[$count]['d']=700;
		$h_kolca_gorlov_arr[$count]['h']=900;
		$count++;
		}
		$n_ciklov_6=floor(($h_gorlov_raschetn-$n_ciklov_9*900)/600); // количество колец 600 мм
		for ($i=1;$i<=$n_ciklov_6;$i++){
		$h_kolca_gorlov_arr[$count]['marka']="КС 7.6";
		$h_kolca_gorlov_arr[$count]['d']=700;
		$h_kolca_gorlov_arr[$count]['h']=600;
		$count++;
		}
		$n_ciklov_3=floor(($h_gorlov_raschetn-$n_ciklov_9*900-$n_ciklov_6*600)/300); // количество колец 300 мм
		for ($i=1;$i<=$n_ciklov_3;$i++){
		$h_kolca_gorlov_arr[$count]['marka']="КС 7.3";
		$h_kolca_gorlov_arr[$count]['d']=700;
		$h_kolca_gorlov_arr[$count]['h']=300;
		$count++;
		}		
		// высота кирп кладки либо бетона
		$h_monolit=$h_gorlov-$h_gorlov_raschetn;
		
		$op_k=1;
		
		////////////////////////// D R A W
		
		$canvas = '';
		
		$canvas .= $this->kolodec_draw->start();
		
		/*
		отметка уровня земли на - 70 точек
		отступ слева 180 точек
		*/
		      
		//$count=0;
		
		unset($kolodec_value);
		if($place_user=="city"){
		  if($h_luk==90){
		      $canvas .= $this->kolodec_draw->drawLukL(0,20);
		      $count=40+10;
		      $kolodec_value['number'][]=90;
		      $kolodec_value['name'][]='Люк Л ГОСТ 3634-89';
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		      $canvas .= $this->kolodec_draw->drawOtmostka(0,0);
		  } 
		  if ($h_luk==120){
		      $canvas .= $this->kolodec_draw->drawLukT(0,50);
		      $count=70+10;
		      $canvas .= $this->kolodec_draw->drawOtmostka(0,0);
		      $kolodec_value['number'][]=120;
		      $kolodec_value['name'][]='Люк Т ГОСТ 3634-89';
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		  }
		} 
		if ($place_user=="car"){
		  if($h_luk==90){
		      $canvas .= $this->kolodec_draw->drawLukL(0,70);
		      $count=90+10;
		      $canvas .= $this->kolodec_draw->drawRoad(0,0);
		      $kolodec_value['number'][]=90;
		      $kolodec_value['name'][]='Люк Л ГОСТ 3634-89';
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		  } 
		  if ($h_luk==120){
		      $canvas .= $this->kolodec_draw->drawLukT(0,100);
		      $count=120+10;
		      $canvas .= $this->kolodec_draw->drawRoad(0,0);
		      $kolodec_value['number'][]=120;
		      $kolodec_value['name'][]='Люк Т ГОСТ 3634-89';
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		  }
		}
		
		if ($op_k){
		  $canvas .= $this->kolodec_draw->drawSquare(0,$count,700,90,130,"#5C5C5C");
		  $count=$count+70+10;
		  $kolodec_value['number'][]=70;
		  $kolodec_value['name'][]='Опорное кольцо КО 6';
		  $kolodec_value['number'][]=10;
		  $kolodec_value['name'][]='Шов (марка раствора - М100)';
		}
		if ($h_monolit>0){
		  if ($h_monolit>00){
		      // рисуем монолит если только его видно
		      $canvas .= $this->kolodec_draw->drawSquare(0,$count,700,$h_monolit,120,"#8E2F2F");
		      $kolodec_value['number'][]=$h_monolit-10;
		      $kolodec_value['name'][]='Кирпичная кладка / монолитный участок';
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		  }
		  $count=$count+$h_monolit;
		}
		if (!empty($h_kolca_gorlov_arr)){
		  foreach (array_reverse($h_kolca_gorlov_arr) as $key=>$value){
		      $canvas .= $this->kolodec_draw->drawSquare(0,$count,$value['d'],$value['h'],70);
		      $kolodec_value['number'][]=$value['h']-10;
		      $kolodec_value['name'][]='Кольцо стеновое КС '.($value['d']/100).'.'.($value['h']/100);
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		      $count=$count+$value['h'];
		      if (empty($h_kolca_gorlov_arr[$key+2]['marka'])){
		          $canvas .= $this->kolodec_draw->drawDimKolco(70,70+$value['d'],$count-$value['h']/2+10);
		      }
		  }
		}
		$floor_dnisha=$count;
		$canvas .= $this->kolodec_draw->drawPerekrit(0,$count,$diameter_user,$h_perekrit+10);
		$kolodec_value['number'][]=$h_perekrit;
		$kolodec_value['name'][]='Плита перекрытия ПП '.($diameter_user/100);
		$kolodec_value['number'][]=10;
		$kolodec_value['name'][]='Шов (марка раствора - М100)';
		$count=$count+$h_perekrit+10;
		
		if (!empty($kolca_rab_chasti_arr)){
		  foreach (array_reverse($kolca_rab_chasti_arr) as $key=>$value){
		      $canvas .= $this->kolodec_draw->drawSquare(0,$count,$value['d'],$value['h'],$t_st);
		      $kolodec_value['number'][]=$value['h']-10;
		      $kolodec_value['name'][]='Кольцо стеновое КС '.($value['d']/100).'.'.($value['h']/100);
		      $kolodec_value['number'][]=10;
		      $kolodec_value['name'][]='Шов (марка раствора - М100)';
		      $count=$count+$value['h'];
		      if (empty($kolca_rab_chasti_arr[$key+2]['marka'])){
		          $canvas .= $this->kolodec_draw->drawDimKolco($t_st,$t_st+$value['d'],$count-$value['h']/2+10);
		      }
		  }
		}
		$canvas .= $this->kolodec_draw->drawDnishe(0,$count,$diameter_user,$h_dnisha);
		$kolodec_value['number'][]=$h_dnisha;
		$kolodec_value['name'][]='Плита днища ПН '.($diameter_user/100);
		$count=$count+$h_dnisha;
		
		$h_canvas=80+$count/10+20;
		
		
		//оформление
		//заголовок
		$canvas .=  '
		context.font = "italic 14pt Calibri";
		context.textAlign="left";
		context.fillStyle="black";
		context.fillText("'.($name_user).'", '.(40).', '.(20).');
		context.fillStyle="black";
		
		';
		//размеры
		$canvas .=  '
		context.beginPath();
		context.moveTo('.(66).', '.(60).');        
		context.lineTo('.(66).', '.($count/10+76).');
		context.stroke();
		
		context.beginPath();
		context.moveTo('.(27).', '.(60).');        
		context.lineTo('.(27).', '.($count/10+76).');
		context.stroke();
		
		context.font = "italic 8pt Calibri";
		context.textAlign="left";
		context.fillStyle="blue";
		context.fillText("'.($h_konstruk).'", '.(0).', '.($h_konstruk/10/2+70).');
		context.fillStyle="black";
		
		';
		// отметки
		$canvas .= $this->kolodec_draw->drawFloorV1(-700,0,"Ур.з.- 0.000");
		$canvas .= $this->kolodec_draw->drawFloorV1(-700,$count,"- ".number_format($count/1000,3));
		if($place_user=="city"){
		  $canvas .= $this->kolodec_draw->drawFloorV1(1540,-50,"+ 0.050");
		} 
		
		$canvas .= $this->kolodec_draw->end($h_canvas); 
		
		if ($floor_dnisha<500){
		  $canvas .= "<br/>Внимание! Выстоа засыпки над перекрытием меньше 0,5 м, что является нарушением п. 14.27 СНиП 2.04.02-84*.";
		}
		$data['canvas'] = $canvas;
		$data['kolodec_value'] = $kolodec_value;
		
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
		
		$this->load->view('calculators/e_kolodec/e_kolodec_result_view', $data);
		
		$this->load->view('templates/footer_view', $data);
		
	} else { // форма не прошла
	
	$this->load->view('templates/header_view', $data);
	
	$this->load->view('templates/main_sidebar_view', $data);
	
	$this->load->view('calculators/e_kolodec/e_kolodec_view', $data);
	
	$this->load->view('templates/footer_view', $data);
	}
}
  


}