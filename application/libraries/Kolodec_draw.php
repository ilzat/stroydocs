<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kolodec_draw {
  
  
public function Kolodec_draw(){
    $this->ci =& get_instance();
}

public function start(){
    return '
    <script>
    window.onload = function() {
    var canvas = document.getElementById("myCanvas1");
    if (canvas.getContext){
    var context = canvas.getContext("2d");
    ';
}

public function end($h_canvas){
    return '
    } else {
    alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
    }
    }
    </script>
    <canvas id="myCanvas1" width="500" height="'.$h_canvas.'"></canvas>
    ';
}




///////////////////////////////////////

public function DrawLine(){
  return '
  context.beginPath();
  context.moveTo(50, 70);        
  context.lineTo(450, 70);
  context.stroke();
  ';
}
public function DrawLine2(){
  return '
  context.beginPath();
  context.moveTo(42, 130);        
  context.lineTo(458, 130);
  context.stroke();
  ';
}

public function DrawDot($x,$y){
  $x=$x+50;
  $y=$y+70;
  return '
  context.beginPath();
  context.fillStyle = "rgb(0, 0, 0)";
  context.arc('.$x.', '.($y).', 2, 0, 360);
  context.fill();
  context.stroke();
  ';            
}
public function DrawDot2($x,$y,$key){
  $x=$x+50;
  $y=$y+70;
  return '
  context.beginPath();
  context.fillStyle = "rgb(0, 0, 0)";
  context.arc('.$x.', '.($y).', 2, 0, 360);
  context.fill();
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.($y+52).');        
  context.lineTo('.($x).', '.($y+66).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x+5).', '.($y+55).');        
  context.lineTo('.($x-5).', '.($y+65).');
  context.stroke();
  
  //key
  context.font = "italic 8pt Calibri";
  context.textAlign="center";
  context.fillStyle="blue";
  context.fillText("'.$key.'", '.($x-12).', '.($y+10).');
  context.fillStyle="black";
  ';            
}
public function DrawDot3($x,$y,$key){
  $x=$x+50;
  $y=$y+70;
  return '
  context.beginPath();
  context.fillStyle = "rgb(0, 0, 0)";
  context.arc('.$x.', '.($y).', 2, 0, 360);
  context.fill();
  context.stroke();
  
  //key
  context.font = "italic 8pt Calibri";
  context.textAlign="center";
  context.fillStyle="blue";
  context.fillText("'.$key.'", '.($x-12).', '.($y+10).');
  context.fillStyle="black";
  ';            
}
public function DrawValueL($x1,$x2,$y,$value,$name){
  $value=$value." м";
  $x1=$x1+50;
  $x2=$x2+50;
  $y=$y+70;
  return '
  //текст над линией
  context.font = "italic 11pt Calibri";
  context.textAlign="center";
  context.fillText("'.$value.'", '.($x1+($x2-$x1)/2).', '.($y+56).');
  
  //текст под линией
  context.font = "italic 11pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x1+($x2-$x1)/2).', '.($y+74).');
  ';
}
public function DrawValueL2($x1,$x2,$y,$name){
  $x1=$x1+50;
  $x2=$x2+50;
  $y=$y+70;
  return '
  //текст над линией
  context.font = "italic 11pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x1+($x2-$x1)/2).', '.($y+56).');            
  ';
}

public function DrawMainstayNoMoving($x,$y,$name){
  $x=$x+50;
  $y=$y+70;
  return '
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x+19).', '.($y+14).');
  
  // первая точка
  context.beginPath();
  context.fillStyle = "rgb(0, 0, 0)";
  context.arc('.$x.', '.($y).', 2, 0, 360);
  context.fill();
  context.stroke();
  
  // вторая точка
  context.beginPath();
  context.strokeStyle = "rgb(0, 0, 0)";
  context.arc('.($x-5).', '.($y+12).', 2, 0, 360);
  context.stroke();
  
  // третья точка
  context.beginPath();
  context.strokeStyle = "rgb(0, 0, 0)";
  context.arc('.($x+5).', '.($y+12).', 2, 0, 360);
  context.stroke();            
  
  context.beginPath();
  context.moveTo('.$x.', '.($y).');        
  context.lineTo('.($x-4.5).', '.($y+10).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.($y).');        
  context.lineTo('.($x+4.5).', '.($y+10).');
  context.stroke();
  
  // горизонтальное подчеркивание
  context.beginPath();
  context.moveTo('.($x-12).', '.($y+14).');        
  context.lineTo('.($x+12).', '.($y+14).');
  context.stroke();
  
  // штриховка
  context.beginPath();
  context.moveTo('.($x-11).', '.($y+19).');        
  context.lineTo('.($x-7).', '.($y+15).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x-5).', '.($y+19).');        
  context.lineTo('.($x-1).', '.($y+15).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x+1).', '.($y+19).');        
  context.lineTo('.($x+5).', '.($y+15).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x+7).', '.($y+19).');        
  context.lineTo('.($x+11).', '.($y+15).');
  context.stroke();
  ';            
}

public function DrawMainstayMoving($x,$y,$name){
  $x=$x+50;
  $y=$y+70;
  return '
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x+14).', '.($y+14).');
  
  // первая точка
  context.beginPath();
  context.fillStyle = "rgb(0, 0, 0)";
  context.arc('.$x.', '.($y).', 2, 0, 360);
  context.fill();
  context.stroke();
  
  // вторая точка
  context.beginPath();
  context.strokeStyle = "rgb(0, 0, 0)";
  context.arc('.($x).', '.($y+12).', 2, 0, 360);
  context.stroke();
  
  // горизонтальное подчеркивание
  context.beginPath();
  context.moveTo('.($x-7).', '.($y+14).');        
  context.lineTo('.($x+7).', '.($y+14).');
  context.stroke();
  
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.($y).');        
  context.lineTo('.$x.', '.($y+10).');
  context.stroke();
  
  // штриховка
  context.beginPath();
  context.moveTo('.($x-9).', '.($y+19).');        
  context.lineTo('.($x-5).', '.($y+15).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x-3).', '.($y+19).');        
  context.lineTo('.($x+1).', '.($y+15).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.($x+3).', '.($y+19).');        
  context.lineTo('.($x+7).', '.($y+15).');
  context.stroke();
  
  ';
}
public function DrawMainstayNoMoving2($x,$y,$name,$name2){
  $x=$x+50;
  $y=$y+70;
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y+30).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+5).', '.($y+8).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-5).', '.($y+8).');
  context.stroke();
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.$x.', '.($y+45).');
  //название
  context.font = "italic 9pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name2.'", '.($x+8).', '.($y+47).');
  ';           
}

public function DrawMainstayMoving2($x,$y,$name,$name2){
  $x=$x+50;
  $y=$y+70;
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y+30).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+5).', '.($y+8).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-5).', '.($y+8).');
  context.stroke();
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.$x.', '.($y+45).');
  //название
  context.font = "italic 9pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name2.'", '.($x+8).', '.($y+47).');
  ';    
}
public function DrawOnePointEnergyCursor($x,$y,$value,$name){
  $x=$x+50;
  $y=$y+70;
  if ($value<0){
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y-36).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-5).', '.($y-8).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+5).', '.($y-8).');
  context.stroke();
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.$x.', '.($y-46).');
  ';
  }            
  if ($value>0){
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y+30).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+5).', '.($y+8).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-5).', '.($y+8).');
  context.stroke();
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.$x.', '.($y+45).');
  '; 
  }           
  
}
public function DrawOneLoadCursor($x,$y){
  $x=$x+50;
  $y=$y+70;
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y-14).');
  context.strokeStyle = "black";
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-3).', '.($y-5).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+3).', '.($y-5).');
  context.stroke();
  
  ';
}
public function DrawOneLoadCursor2($x,$y){
  $x=$x+50;
  $y=$y+70;
  return '
  // вертикальная линия
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.$x.', '.($y+14).');
  context.strokeStyle = "black";
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x-3).', '.($y+5).');
  context.stroke();
  
  context.beginPath();
  context.moveTo('.$x.', '.$y.');        
  context.lineTo('.($x+3).', '.($y+5).');
  context.stroke();
  
  ';
}

public function DrawLoadCursors($x1,$x2,$y,$value,$name){
  $return = '';
  $x1=$x1+50;
  $x2=$x2+50;
  $y=$y+70;
  $between=10;
  if ($value<0){  
  $return .=  '
  context.beginPath();
  context.moveTo('.$x1.', '.($y-14).');        
  context.lineTo('.$x2.', '.($y-14).');
  context.stroke(); 
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x1+($x2-$x1)/2).', '.($y-25).');           
  ';
  
  $n=floor(($x2-$x1)/$between);
  $between=($x2-$x1)/$n; // распределяем чтоб промежуток был одинаков
  
  $x_start=$x1-50;
  for ($i=1;$i<=$n;$i++){
      $return .= $this->DrawOneLoadCursor($x_start,0);
      $x_start=$x_start+$between;
  }
  $return .= $this->DrawOneLoadCursor(($x2-50),0);
  }
  if ($value>0){  
  $return .=  '
  context.beginPath();
  context.moveTo('.$x1.', '.($y+14).');        
  context.lineTo('.$x2.', '.($y+14).');
  context.stroke(); 
  
  //название
  context.font = "italic 12pt Calibri";
  context.textAlign="center";
  context.fillText("'.$name.'", '.($x1+($x2-$x1)/2).', '.($y+28).');           
  ';
  
  $n=floor(($x2-$x1)/$between);
  $between=($x2-$x1)/$n; // распределяем чтоб промежуток был одинаков
  
  $x_start=$x1-50;
  for ($i=1;$i<=$n;$i++){
      $return .= $this->DrawOneLoadCursor2($x_start,0);
      $x_start=$x_start+$between;
  }
  $return .= $this->DrawOneLoadCursor2(($x2-50),0);
  }
  return $return;
}
public function DrawMoment($x,$y,$value,$name){
  $x=$x+50;
  $y=$y+70;
  if ($value>0){
      return '
      context.beginPath();
      context.moveTo('.$x.', '.$y.');        
      context.lineTo('.($x-12).', '.($y-24).');
      context.stroke();
      
      context.beginPath();
      context.arc('.$x.', '.$y.', 27, 1.35*Math.PI, 1.65*Math.PI, false);
      context.stroke();
      
      // стрелочка
      context.beginPath();
      context.moveTo('.($x+12).', '.($y-24).');        
      context.lineTo('.($x+8).', '.($y-30).');
      context.stroke();
      
      context.beginPath();
      context.moveTo('.($x+12).', '.($y-24).');        
      context.lineTo('.($x+6).', '.($y-22).');
      context.stroke();
      
      //название
      context.font = "italic 12pt Calibri";
      context.textAlign="center";
      context.fillText("'.$name.'", '.($x).', '.($y-32).');  
      ';
  }
  if ($value<0){
      return '
      context.beginPath();
      context.moveTo('.$x.', '.$y.');        
      context.lineTo('.($x+12).', '.($y-24).');
      context.stroke();
      
      context.beginPath();
      context.arc('.$x.', '.$y.', 27, 1.35*Math.PI, 1.65*Math.PI, false);
      context.stroke();
      
      // стрелочка
      context.beginPath();
      context.moveTo('.($x-12).', '.($y-24).');        
      context.lineTo('.($x-8).', '.($y-30).');
      context.stroke();
      
      context.beginPath();
      context.moveTo('.($x-12).', '.($y-24).');        
      context.lineTo('.($x-6).', '.($y-22).');
      context.stroke();
      
      //название
      context.font = "italic 12pt Calibri";
      context.textAlign="center";
      context.fillText("'.$name.'", '.($x).', '.($y-32).');  
      ';
  }
  
}

public function drawFloorV1($margin_left,$margon_top,$text){
    $margin_left=$margin_left/10+180;
    $margon_top=$margon_top/10+70;
    return '
    context.beginPath();
    context.moveTo('.($margin_left).', '.($margon_top).');        
    context.lineTo('.($margin_left+20).', '.($margon_top).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+10).', '.($margon_top).');        
    context.lineTo('.($margin_left+10).', '.($margon_top-15).');
    context.lineTo('.($margin_left+50).', '.($margon_top-15).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+10).', '.($margon_top).');        
    context.lineTo('.($margin_left+18).', '.($margon_top-8).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+10).', '.($margon_top).');        
    context.lineTo('.($margin_left+2).', '.($margon_top-8).');
    context.stroke();
    
    context.font = "italic 8pt Calibri";
    context.textAlign="left";
    context.fillStyle="blue";
    context.fillText("'.($text).'", '.($margin_left+10).', '.($margon_top-17).');
    context.fillStyle="black";
    ';
}
public function drawDimKolco($x1,$x2,$y){
    $x1=$x1/10+180;
    $x2=$x2/10+180;
    $y=$y/10+70;
    return '
    context.beginPath();
    context.moveTo('.($x1-7).', '.($y).');        
    context.lineTo('.($x2+7).', '.($y).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($x1-6).', '.($y+6).');        
    context.lineTo('.($x1+6).', '.($y-6).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($x2-6).', '.($y+6).');        
    context.lineTo('.($x2+6).', '.($y-6).');
    context.stroke();
    
    context.font = "italic 8pt Calibri";
    context.textAlign="center";
    context.fillStyle="blue";
    context.fillText("'.(($x2-$x1)*10).'", '.($x1+($x2-$x1)/2).', '.($y-3).');
    context.fillStyle="black";    
    ';
}
public function drawDimText($y1,$y2,$shov=null,$shov_move=null,$dnishe=null){
    $return = '';
    if (!$shov_move){
            $shov_move=51;
        }
    $return .= '
    context.font = "italic 7pt Calibri";
    context.textAlign="center";
    context.fillStyle="blue";
    context.fillText("'.(($y2-$y1)*10).'", '.($shov_move).', '.($y1+($y2-$y1)/2+1).');
    context.fillStyle="black";
    ';
    if ($shov){
        
    if ($dnishe){
        $y1=$y1-2;
    }
    $return .= '
    context.font = "italic 7pt Calibri";
    context.textAlign="center";
    context.fillStyle="blue";
    context.fillText("'.($shov).'", '.(51).', '.($y1).');
    context.fillStyle="black";
    ';
    }
    return $return;
}

public function drawDimLine($margon_top){
    $margon_top=$margon_top;
    return '
    context.beginPath();
    context.moveTo('.(60).', '.($margon_top).');        
    context.lineTo('.(105).', '.($margon_top).');
    context.stroke();
    
    //засечка
    context.beginPath();
    context.moveTo('.(62).', '.($margon_top-4).');        
    context.lineTo('.(70).', '.($margon_top+4).');
    context.stroke();
    ';
}
public function drawDimLine2($margon_top){
    $margon_top=$margon_top;
    return '
    context.beginPath();
    context.moveTo('.(21).', '.($margon_top).');        
    context.lineTo('.(105).', '.($margon_top).');
    context.stroke();
    
    //засечка
    context.beginPath();
    context.moveTo('.(23).', '.($margon_top-4).');        
    context.lineTo('.(31).', '.($margon_top+4).');
    context.stroke();
    
    //засечка
    context.beginPath();
    context.moveTo('.(62).', '.($margon_top-4).');        
    context.lineTo('.(70).', '.($margon_top+4).');
    context.stroke();
    ';
}

public function drawPerekrit ($margin_left,$margon_top,$width,$height){
    $return = '';
    // $width может быть 1000, 1500, 2000
    $height=$height/10-4;
    if ($width==1000){
        $st_left=80;
        $st_right=380;
        $width=1160;
    }
    if ($width==1500){
        $st_left=90;
        $st_right=890;
        $width=1680;
    }
    if ($width==2000){
        $st_left=100;
        $st_right=1400;
        $width=2200;
    }
    
    $margin_left=$margin_left/10+180;
    $margon_top=$margon_top/10+70;
    $width=$width/10;
    $st_left=$st_left/10;
    $st_right=$st_right/10;
    $return .=  '
    context.fillStyle="#C0C0C0";
    context.fillRect('.$margin_left.', '.$margon_top.', '.$st_left.', '.$height.');
    context.fillRect('.($margin_left+$width-$st_right).', '.$margon_top.', '.$st_right.', '.$height.');
    
    context.strokeStyle = "#515151";
    context.strokeRect('.$margin_left.', '.$margon_top.', '.$st_left.', '.$height.');
    context.strokeRect('.($margin_left+$width-$st_right).', '.$margon_top.', '.$st_right.', '.$height.');
    
    context.strokeRect('.$margin_left.', '.$margon_top.', '.$st_left.', '.$height.');
    context.strokeRect('.($margin_left+$width-$st_right).', '.$margon_top.', '.$st_right.', '.$height.');

    context.strokeRect('.$margin_left.', '.$margon_top.', '.$width.', '.$height.');
    context.strokeStyle = "#000000";
    context.fillStyle="#000000";
    ';
    $return .= $this->drawDimLine($margon_top);
    $return .= $this->drawDimLine($margon_top+$height);
    $return .= $this->drawDimText($margon_top,$margon_top+$height+3,10);
    return $return;
}


public function drawDnishe ($margin_left,$margon_top,$width, $height){
    $return = '';
    if ($width==1000){
        $width=1500;
        $margin_left=-170;
    } elseif ($width==1500){
        $width=2000;
        $margin_left=-160+$margin_left;
    } elseif ($width==2000){
        $width=2500;
        $margin_left=-150+$margin_left;
    }
    $margin_left=$margin_left/10+180;
    $margon_top=$margon_top/10+70;
    $width=$width/10;
    $height=$height/10;
    $return .=  '
    context.fillStyle="#C0C0C0";
    context.fillRect('.$margin_left.', '.$margon_top.', '.$width.', '.$height.');

    context.strokeRect('.$margin_left.', '.$margon_top.', '.$width.', '.$height.');
    context.strokeStyle = "#000000";
    context.fillStyle="#000000";
    ';
    $return .= $this->drawDimLine($margon_top);
    $return .= $this->drawDimLine2($margon_top+$height);
    $return .= $this->drawDimText($margon_top,$margon_top+$height,10,'',"dnishe");
    return $return;
}

public function drawOtmostka ($margin_left,$margon_top){
    $margin_left=$margin_left/10;
    $margon_top=$margon_top/10;
    return '
    context.fillStyle="#C0C0C0";
    context.strokeStyle = "#464646";
    //лев
    context.beginPath();
    context.moveTo('.($margin_left+110).', '.($margon_top+70).');
    context.lineTo('.($margin_left+130).', '.($margon_top+70).');
    context.lineTo('.($margin_left+135).', '.($margon_top+78).');
    context.lineTo('.($margin_left+180).', '.($margon_top+78).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+130).', '.($margon_top+70).');
    context.lineTo('.($margin_left+186).', '.($margon_top+66).');
    context.stroke();
    
    //прав
    context.beginPath();
    context.moveTo('.($margin_left+354).', '.($margon_top+70).');
    context.lineTo('.($margin_left+314).', '.($margon_top+70).');
    context.lineTo('.($margin_left+309).', '.($margon_top+78).');
    context.lineTo('.($margin_left+264).', '.($margon_top+78).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+314).', '.($margon_top+70).');
    context.lineTo('.($margin_left+258).', '.($margon_top+66).');
    context.stroke();
    ';
}
public function drawRoad($margin_left,$margon_top){
    $margin_left=$margin_left/10;
    $margon_top=$margon_top/10;
    return '
    context.fillStyle="#C0C0C0";
    context.strokeStyle = "#464646";
    //лев
    context.beginPath();
    context.moveTo('.($margin_left+110).', '.($margon_top+70).');
    context.lineTo('.($margin_left+186).', '.($margon_top+70).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+110).', '.($margon_top+81).');
    context.lineTo('.($margin_left+180).', '.($margon_top+81).');
    context.stroke();
    
    //усики
    context.beginPath();
    context.moveTo('.($margin_left+130).', '.($margon_top+81).');
    context.lineTo('.($margin_left+123).', '.($margon_top+87).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+140).', '.($margon_top+81).');
    context.lineTo('.($margin_left+133).', '.($margon_top+87).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+150).', '.($margon_top+81).');
    context.lineTo('.($margin_left+143).', '.($margon_top+87).');
    context.stroke();
    
    //прав
    context.beginPath();
    context.moveTo('.($margin_left+354).', '.($margon_top+70).');
    context.lineTo('.($margin_left+258).', '.($margon_top+70).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+354).', '.($margon_top+81).');
    context.lineTo('.($margin_left+264).', '.($margon_top+81).');
    context.stroke();
    
    //усики
    context.beginPath();
    context.moveTo('.($margin_left+300).', '.($margon_top+81).');
    context.lineTo('.($margin_left+293).', '.($margon_top+87).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+310).', '.($margon_top+81).');
    context.lineTo('.($margin_left+303).', '.($margon_top+87).');
    context.stroke();
    
    context.beginPath();
    context.moveTo('.($margin_left+320).', '.($margon_top+81).');
    context.lineTo('.($margin_left+313).', '.($margon_top+87).');
    context.stroke();
    ';
}

public function drawSquare ($margin_left,$margon_top,$width, $height,$t_st,$color="#C0C0C0"){
    $return = '';
    if ($width==700){
        $width=840;
    }
    if ($width==1000){
        $width=1160;
    }
    if ($width==1500){
        $width=1680;
    }
    if ($width==2000){
        $width=2200;
    }
    $margin_left=$margin_left/10+180;
    $margon_top=$margon_top/10+70;
    $width=$width/10;
    $height=$height/10-4;
    $t_st=$t_st/10;
    $return .= '
    context.fillStyle="'.$color.'";
    context.fillRect('.$margin_left.', '.$margon_top.', '.$t_st.', '.$height.');
    context.fillRect('.($margin_left+$width-$t_st).', '.$margon_top.', '.$t_st.', '.$height.');
    
    context.strokeStyle = "#515151";
    context.strokeRect('.$margin_left.', '.$margon_top.', '.$t_st.', '.$height.');
    context.strokeRect('.($margin_left+$width-$t_st).', '.$margon_top.', '.$t_st.', '.$height.');
    
    context.strokeRect('.$margin_left.', '.$margon_top.', '.$t_st.', '.$height.');
    context.strokeRect('.($margin_left+$width-$t_st).', '.$margon_top.', '.$t_st.', '.$height.');

    context.strokeRect('.$margin_left.', '.$margon_top.', '.$width.', '.$height.');
    context.strokeStyle = "#000000";
    context.fillStyle="#000000";
    ';
    $return .= $this->drawDimLine($margon_top);
    $return .= $this->drawDimLine($margon_top+$height);
    if ($color=="#5C5C5C"){  // если это опорное кольцо
        $return .= $this->drawDimText($margon_top,$margon_top+$height+2,10,37);
    } else {
        if ($color=="#99C1E4"){ // если это монолит
            $return .= $this->drawDimText($margon_top,$margon_top+$height+3,10,37);
        } else {
            $return .= $this->drawDimText($margon_top,$margon_top+$height+3,10);
        }
        
    }
    return $return;
    
}

public function drawLukT($margin_left,$margon_top){
    $return = '';
    $x=$margin_left/10+180;
    $y=$margon_top/10+70;
    
    $return .=  '
    //лев
    context.fillStyle="#C0C0C0";
    context.strokeStyle = "#464646";
    context.beginPath();
    context.moveTo('.($x+1).', '.($y).');        
    context.lineTo('.($x+13).', '.($y).');   
    context.lineTo('.($x+13).', '.($y-2).');     
    context.lineTo('.($x+9).', '.($y-2).'); 
    context.lineTo('.($x+9).', '.($y-9).'); 
    context.lineTo('.($x+7).', '.($y-9).'); 
    context.lineTo('.($x+2).', '.($y-2).'); 
    context.lineTo('.($x+1).', '.($y-2).'); 
    context.closePath();
    context.fill();
    context.stroke();
    
    //прав
    context.beginPath();
    context.moveTo('.($x+83).', '.($y).');        
    context.lineTo('.($x+71).', '.($y).');  
    context.lineTo('.($x+71).', '.($y-2).'); 
    context.lineTo('.($x+75).', '.($y-2).'); 
    context.lineTo('.($x+75).', '.($y-9).'); 
    context.lineTo('.($x+77).', '.($y-9).');
    context.lineTo('.($x+82).', '.($y-2).');
    context.lineTo('.($x+83).', '.($y-2).');
    context.closePath();
    context.fill();
    context.stroke();
    

    context.moveTo('.($x+13).', '.($y).');        
    //context.lineTo('.($x+71).', '.($y).'); 
    context.stroke();
    
    //крышка
    context.beginPath();
    context.moveTo('.($x+12).', '.($y-4).');        
    context.lineTo('.($x+72).', '.($y-4).'); 
    context.lineTo('.($x+72).', '.($y-8).'); 
    context.quadraticCurveTo('.($x+42).', '.($y-12).', '.($x+12).', '.($y-8).'); 
    context.closePath();
    context.fill();
    context.stroke();
    ';
    $return .= $this->drawDimLine2($y-9);
    $return .= $this->drawDimLine($y-2);
    $return .= $this->drawDimText($y-12,$y);
    return $return;
}
public function drawLukL($margin_left,$margon_top){
    $return = '';
    $x=$margin_left/10+180;
    $y=$margon_top/10+70;
    
    $return .= '
    //лев
    context.fillStyle="#C0C0C0";
    context.strokeStyle = "#464646";
    context.beginPath();
    context.moveTo('.($x+1).', '.($y).');        
    context.lineTo('.($x+13).', '.($y).');   
    context.lineTo('.($x+13).', '.($y-2).');     
    context.lineTo('.($x+9).', '.($y-2).'); 
    context.lineTo('.($x+9).', '.($y-7).'); 
    context.lineTo('.($x+7).', '.($y-7).'); 
    context.lineTo('.($x+2).', '.($y-2).'); 
    context.lineTo('.($x+1).', '.($y-2).'); 
    context.closePath();
    context.fill();
    context.stroke();
    
    //прав
    context.beginPath();
    context.moveTo('.($x+83).', '.($y).');        
    context.lineTo('.($x+71).', '.($y).');  
    context.lineTo('.($x+71).', '.($y-2).'); 
    context.lineTo('.($x+75).', '.($y-2).'); 
    context.lineTo('.($x+75).', '.($y-7).'); 
    context.lineTo('.($x+77).', '.($y-7).');
    context.lineTo('.($x+82).', '.($y-2).');
    context.lineTo('.($x+83).', '.($y-2).');
    context.closePath();
    context.fill();
    context.stroke();
    

    context.moveTo('.($x+13).', '.($y).');        
    //context.lineTo('.($x+71).', '.($y).'); 
    context.stroke();
    
    //крышка
    context.beginPath();
    context.moveTo('.($x+12).', '.($y-4).');        
    context.lineTo('.($x+72).', '.($y-4).'); 
    context.lineTo('.($x+72).', '.($y-7).');
    context.lineTo('.($x+12).', '.($y-7).');
    context.closePath();
    context.fill();
    context.stroke();
    ';
    $return .= $this->drawDimLine2($y-7);
    $return .= $this->drawDimLine($y-2);
    $return .= $this->drawDimText($y-9,$y);
    return $return;
}














  

	
}
?>