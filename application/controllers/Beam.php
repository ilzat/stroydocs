<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beam extends CI_Controller {
  
  function __construct() {
    
		parent::__construct();
    
    $this->load->library('session');
    $this->load->library('beam_draw');
    
    /*
    
    STEP_1
    $this->session->userdata['POST_Step_1']['pointsQty']
    
    STEP_2
    $this->session->userdata('balkaLength') - длина всей балки
    $this->session->userdata['partsLenght'] - массив с длинами участков
    
    
    STEP_3
    $this->session->userdata['mainstayNoMoving']['distance'] - расстояние от начала до узла опоры
    $this->session->userdata['mainstayNoMoving']['joint'] - номер узла опоры
    
    STEP_4
    $this->session->userdata['pointEnergy'] - [$i]   ['value']['distance']['joint']
    $this->session->userdata('eval_PointEnergy_A')
    $this->session->userdata('eval_PointEnergy_B')
    
    STEP_5
    $this->session->userdata['moment'] - [$i]   ['value']['distance']['joint']
    $this->session->userdata('eval_Moment')
    
    STEP_6
    $this->session->userdata['load'] - [$i]     ['value']['joint']['start']['end']
    
    $this->session->userdata['loadToPoint'] - [$i]     ['value']['joint']['distance']
    
    $this->session->userdata('eval_Load_A')
    $this->session->userdata('eval_Load_B')
    
    public $PartsNumber; // количество участков
    public $PartsLenght;  // массив с длинами участков
    public $BalkaLength; // длина всей балки
    public $MainstayMoving;  // номер шарнироно-подвижной опоры
    public $MainstayNoMoving;  // номер шарнирно-неподвижной опоры
    public $PointEnergy; // массив с сосредоточенными силами
    public $Moment; // массив с моментами
    public $Load; // массив с распределенными нагрузками
    public $LoadToPoint; // массив с распределенными нагрузками в виде сосредоточенных
    public $PointEnergyOfLoads;
    
    public $Eval_Moment;
    public $Eval_PointEnergy_A;
    public $Eval_PointEnergy_B;
    public $Eval_Load_A;
    public $Eval_Load_B;
    
    
    */
    
}
public function index() { // reset
    $this->session->sess_destroy();
    $data['window_title'] = "Расчет опорных реакций балки на двух опорах онлайн";
		$data['meta_description'] = "Расчет опорных реакций балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет опорных реакций балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Расчет опорных реакций балки на двух опорах онлайн";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/beam_view', $data);
    
    $this->load->view('templates/footer_view', $data);
}
  
  
	public function step_1() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		$data['window_title'] = "Этап 1. Ввод количества характерных точек";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 1. Ввод количества характерных точек";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_1_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  
  public function step_2() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{    
    if ($_POST) {
        $this->session->set_userdata('POST_Step_1', $_POST);        
        unset($_POST);
        header("Location: /beam/step_2");
    } else {
        if (!$this->session->userdata('POST_Step_1')){
            header("Location: /beam/step_1");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->beam_draw->drawLine();
    $canvas .= $this->beam_draw->drawLine2();
    
    $between=400/($this->session->userdata['POST_Step_1']['pointsQty']-1);
    
    $start=0;
    for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++){
        
        $canvas .= $this->beam_draw->drawDot2($start,0,$i);
        
        $canvas .= $this->beam_draw->drawValueL2($start,$start+$between,0,"L".$i);
        
        $start=$start+$between;
    }
    $canvas .= $this->beam_draw->drawDot2(400,0,$i++);
        
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 2. Ввод длин участков";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 2. Ввод длин участков";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_2_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  
  public function step_3() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{    
    if ($_POST) {
        $this->session->set_userdata('POST_Step_2', $_POST);
        $partsLenght = array();
        $balkaLength='';
        for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++){
          $partsLenght[$i]=$this->session->userdata['POST_Step_2']["partLenght_$i"];
          $balkaLength=$balkaLength+$this->session->userdata['POST_Step_2']["partLenght_$i"];
        } 
        $this->session->set_userdata('partsLenght', $partsLenght);
        $this->session->set_userdata('balkaLength', $balkaLength);
        unset($_POST);
        header("Location: /beam/step_3");
    } else {
        if (!$this->session->userdata('POST_Step_2')){
            header("Location: /beam/step_2");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_3();
    
    
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 3. Задание опор балки";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 3. Задание опор балки";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_3_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  
  private function draw_step_3(){
    
    $canvas = '';
    $canvas .= $this->beam_draw->drawLine();
    $canvas .= $this->beam_draw->drawLine2();
    //////////
    $start=0;
    foreach ($this->session->userdata('partsLenght') as $key=>$value){
      $canvas .= $this->beam_draw->drawDot2($start,0,$key);
      $value2=$value/$this->session->userdata('balkaLength')*400;
      $canvas .= $this->beam_draw->drawValueL($start,$start+$value2,0,$value,"L".$key);
      $start=$start+$value/$this->session->userdata('balkaLength')*400;
    }
    $canvas .= $this->beam_draw->drawDot2(400,0,count($this->session->userdata('partsLenght'))+1);
    
    return $canvas;
  }
  
  public function step_4() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
    if ($_POST) {
        $this->session->set_userdata('POST_Step_3', $_POST);
        $mainstayNoMoving = array();
        $mainstayNoMoving['joint'] = $this->session->userdata['POST_Step_3']["mainstayNoMoving"];
        $distance=0;
        for ($i=1;$i<=$mainstayNoMoving['joint']-1;$i++){
          $distance = $distance+$this->session->userdata['partsLenght'][$i];
        }
        $mainstayNoMoving['distance'] = $distance;
        $this->session->set_userdata('mainstayNoMoving', $mainstayNoMoving);
        
        $mainstayMoving = array();
        $mainstayMoving['joint'] = $this->session->userdata['POST_Step_3']["mainstayMoving"];
        $distance=0;
        for ($i=1;$i<=$mainstayMoving['joint']-1;$i++){
          $distance = $distance+$this->session->userdata['partsLenght'][$i];
        }
        $mainstayMoving['distance'] = $distance;
        $this->session->set_userdata('mainstayMoving', $mainstayMoving);
        
        unset($_POST);
        header("Location: /beam/step_4");
    } else {
        if (!$this->session->userdata('POST_Step_3')){
            header("Location: /beam/step_3");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_4();
    
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 4. Задание сосредоточенных нагрузок";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 4. Задание сосредоточенных нагрузок";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_4_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  
   private function draw_step_4(){
    
    $canvas = '';
    
    $canvas .= $this->draw_step_3();
    
    $dist = $this->session->userdata['mainstayNoMoving']['distance']/$this->session->userdata['balkaLength']*400;    
    $canvas .= $this->beam_draw->drawMainstayNoMoving($dist,0,"A");
    
    $dist = $this->session->userdata['mainstayMoving']['distance']/$this->session->userdata['balkaLength']*400;    
    $canvas .= $this->beam_draw->drawMainstayMoving($dist,0,"B");
    
    return $canvas;
  }
    
    public function step_5() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
    if ($_POST) {
        $this->session->set_userdata('POST_Step_4', $_POST);
        
        $pointEnergy = array();
        for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++){
          if ($this->session->userdata['POST_Step_4']["pointEnergy_$i"]) {
            $pointEnergy[$i] = $this->session->userdata['POST_Step_4']["pointEnergy_$i"];
          }
        }
        
        if ($pointEnergy) {
            $i=1;
            $pointEn = array();
            $Eval_PointEnergy_A = '';
            $Eval_PointEnergy_B = '';
            foreach ($pointEnergy as $key=>$value) {
                $pointEn[$i]['value']=$value;
                $pointEn[$i]['joint']=$key;
                
                $distance=0;
                for ($a=1;$a<=$key-1;$a++){
                    $distance=$distance + $this->session->userdata['partsLenght'][$a];
                }
                $pointEn[$i]['distance'] = $distance;
                
                // строка для уравнения 1
                
                if ((($this->session->userdata['mainstayNoMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value'])>0){
                    $Eval_PointEnergy_A=$Eval_PointEnergy_A."+".(($this->session->userdata['mainstayNoMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value']);
                }
                
                if ((($this->session->userdata['mainstayNoMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value'])<0){
                    $Eval_PointEnergy_A=$Eval_PointEnergy_A.(($this->session->userdata['mainstayNoMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value']);
                }
                
                // строка для уравнения 2
                if ((($this->session->userdata['mainstayMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value'])>0){
                    $Eval_PointEnergy_B=$Eval_PointEnergy_B."+".(($this->session->userdata['mainstayMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value']);
                }
                
                if ((($this->session->userdata['mainstayMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value'])<0){
                    $Eval_PointEnergy_B=$Eval_PointEnergy_B.(($this->session->userdata['mainstayMoving']['distance']-$pointEn[$i]['distance'])*$pointEn[$i]['value']);                
                }
                
                
                $i++;
            }
            $this->session->set_userdata('pointEnergy', $pointEn);
            
            $this->session->set_userdata('eval_PointEnergy_A', $Eval_PointEnergy_A);
            $this->session->set_userdata('eval_PointEnergy_B', $Eval_PointEnergy_B);
        }
        
        
        unset($_POST);
        header("Location: /beam/step_5");
    } else {
        if (!$this->session->userdata('POST_Step_4')){
            header("Location: /beam/step_4");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_5();
    
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 5. Задание изгибающих моментов";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 5. Задание изгибающих моментов";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_5_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  
  private function draw_step_5(){
    
    $canvas = '';
    
    $canvas .= $this->draw_step_4();
    
    if (!empty($this->session->userdata['pointEnergy'])) {
      foreach ($this->session->userdata['pointEnergy'] as $key=>$value) {
        $distance = $value['distance'] / $this->session->userdata('balkaLength') * 400;
        $canvas .= $this->beam_draw->drawOnePointEnergyCursor($distance, 0, $value['value'], "F".$key);
      }
      
    }    
    
    return $canvas;
  }
  
  public function step_6() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
    if ($_POST) {
        $this->session->set_userdata('POST_Step_5', $_POST);
        
        $moment = array();
        for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++){
          if ($this->session->userdata['POST_Step_5']["moment_$i"]) {
            $moment[$i] = $this->session->userdata['POST_Step_5']["moment_$i"];
          }
        }
        
        if ($moment) {
            $i=1;
            $mom = array();
            $Eval_Moment = '';
            foreach ($moment as $key=>$value) {
                $mom[$i]['value']=$value;
                $mom[$i]['joint']=$key;
                
                $distance=0;
                for ($a=1;$a<=$key-1;$a++){
                    $distance=$distance + $this->session->userdata['partsLenght'][$a];
                }
                $mom[$i]['distance'] = $distance;
                
                if ($value > 0){
                $Eval_Moment .= "+".$value;
                }
                if ($value < 0){
                    $Eval_Moment .= $value;
                }
                
                $i++;
            }
            $this->session->set_userdata('eval_Moment', $Eval_Moment);
            $this->session->set_userdata('moment', $mom);
        }
        
        
        unset($_POST);
        header("Location: /beam/step_6");
    } else {
        if (!$this->session->userdata('POST_Step_5')){
            header("Location: /beam/step_5");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_6();
    
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 6. Задание распределенных нагрузок";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 6. Задание распределенных нагрузок";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_6_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  private function draw_step_6(){
    
    $canvas = '';
    
    $canvas .= $this->draw_step_5();
    
    if (!empty($this->session->userdata['moment'])) {
      foreach ($this->session->userdata['moment'] as $key=>$value) {
        $distance = $value['distance'] / $this->session->userdata('balkaLength') * 400;
        $canvas .= $this->beam_draw->drawMoment($distance, 0, $value['value'], "M".$key);
      }      
    } 
    return $canvas;
  }
  
  
  
  public function step_7() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
    if ($_POST) {
        $this->session->set_userdata('POST_Step_6', $_POST);
        
        $load = array();
        for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++){
          if ($this->session->userdata['POST_Step_6']["load_$i"]) {
            $load[$i] = $this->session->userdata['POST_Step_6']["load_$i"];
          }
        }
        if ($load) {
            $i=1;
            $lo = array();
            foreach ($load as $key=>$value) {
                $lo[$i]['value']=$value;
                $lo[$i]['joint']=$key;
                
                $distance = 0;
                for ($a=1;$a<=$key-1;$a++){
                    $distance=$distance + $this->session->userdata['partsLenght'][$a];
                }
                $lo[$i]['start'] = $distance;
                $lo[$i]['end'] = $distance + $this->session->userdata['partsLenght'][$key];
                
                $i++;
            }
            $this->session->set_userdata('load', $lo);
            
            unset($lo);
            
            //$loadToPoint = $load;
            
            
            // переведем распределенные силы в сосредоточенные
            $i=1;
            $Eval_Load_A = '';
            $Eval_Load_B = '';
            foreach ($load as $key=>$value){
                $lo[$i]['value']=$value * $this->session->userdata['partsLenght'][$key];
                $lo[$i]['joint']=$key;
                $summ=0;
                for ($b=1;$b<=$key-1;$b++){
                    $summ = $summ + $this->session->userdata['partsLenght'][$b];
                }
                $lo[$i]['distance'] = $summ + $this->session->userdata['partsLenght'][$key]/2;
                /*
                // строка для уравнения 1
                if ((($this->session->userdata['mainstayNoMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value'])>0){
                    $Eval_Load_A=$Eval_Load_A."+".(($this->session->userdata['mainstayNoMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value']);
                }
                
                if ((($this->session->userdata['mainstayNoMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value'])<0){
                    $Eval_Load_A=$Eval_Load_A.(($this->session->userdata['mainstayNoMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value']);
                }
                
                // строка для уравнения 2
                if ((($this->session->userdata['mainstayMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value'])>0){
                    $Eval_Load_B=$Eval_Load_B."+".(($this->session->userdata['mainstayMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value']);
                }
                
                if ((($this->session->userdata['mainstayMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value'])<0){
                    $Eval_Load_B=$Eval_Load_B.(($this->session->userdata['mainstayMoving']['distance']-$lo[$i]['distance'])*$lo[$i]['value']);
                }*/
                
                $i++; 
            }
            $this->session->set_userdata('eval_Load_A', $Eval_Load_A);
            $this->session->set_userdata('eval_Load_B', $Eval_Load_B);
            
            $this->session->set_userdata('loadToPoint', $lo);
        }
        
        
        
        unset($_POST);
        header("Location: /beam/step_7");
    } else {
        if (!$this->session->userdata('POST_Step_6')){
            header("Location: /beam/step_6");
        }
    }
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_7();
    
    $canvas .= $this->beam_draw->end();    
    
    $data['canvas'] = $canvas;
    
    $data['window_title'] = "Этап 7. Проверка расчетной схемы балки";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 7. Проверка расчетной схемы балки";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_7_view', $data);
    
    $this->load->view('templates/footer_view', $data);
	}
  private function draw_step_7(){
    
    $canvas = '';
    
    $canvas .= $this->draw_step_6();
    
    if (!empty($this->session->userdata['load'])) {
      foreach ($this->session->userdata['load'] as $key=>$value) {
        $start = $value['start'] / $this->session->userdata('balkaLength') * 400;
        $end = $value['end'] / $this->session->userdata('balkaLength') * 400;
        $canvas .= $this->beam_draw->drawLoadCursors($start,$end,0,$value['value'],"q".$key);
      }      
    } 
    return $canvas;
  }
  
  public function step_8() ///////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
    if ($_POST) {
        $this->session->set_userdata('POST_Step_7', $_POST);
        
        
        
        
        unset($_POST);
        header("Location: /beam/step_8");
    } else {
        if (!$this->session->userdata('POST_Step_7')){
            header("Location: /beam/step_7");
        }
    }
    $this->load->library('beam_lib');
    
    $canvas = '';
    
    $canvas .= $this->beam_draw->start();
    
    $canvas .= $this->draw_step_8();
    
    $canvas .= $this->beam_draw->end_2();
      
        
    $solution = $this->beam_lib->getSolution();   
    
    
    $data['canvas'] = $canvas;
    $data['solution'] = $solution;
    
    $data['window_title'] = "Этап 8. Решение";
		$data['meta_description'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['meta_keywords'] = "Расчет балки на двух опорах онлайн. Эпюра моментов";
		$data['doc_title'] = "Этап 8. Решение";
		$data['doc_title_desc'] = "";
		$data['breadcrumb'] = '<li><a href="'.base_url().'#calculators">Калькуляторы</a></li>
		                        <li class="active">Расчет балки</li>';
		
		$this->load->view('templates/header_view', $data);
		
		$this->load->view('templates/main_sidebar_view', $data);
    
    $this->load->view('calculators/beam/step_8_view', $data);
        
    $this->load->view('templates/footer_view', $data);
	}
    
 private function draw_step_8(){
    
    $canvas = '';
    
    $canvas .= $this->draw_step_7();
    

    
    
    
    // отрисовка самой балки
        $canvas .= 'context.beginPath();
            context.moveTo(50, 230);        
            context.lineTo(450, 230);
            context.stroke();
            ';  
        // отрисовка точек
        $start=0;
        foreach ($this->session->userdata['partsLenght'] as $key=>$value){
            $canvas .= $this->beam_draw->drawDot3($start,160,$key);
            $start=$start+$value/$this->session->userdata('balkaLength')*400;
        }
        $canvas .= $this->beam_draw->drawDot3(400,160,count($this->session->userdata['partsLenght'])+1);
        // отрисовка опорных реакций
        $dist=$this->session->userdata['mainstayNoMoving']['distance']/$this->session->userdata('balkaLength')*400;
        $canvas .= $this->beam_draw->drawMainstayNoMoving2($dist,160,"V","A");
        $dist=$this->session->userdata['mainstayMoving']['distance']/$this->session->userdata('balkaLength')*400;
        $canvas .= $this->beam_draw->drawMainstayMoving2($dist,160,"V","B");
        // отрисовка сосредоточенных сил
        if (!empty($this->session->userdata['pointEnergy'])){  
        foreach ($this->session->userdata['pointEnergy'] as $key=>$value){
            $distance=$value['distance']/$this->session->userdata('balkaLength')*400;
            $canvas .= $this->beam_draw->drawOnePointEnergyCursor($distance,160,$value['value'],"F".$key);
        }  
        }
        // отрисовка моментов
        
        if (!empty($this->session->userdata['moment'])){
        foreach ($this->session->userdata['moment'] as $key=>$value){
            $distance=$value['distance']/$this->session->userdata('balkaLength')*400;
            $canvas .= $this->beam_draw->drawMoment($distance,160,$value['value'],"M".$key);
        }
        }
        // отрисовка распределенных сил
        if (!empty($this->session->userdata['loadToPoint'])){
        foreach ($this->session->userdata['loadToPoint'] as $key=>$value){
            $distance=$value['distance']/$this->session->userdata('balkaLength')*400;
            $canvas .= $this->beam_draw->drawOnePointEnergyCursor($distance,160,$value['value'],"Fq".$key);
        }
        }  

    
    return $canvas;
  }
  


}