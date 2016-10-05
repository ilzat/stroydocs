<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Beam_lib {
  

  
public function Beam_lib(){
    $this->ci =& get_instance();
}


    
    public function getSolution(){
      $canvas ='';
      error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
    if ($this->ci->session->userdata['load'] || $this->ci->session->userdata['pointEnergy'] || $this->ci->session->userdata['moment']){
        $canvas .= '<strong><em><p align="center">Решение</p></strong></em>';
        $canvas .= '<p style="font-size: 13px;">';
        
        $ListNumber=1; // счетчик нумерованного списка
        
        
            
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        if ($this->ci->session->userdata['load']){
            //$this->ci->session->userdata['load'] [$i],['value']['joint']['start']['end']
            $canvas .= $ListNumber;
            $ListNumber++;
            $canvas .= '. Заменим распределенную нагрузку равнодействующей:<br/>';
            foreach ($this->ci->session->userdata['load'] as $key=>$value){
                $canvas .= "F<sub>q".$key."</sub> = q<sub>".$key."</sub> * ".($value['end']-$value['start'])." = ".abs($value['value'])." * ".($value['end']-$value['start'])." = ".($value['end']-$value['start'])*abs($value['value'])." кН.<br/>";                
            };
        }
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Обозначим опоры "A" и "B".<br/>';
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Укажем опорные реакции "V<sub>A</sub>" и "V<sub>B</sub>".<br/>';
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Составим уравнения равновесия: <img src="/web/calculators/beam/img/summa.gif"/>M<sub>A</sub> = 0; <img src="/web/calculators/beam/img/summa.gif"/>M<sub>B</sub> = 0.<br/>';
        
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Сумма моментов А
        $canvas .= '<img src="/web/calculators/beam/img/summa.gif"/>M<sub>A</sub> = ';
        
        // вывод распределенных нагрузок
            //$this->ci->session->userdata['loadToPoint']  [$i],['value']['distance']
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayNoMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_loads_A.= ' - ';
                } else {
                    $eval_loads_A.= ' + ';
                }
                $eval_loads_A.= 'F<sub>q'.$key.'</sub> * '.abs($value['distance']-$this->ci->session->userdata['mainstayNoMoving']['distance']);
            }
        }
        
        //вывод сосредоточенных нагрузок
            //$this->ci->session->userdata['pointEnergy']  [$i],['value']['distance']
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayNoMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_point_energy_A.= ' - ';
                } else {
                    $eval_point_energy_A.= ' + ';   
                }
                $eval_point_energy_A.='F<sub>'.$key.'</sub> * '.abs($value['distance']-$this->ci->session->userdata['mainstayNoMoving']['distance']);
            }
        }
        
        //вывод опоры В
        if ($this->ci->session->userdata['mainstayNoMoving']['distance']<$this->ci->session->userdata['mainstayMoving']['distance']){
            $eval_mainstay_A.= ' - ';
        } else {
            $eval_mainstay_A.= ' + ';
        }
        $eval_mainstay_A.='V<sub>B</sub> * '.abs($this->ci->session->userdata['mainstayNoMoving']['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
        
        // вывод моментов
            //$this->ci->session->userdata['moment']   [$i],['value']['distance']
        if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key=>$value){
                if ($value['value']<0){
                    $eval_moments.= ' - ';
                } else {
                    $eval_moments.= ' + ';     
                }
                $eval_moments.='M<sub>'.$key."</sub>";
            }
        }
        $canvas .= $eval_loads_A.$eval_point_energy_A.$eval_mainstay_A.$eval_moments;
        
        $canvas .= ' = 0,<br/>';
        
        $canvas .= 'V<sub>B</sub> = ('.$eval_loads_A.$eval_point_energy_A.$eval_moments.' ) / ';
        
        if ($this->ci->session->userdata['mainstayNoMoving']['distance']<$this->ci->session->userdata['mainstayMoving']['distance']){
            $eval_A_01.= ' + ';
        } else {
            $eval_A_01.= ' - ';
        }
        $eval_A_01.= abs($this->ci->session->userdata['mainstayNoMoving']['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
        $canvas .= $eval_A_01.' = <br/>= ';
        
        unset($eval_loads_A);
        unset($eval_point_energy_A);
        unset($eval_mainstay_A);
        unset($eval_moments);
        
        // вывод распределенных нагрузок в числах
            //$this->ci->session->userdata['loadToPoint']  [$i],['value']['distance']
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayNoMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_loads_A.= ' - ';
                } else {
                    $eval_loads_A.= ' + ';
                }
                $eval_loads_A.= abs($value['value']).' * '.abs($value['distance']-$this->ci->session->userdata['mainstayNoMoving']['distance']);
            }
        }
        
        //вывод сосредоточенных нагрузок в числах
            //$this->ci->session->userdata['pointEnergy']  [$i],['value']['distance']
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayNoMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_point_energy_A.= ' - ';
                } else {
                    $eval_point_energy_A.= ' + ';   
                }
                $eval_point_energy_A.=abs($value['value']).' * '.abs($value['distance']-$this->ci->session->userdata['mainstayNoMoving']['distance']);
            }
        }
        
        // вывод моментов в числах
            //$this->ci->session->userdata['moment']   [$i],['value']['distance']
        if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key=>$value){
                if ($value['value']<0){
                    $eval_moments.= ' - ';
                } else {
                    $eval_moments.= ' + ';     
                }
                $eval_moments.=abs($value['value']);
            }
        }
        
        
        $string_eval_A='('.$eval_loads_A.$eval_point_energy_A.$eval_mainstay_A.$eval_moments.') /'.$eval_A_01;
        $canvas .= $string_eval_A.' = ';
        
        $Vb=number_format(eval('$echo='.$string_eval_A.';return $echo;'),3);
        $canvas .= $Vb." кН.<br>";    
        
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
        
        // Сумма моментов В
        $canvas .= '<img src="/web/calculators/beam/img/summa.gif"/>M<sub>B</sub> = ';
        
        // вывод распределенных нагрузок
            //$this->ci->session->userdata['loadToPoint']  [$i],['value']['distance']
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_loads_B.= ' - ';
                } else {
                    $eval_loads_B.= ' + ';
                }
                $eval_loads_B.= 'F<sub>q'.$key.'</sub> * '.abs($value['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
            }
        }
        
        //вывод сосредоточенных нагрузок
            //$this->ci->session->userdata['pointEnergy']  [$i],['value']['distance']
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_point_energy_B.= ' - ';
                } else {
                    $eval_point_energy_B.= ' + ';   
                }
                $eval_point_energy_B.='F<sub>'.$key.'</sub> * '.abs($value['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
            }
        }
        
        //вывод опоры А
        if ($this->ci->session->userdata['mainstayMoving']['distance']<$this->ci->session->userdata['mainstayNoMoving']['distance']){
            $eval_mainstay_B.= ' - ';
        } else {
            $eval_mainstay_B.= ' + ';
        }
        $eval_mainstay_B.='V<sub>A</sub> * '.abs($this->ci->session->userdata['mainstayNoMoving']['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
        
        // вывод моментов
            //$this->ci->session->userdata['moment']   [$i],['value']['distance']
        unset($eval_moments);
        if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key=>$value){
                if ($value['value']<0){
                    $eval_moments.= ' - ';
                } else {
                    $eval_moments.= ' + ';     
                }
                $eval_moments.='M<sub>'.$key."</sub>";
            }
        }
        $canvas .= $eval_loads_B.$eval_point_energy_B.$eval_mainstay_B.$eval_moments;
        
        $canvas .= ' = 0,<br/>';
        
        $canvas .= 'V<sub>A</sub> = ( '.$eval_loads_B.$eval_point_energy_B.$eval_moments.' ) / ';
        
        if ($this->ci->session->userdata['mainstayNoMoving']['distance']>$this->ci->session->userdata['mainstayMoving']['distance']){
            $eval_B_01.= ' + ';
        } else {
            $eval_B_01.= ' - ';
        }
        $eval_B_01.= abs($this->ci->session->userdata['mainstayNoMoving']['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
        $canvas .= $eval_B_01.' = <br/>= ';
        
        unset($eval_loads_B);
        unset($eval_point_energy_B);
        unset($eval_mainstay_B);
        unset($eval_moments);
        
        // вывод распределенных нагрузок в числах
            //$this->ci->session->userdata['loadToPoint']  [$i],['value']['distance']
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_loads_B.= ' - ';
                } else {
                    $eval_loads_B.= ' + ';
                }
                $eval_loads_B.= abs($value['value']).' * '.abs($value['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
            }
        }
        
        //вывод сосредоточенных нагрузок в числах
            //$this->ci->session->userdata['pointEnergy']  [$i],['value']['distance']
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if (($this->ci->session->userdata['mainstayMoving']['distance']-$value['distance'])*$value['value']<0){
                    $eval_point_energy_B.= ' - ';
                } else {
                    $eval_point_energy_B.= ' + ';   
                }
                $eval_point_energy_B.=abs($value['value']).' * '.abs($value['distance']-$this->ci->session->userdata['mainstayMoving']['distance']);
            }
        }
        
        // вывод моментов в числах
            //$this->ci->session->userdata['moment']   [$i],['value']['distance']
        if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key=>$value){
                if ($value['value']<0){
                    $eval_moments.= ' - ';
                } else {
                    $eval_moments.= ' + ';     
                }
                $eval_moments.=abs($value['value']);
            }
        }
        
        
        $string_eval_B='('.$eval_loads_B.$eval_point_energy_B.$eval_mainstay_B.$eval_moments.') /'.$eval_B_01;
        $canvas .= $string_eval_B.' = ';
        
        $Va=number_format(eval('$echo='.$string_eval_B.';return $echo;'),3);
        $canvas .= $Va." кн.<br>";  
        
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Выполним проверку, используя уравнение <img src="/web/calculators/beam/img/summa.gif"/>Y = 0: <br/>';
        $canvas .= '<img src="/web/calculators/beam/img/summa.gif"/>Y = V<sub>A</sub> + V<sub>B</sub> ';
        
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if ($value['value']<0){
                    $y_loads.= ' - ';
                } else {
                    $y_loads.= ' + ';
                }
                $y_loads.= 'F<sub>q'.$key.'</sub>';
            }
        }
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if ($value['value']<0){
                    $y_point_energy.= ' - ';
                } else {
                    $y_point_energy.= ' + ';   
                }
                $y_point_energy.='F<sub>'.$key.'</sub>';
            }
        }
        $canvas .= $y_loads.$y_point_energy.' = 0<br/>';
        
        
        unset($y_loads);
        unset($y_point_energy);
        
        if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if ($value['value']<0){
                    $y_loads.= ' - ';
                } else {
                    $y_loads.= ' + ';
                }
                $y_loads.=abs($value['value']);
            }
        }
        if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if ($value['value']<0){
                    $y_point_energy.= ' - ';
                } else {
                    $y_point_energy.= ' + ';   
                }
                $y_point_energy.=abs($value['value']);
            }
        }
        
        $canvas .= '<img src="/web/calculators/beam/img/summa.gif"/>Y = ';
        if ($Va<0){
            $y_v.=" - ".abs($Va);
        } else {
            $y_v.=" + ".abs($Va);
        }
        if ($Vb<0){
            $y_v.=" - ".abs($Vb);
        } else {
            $y_v.=" + ".abs($Vb);
        }        
        $eval_y=$y_v.$y_loads.$y_point_energy;
        $canvas .= $eval_y.' = ';
        $canvas .=  number_format(eval('$echo='.$eval_y.';return $echo;'),2);
        $canvas .= "<br/>";
        
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        // ОТВЕТ
        $canvas .= '<strong>Ответ: </strong> V<sub>A</sub> = '.$Va.' кН; V<sub>B</sub> = '.$Vb.' кН.<br/><br/>';
        
        //brbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbrbr
        
        $points_value=($this->ci->session->userdata['POST_Step_1']['pointsQty']-1)+1; // количество узлов
        
        // $all_energy // массив [Индекс - номер точки][Название силы][дистанция][Велечина][узел]
        
        for ($i=1;$i<=$points_value;$i++){
            if ($this->ci->session->userdata['mainstayNoMoving']['joint']==$i){
                $all_energy[$i]['V<sub>A</sub>']['distance']=$this->ci->session->userdata['mainstayNoMoving']['distance']; 
                $all_energy[$i]['V<sub>A</sub>']['value']=$Va;
                $all_energy[$i]['V<sub>A</sub>']['joint']=$i;
                if ($Va<0){
                    $all_energy[$i]['V<sub>A</sub>']['znak']='-';
                }else{
                    $all_energy[$i]['V<sub>A</sub>']['znak']='+';
                }
                
                $all_energy[$i]['V<sub>A</sub>']['type']='Va';
            }
            if ($this->ci->session->userdata['mainstayMoving']['joint']==$i){
                $all_energy[$i]['V<sub>B</sub>']['distance']=$this->ci->session->userdata['mainstayMoving']['distance']; 
                $all_energy[$i]['V<sub>B</sub>']['value']=$Vb; 
                $all_energy[$i]['V<sub>B</sub>']['joint']=$i;
                if ($Vb<0){
                    $all_energy[$i]['V<sub>B</sub>']['znak']='-';
                } else {
                    $all_energy[$i]['V<sub>B</sub>']['znak']='+';
                }
                $all_energy[$i]['V<sub>B</sub>']['type']='Vb';
            }
            if ($this->ci->session->userdata['pointEnergy']){
            foreach ($this->ci->session->userdata['pointEnergy'] as $key=>$value){
                if ($value['joint']==$i){
                    $all_energy[$i]['F<sub>'.$key.'</sub>']['distance']=$value['distance'];
                    $all_energy[$i]['F<sub>'.$key.'</sub>']['value']=$value['value'];
                    $all_energy[$i]['F<sub>'.$key.'</sub>']['joint']=$i;
                    $all_energy[$i]['F<sub>'.$key.'</sub>']['type']='F';
                    if ($value['value']<0){
                        $all_energy[$i]['F<sub>'.$key.'</sub>']['znak']='-';
                    } else {
                        $all_energy[$i]['F<sub>'.$key.'</sub>']['znak']='+';
                    }
                }
            }
            }
            if ($this->ci->session->userdata['loadToPoint']){
            foreach ($this->ci->session->userdata['loadToPoint'] as $key=>$value){
                if ($value['joint']==$i){
                    $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['distance']=$value['distance'];
                    $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['value']=$value['value'];
                    $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['joint']=$i;
                    $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['type']='Fq';
                    if ($value['value']<0){
                        $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['znak']='-';
                    } else {
                        $all_energy['q'.$i]['Fq<sub>'.$key.'</sub>']['znak']='+';
                    }
                }
            }
            }
            if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key=>$value){
                if ($value['joint']==$i){
                    $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['distance']=$value['distance'];
                    $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['value']=$value['value'];
                    $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['joint']=$i;
                    $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['type']='M';
                    if ($value['value']<0){
                        $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['znak']='-';
                    } else {
                        $all_energy['M'.$i]['M<sub>'.$key.'</sub>']['znak']='+';
                    }
                }
            }
            }
            
            $points[$i]['distance']=0; // дистанция до текущей точки
            for ($i5=1;$i5<=$i-1;$i5++){
                $points[$i]['distance']=$points[$i]['distance']+$this->ci->session->userdata['partsLenght'][$i5];
            }
        }
        //QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Стром эпюру Q<sub>x</sub>. Определеим значения поперечных сил в характерных сечениях:<br/>';
        
        
        for ($i=1;$i<=$points_value;$i++){
            $sosred=false;
            foreach ($all_energy as $key0=>$value0){                
                if ($key0==$i){
                    $sosred=true;                
                }                
            }
            
            if ($sosred==true){  // если на точке есть сосредоточенные силы 
                
            $canvas .= 'Q<sub>'.$i.'</sub> <sup>лев</sup> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<$points[$i]['distance']){ // если сила левее текущей точки, то                    
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_Q.=' - '.abs($value2['value']);
                        } else {
                            $eval_Q.=' + '.abs($value2['value']);
                        }                        
                        $left=1;
                    }
                    }          
                }                                
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_q[]=0; $diagram_x_q[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_Q.' = ';
                
                $eval=number_format(eval('$echo='.$eval_Q.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_q[]=0;
                    $diagram_x_q[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_q[]=$eval;
                    $diagram_x_q[]=$points[$i]['distance'];
                }
                unset ($eval_Q);
            }
            unset($left);
            $canvas .= '<br/>';
            
            $canvas .= 'Q<sub>'.$i.'</sub> <sup>прав</sup> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<=$points[$i]['distance']){ // если сила левее текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_Q.=' - '.abs($value2['value']);
                        } else {
                            $eval_Q.=' + '.abs($value2['value']);
                        }
                        $left=1;
                    }
                    } 
                }    
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_q[]=0; $diagram_x_q[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_Q.' = ';
                
                $eval=number_format(eval('$echo='.$eval_Q.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_q[]=0;
                    $diagram_x_q[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_q[]=$eval;
                    $diagram_x_q[]=$points[$i]['distance'];
                }
                unset ($eval_Q);
            }
            unset($left);
            $canvas .= '<br/>';
            
            } else { // если на точке нет сосредоточенной силы, то
            
            $canvas .= 'Q<sub>'.$i.'</sub> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<$points[$i]['distance']){ // если сила левее текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_Q.=' - '.abs($value2['value']);
                        } else {
                            $eval_Q.=' + '.abs($value2['value']);
                        }
                        $left=1;
                    }                     
                    }
                }                  
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_q[]=0; $diagram_x_q[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_Q.' = ';
                
                $eval=number_format(eval('$echo='.$eval_Q.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_q[]=0;
                    $diagram_x_q[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_q[]=$eval;
                    $diagram_x_q[]=$points[$i]['distance'];
                }
                unset ($eval_Q);
            }
            unset($left);
            $canvas .= '<br/>';
            
            }
        }
        // считаем точки x0
        $count=0;
        foreach ($diagram_x_q as $key=>$value){
            if ($diagram_x_q[$key+1]){
            if ($diagram_y_q[$key]*$diagram_y_q[$key+1]<0 && $diagram_x_q[$key]!=$diagram_x_q[$key+1]){
                
                $x0_from_point[]=($diagram_x_q[$key+1]-$diagram_x_q[$key])*abs($diagram_y_q[$key])/(abs($diagram_y_q[$key])+abs($diagram_y_q[$key+1])); // x0 от ближайшей левой характерной точки
                $x0_from_0[]=($diagram_x_q[$key+1]-$diagram_x_q[$key])*abs($diagram_y_q[$key])/(abs($diagram_y_q[$key])+abs($diagram_y_q[$key+1]))+$diagram_x_q[$key]; // x0 от начала балки
                
                
                $canvas .= 'Эпюра Q<sub>x</sub> пересекает нулевую линию, определим расстояние от точки '.$key.' до точки пересечения нулевой линии:<br/>';
                
                $canvas .= 'x<sub>'.$count.'</sub> = '.($diagram_x_q[$key+1]-$diagram_x_q[$key]).' * '.abs($diagram_y_q[$key]).' / ( '.abs($diagram_y_q[$key]).' + '.abs($diagram_y_q[$key+1]).' ) = '.number_format((($diagram_x_q[$key+1]-$diagram_x_q[$key])*abs($diagram_y_q[$key])/(abs($diagram_y_q[$key])+abs($diagram_y_q[$key+1]))),2).' м.<br/>';              
                $count++;
            }
        }
        }
        
        // MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
        $canvas .= '<br/>';
        $canvas .= $ListNumber;
        $ListNumber++;
        $canvas .= '. Стром эпюру M<sub>x</sub>. Определеим изгибающие моменты в характерных точках:<br/>';
        
        for ($i=1;$i<=$points_value;$i++){
            
            
            $moment=false;
            if ($this->ci->session->userdata['moment']){
            foreach ($this->ci->session->userdata['moment'] as $key0=>$value0){                
                if ($value0['joint']==$i){
                    $moment=true;                
                }                
            }
            }
            if ($moment==true){  // если на точке есть моменты
            
                
            $canvas .= 'M<sub>'.$i.'</sub> <sup>лев</sup> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<$points[$i]['distance']){ // если сила левее текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2.' * '.($points[$i]['distance']-$value2['distance']);
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        }
                        $left=1;
                    }                     
                    }  else {  // если на точке есть момент
                    if ($value2['distance']<$points[$i]['distance']){ // если момент левее или на текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']);
                        }
                        $left=1;
                    } 
                    }  
                }               
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_m[]=0;$diagram_y_m_on_point[]=0; $diagram_x_m[]=$points[$i]['distance'];$diagram_x_m_on_point[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_M.' = ';
                
                $eval=number_format(eval('$echo='.$eval_M.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_m[]=0;
                    $diagram_y_m_on_point[]=0;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_m[]=$eval;
                    $diagram_y_m_on_point[]=$eval;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                }
                
                unset ($eval_M);
            }
            unset($left);
            $canvas .= '<br/>';
            
            $canvas .= 'M<sub>'.$i.'</sub> <sup>прав</sup> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<$points[$i]['distance']){ // если сила левее текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2.' * '.($points[$i]['distance']-$value2['distance']);
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        }
                        $left=1;
                    }                     
                    }  else {  // если на точке есть момент
                    if ($value2['distance']<=$points[$i]['distance']){ // если момент левее или на текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']);
                        }
                        $left=1;
                    } 
                    }
                }               
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_m[]=0;$diagram_y_m_on_point[]=0; $diagram_x_m[]=$points[$i]['distance'];$diagram_x_m_on_point[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_M.' = ';
                
                $eval=number_format(eval('$echo='.$eval_M.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_m[]=0;
                    $diagram_y_m_on_point[]=0;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_m[]=$eval;
                    $diagram_y_m_on_point[]=$eval;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                }
                
                unset ($eval_M);
            }
            unset($left);
            $canvas .= '<br/>';
            
            } else { // если на точке нет моментов, то
            
            $canvas .= 'M<sub>'.$i.'</sub> = ';
            foreach ($all_energy as $key=>$value){
                
                foreach ($value as $key2=>$value2){
                    if ($value2['type']!='M'){
                    if ($value2['distance']<$points[$i]['distance']){ // если сила левее текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2.' * '.($points[$i]['distance']-$value2['distance']);
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']).' * '.($points[$i]['distance']-$value2['distance']);
                        }
                        $left=1;
                    }                     
                    }  else {  // если на точке есть момент
                    if ($value2['distance']<$points[$i]['distance']){ // если момент левее или на текущей точки, то
                        $canvas .= ' '.$value2['znak'].' '.$key2;
                        
                        if ($value2['value']<0){
                            $eval_M.=' - '.abs($value2['value']);
                        } else {
                            $eval_M.=' + '.abs($value2['value']);
                        }
                        $left=1;
                    } 
                    } 
                }               
            }
            
            if ($left!=1){ $canvas .= '0'; $diagram_y_m[]=0;$diagram_y_m_on_point[]=0; $diagram_x_m[]=$points[$i]['distance'];$diagram_x_m_on_point[]=$points[$i]['distance']; } else { // выводим в цифрах:
                $canvas .= ' = '.$eval_M.' = ';
                
                $eval=number_format(eval('$echo='.$eval_M.';return $echo;'),3);
                if (abs($eval)<0.05){
                    $canvas .= '0';
                    $diagram_y_m[]=0;
                    $diagram_y_m_on_point[]=0;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                } else {
                    $canvas .= $eval;
                    $diagram_y_m[]=$eval;
                    $diagram_y_m_on_point[]=$eval;
                    $diagram_x_m[]=$points[$i]['distance'];
                    $diagram_x_m_on_point[]=$points[$i]['distance'];
                }
                
                unset ($eval_M);
            }
            unset($left);
            $canvas .= '<br/>';
            
            }
        
        //если следующий участок с распределенной нагрузкой://////////////
        
            foreach ($all_energy as $key5=>$value5){
                foreach ($value5 as $key6=>$value6){
                    
                
                
                if ($value6['type']=='Fq' && $value6['joint']==$i){
                    // рисуем кривую
                    $between=($points[$i+1]['distance']-$points[$i]['distance'])/50; // разделим на 10 равных частей
                
                $x=$points[$i]['distance'];
                
                
                
                
                for ($i7=1;$i7<=49;$i7++){ 
                    $x=$x+$between;
                    $diagram_x_m[]=$x;
                    
                    ///////////////////////////////////////////// y в каждой точке
                    
                    foreach ($all_energy as $key7=>$value7){
                
                foreach ($value7 as $key8=>$value8){
                    if ($points[$value8['joint']]['distance']<$x){ // если сила левее текущей точки, то
                    if ($value8['type']=='F' || $value8['type']=='Va' || $value8['type']=='Vb'){
                    
                        if ($value8['value']<0){
                            $eval_M.=' - '.abs($value8['value']).' * '.($x-$points[$value8['joint']]['distance']);
                        } else {
                            $eval_M.=' + '.abs($value8['value']).' * '.($x-$points[$value8['joint']]['distance']);
                        }
                     
                    }
                    
                    if ($value8['type']=='M'){
                    
                    
                    
                        if ($value8['value']<0){
                            $eval_M.=' - '.abs($value8['value']);
                        } else {
                            $eval_M.=' + '.abs($value8['value']);
                        }
                        
                    }
                    
                    // добавим от распределенных сил:
                    if ($value8['type']=='Fq'){
                       
                    if ($value8['joint']<$i){ // если сила левее ближайшей левой точки, то
                        
                        if ($value8['value']<0){
                            $eval_M.=' - '.abs($value8['value']).' * '.($x-$value8['distance']);
                        } else {
                            $eval_M.=' + '.abs($value8['value']).' * '.($x-$value8['distance']);
                        }
                        
                    } 
                    
                    if ($value8['joint']==$i){
                    
                    $q_thhis_part=$value8['value']/$this->ci->session->userdata['partsLenght'][$i];
                        if ($value8['value']<0){
                            $eval_M.=' - '.abs($q_thhis_part).' * '.($x-$points[$value8['joint']]['distance']).' * '.($x-$points[$value8['joint']]['distance'])/2;
                        } else {
                            $eval_M.=' + '.abs($q_thhis_part).' * '.($x-$points[$value8['joint']]['distance']).' * '.($x-$points[$value8['joint']]['distance'])/2;
                        }
                        //$canvas .= '$ '.$value8['joint'].' = '.$i.' $<br>';
                    }
                    }
                    
                    
                }
                }            
            }
            
            //$canvas .= '<br>';
            //$canvas .= '@ '.$eval_M.' @<br>';
            ///////////////////////////////////////////// y в каждой точке
            $eval=number_format(eval('$echo='.$eval_M.';return $echo;'),3);
            $diagram_y_m[]=$eval;
            unset ($eval_M);
                }
                }
                }   
            }         
        }
        // считаем для x0
        if ($x0_from_0){
        foreach ($x0_from_0 as $key0=>$x)  { 
            
            for ($i01=1;$i01<=count($points);$i01++){
                if ($points[$i01]['distance']>$x){
                    $i=$i01-1;
                    break;
                }
            }
        
        foreach ($all_energy as $key=>$value1){
                
                foreach ($value1 as $key1=>$value1){
                    if ($points[$value1['joint']]['distance']<$x){ // если сила левее текущей точки, то
                    if ($value1['type']=='F' || $value1['type']=='Va' || $value1['type']=='Vb'){
                    
                        if ($value1['value']<0){
                            $eval_x0_M.=' - '.abs($value1['value']).' * '.number_format(($x-$points[$value1['joint']]['distance']),2);
                        } else {
                            $eval_x0_M.=' + '.abs($value1['value']).' * '.number_format(($x-$points[$value1['joint']]['distance']),2);
                        }
                     
                    }
                    
                    if ($value1['type']=='M'){
                    
                    
                    
                        if ($value1['value']<0){
                            $eval_x0_M.=' - '.abs($value1['value']);
                        } else {
                            $eval_x0_M.=' + '.abs($value1['value']);
                        }
                        
                    }
                    
                    // добавим от распределенных сил:
                    
                    if ($value1['type']=='Fq'){
                        
                    if ($value1['joint']<$i){ // если сила левее ближайшей левой точки, то
                        
                        if ($value1['value']<0){
                            $eval_x0_M.=' - '.abs($value1['value']).' * '.number_format(($x-$value1['distance']),2);
                        } else {
                            $eval_x0_M=' + '.abs($value1['value']).' * '.number_format(($x-$value1['distance']),2);
                        }
                        
                    } 
                    
                    if ($value1['joint']==$i){
                    
                    $q_thhis_part=$value1['value']/$this->ci->session->userdata['partsLenght'][$i];
                        if ($value1['value']<0){
                            $eval_x0_M.=' - '.abs($q_thhis_part).' * '.number_format(($x-$points[$value1['joint']]['distance']),2).' * '.number_format(($x-$points[$value1['joint']]['distance'])/2,2);
                        } else {
                            $eval_x0_M.=' + '.abs($q_thhis_part).' * '.number_format(($x-$points[$value1['joint']]['distance']),2).' * '.number_format(($x-$points[$value1['joint']]['distance'])/2,2);
                        }
                        
                    }
                    }
                   
                }
                }            
            }
            $eval=number_format(eval('$echo='.$eval_x0_M.';return $echo;'),3);
            $y0_from_0_text[]=$eval_x0_M;
            $y0_from_0[]=$eval;
            unset ($eval_x0_M);
            }
            } 
            if ($x0_from_0){
                foreach ($x0_from_0 as $key=>$value){
                    $canvas .= 'M<sub>x'.$key.'</sub> = '.$y0_from_0_text[$key].' = '.number_format($y0_from_0[$key],2).' кН*м<br/>';
                }
            }
            
            $y_m_max=0;
            foreach ($diagram_y_m as $value){
                if (abs($value)>$y_m_max){
                    $y_m_max=abs($value);
                }            
            }
            if ($y0_from_0){
            foreach ($y0_from_0 as $value){
                if (abs($value)>$y_m_max){
                    $y_m_max=abs($value);
                }
            }
            }
            $canvas .= 'Таким образом, M<sub> max</sub> = '.number_format($y_m_max,2).' кН*м.<br/>';
            //print_r($B->LoadToPoint);
        
        ////////////////////////////////////////////   Графики Start //////////////////////////////////////////////
        
        $canvas .= '<script>
        var canvas2 = document.getElementById("myCanvas2");
        if (canvas2.getContext){
        var context = canvas2.getContext("2d");';
        
        //////// QQQQQQQ
        $canvas .= '
            context.beginPath();
            context.moveTo(50, 85);
            ';
        $diagram_y_q_max=0;
        foreach ($diagram_y_q as $value){
            if (abs($value)>$diagram_y_q_max){
                $diagram_y_q_max=abs($value);
            }            
        } 
        if ($diagram_y_q_max==0){
            $diagram_y_q_max=1;
        }  
        for ($i=1;$i<=count($diagram_x_q);$i++){
            
            $x=$diagram_x_q[$i-1]/$this->ci->session->userdata['balkaLength']*400+50;
            // масштаб для y max=70px            
            $y=85-$diagram_y_q[$i-1]/$diagram_y_q_max*70;
            $canvas .= 'context.lineTo('.$x.','.$y.');';
        }
        $canvas .= '
        context.closePath(); // замыкает путь
        context.fillStyle = "rgb(161, 208, 255)"; //цвет заливки
        context.fill();
        context.stroke();
        context.fillStyle="black";
            ';
            
        for ($i=1;$i<=count($diagram_x_q);$i++){
            $x=$diagram_x_q[$i-1]/$this->ci->session->userdata['balkaLength']*400+50;
            // масштаб для y max=70px            
            $y=85-$diagram_y_q[$i-1]/$diagram_y_q_max*70;
            $canvas .= '
            context.font = "italic 8pt Calibri";
            context.textAlign="center";
            context.fillStyle="blue";';
            if ($diagram_y_q[$i-1]>0){
                $canvas .= 'context.fillText("'.number_format($diagram_y_q[$i-1],1).'", '.($x-15).', '.($y-4).');';
            } else {
                $canvas .= 'context.fillText("'.number_format($diagram_y_q[$i-1],1).'", '.($x-15).', '.($y+11).');';
            }
            
            $canvas .= '
            context.fillStyle="black";
            ';
            $canvas .= '
            context.beginPath();
            context.fillStyle = "rgb(0, 0, 0)";
            context.arc('.$x.', '.($y).', 1.5, 0, 360);
            context.fill();
            context.stroke();
            ';
        }
        // отрисовка точек
        $start=0;
        foreach ($this->ci->session->userdata['partsLenght'] as $key=>$value){
            $canvas .= $this->ci->beam_draw->drawDot($start,15);
            $start=$start+$value/$this->ci->session->userdata['balkaLength']*400;
        }
        $canvas .= $this->ci->beam_draw->drawDot (400,15);
        
        $canvas .= '
            context.beginPath();
            context.moveTo(50, 85);        
            context.lineTo(450, 85);
            context.stroke();
            ';
            
        $canvas .= '} </script>';
        /////////MMMMMMMMMM
        $canvas .= '<script>
        var canvas3 = document.getElementById("myCanvas3");
        if (canvas3.getContext){
        var context = canvas3.getContext("2d");';
        $canvas .= '
            context.beginPath();
            context.moveTo(50, 110);        
            context.lineTo(450, 110);
            context.stroke();
            ';
        
        $canvas .= '
            context.beginPath();
            context.moveTo(50, 110);
            ';
        $diagram_y_m_max=0;
        foreach ($diagram_y_m as $value){
            if (abs($value)>$diagram_y_m_max){
                $diagram_y_m_max=abs($value);
            }            
        } 
        if ($diagram_y_m_max==0){
            $diagram_y_m_max=1;
        }  
        for ($i=1;$i<=count($diagram_x_m);$i++){
            $x=$diagram_x_m[$i-1]/$this->ci->session->userdata['balkaLength']*400+50;
            
            // масштаб для y max=90px            
            $y=110+$diagram_y_m[$i-1]/$diagram_y_m_max*90;
            $canvas .= 'context.lineTo('.$x.','.$y.');';
           
        }
        $canvas .= '
        context.closePath(); // замыкает путь
        context.fillStyle = "rgb(161, 208, 255)"; //цвет заливки
        context.fill();
        context.stroke();
        context.fillStyle="black";
            ';
        
        
            
        for ($i=1;$i<=count($diagram_x_m_on_point);$i++){
            $x=$diagram_x_m_on_point[$i-1]/$this->ci->session->userdata['balkaLength']*400+50;
            
            // масштаб для y max=90px            
            $y=110+$diagram_y_m_on_point[$i-1]/$diagram_y_m_max*90;
            $canvas .= '
            context.font = "italic 8pt Calibri";
            context.textAlign="center";
            context.fillStyle="blue";';
            if ($diagram_y_m_on_point[$i-1]<0){
                $canvas .= 'context.fillText("'.number_format($diagram_y_m_on_point[$i-1],1).'", '.($x-15).', '.($y-4).');';
            } else {
                $canvas .= 'context.fillText("'.number_format($diagram_y_m_on_point[$i-1],1).'", '.($x-15).', '.($y+11).');';
            }
            
            $canvas .= '
            context.fillStyle="black";
            ';
            $canvas .= '
            context.beginPath();
            context.fillStyle = "rgb(0, 0, 0)";
            context.arc('.$x.', '.($y).', 1.5, 0, 360);
            context.fill();
            context.stroke();
            ';
        }
        
        
            
        // отрисовка точек
        $start=0;
        foreach ($this->ci->session->userdata['partsLenght'] as $key=>$value){
            $canvas .= $this->ci->beam_draw->drawDot($start,40);
            $start=$start+$value/$this->ci->session->userdata['balkaLength']*400;
        }
        $canvas .= $this->ci->beam_draw->drawDot (400,40);
        
        $canvas .= '
            context.beginPath();
            context.moveTo(50, 110);        
            context.lineTo(450, 110);
            context.stroke();
            ';
        
        
        if ($y0_from_0){
            foreach ($x0_from_0 as $key=>$value){
            //ставим точку экстремума
            $x=50+$x0_from_0[$key]/$this->ci->session->userdata['balkaLength']*400;
            $y=110+$y0_from_0[$key]/$diagram_y_m_max*90;
                $canvas .= '
            context.beginPath();
            context.fillStyle = "rgb(255, 0, 0)";
            context.arc('.($x).', '.($y).', 2, 0, 360);
            context.fill();
            context.strokeStyle = "rgb(255, 0, 0)";
            context.stroke();
            ';
            
            $canvas .= '
            context.font = "italic 8pt Calibri";
            context.textAlign="center";
            context.fillStyle="red";';
            if ($y0_from_0[$key]<0){
                $canvas .= 'context.fillText("'.'M max = '.number_format($y0_from_0[$key],1).'", '.($x-15).', '.($y-13).');';
            } else {
                $canvas .= 'context.fillText("'.'M max = '.number_format($y0_from_0[$key],1).'", '.($x-15).', '.($y+20).');';
            }
            
            $canvas .= '
            context.fillStyle="black";
            ';
            }
        }
        
        $canvas .= '} </script>';
        
        
            
        
        ////////////////////////////////////////////   Графики End //////////////////////////////////////////////
        
        $canvas .= '</p>';

    } else { $canvas .= "<br/><br/><br/>Ошибка, нагрузки не заданы"; }
    
    return @$canvas;
    }


  

	
}
?>