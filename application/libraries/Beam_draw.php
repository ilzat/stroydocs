<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Beam_draw {
  
  
public function Beam_draw(){
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

public function end(){
    return '
    } else {
    alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
    }
    }
    </script>
    <canvas id="myCanvas1" width="500" height="160"></canvas>
    ';
}

public function end_2(){
    return '
    } else {
    alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
    }
    }
    </script>
    <canvas id="myCanvas1" width="500" height="290"></canvas><br/>
    <strong><em><p align="center" style="margin-bottom: -4px;">Эпюра Q<sub>x</sub></p></em></strong>
    <canvas id="myCanvas2" width="500" height="180"></canvas><br/>
    <strong><em><p align="center" style="margin-bottom: -4px;">Эпюра M<sub>x</sub></p></em></strong>
    <canvas id="myCanvas3" width="500" height="220"></canvas><br/>
    ';
}
public function drawLine(){
    return '
    context.beginPath();
    context.moveTo(50, 70);        
    context.lineTo(450, 70);
    context.stroke();
    ';
}
function drawLine2(){
    return '
    context.beginPath();
    context.moveTo(42, 130);        
    context.lineTo(458, 130);
    context.stroke();
    ';
}

function drawDot($x,$y){
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
function drawDot2($x,$y,$key){
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
function drawDot3($x,$y,$key){
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
function drawValueL($x1,$x2,$y,$value,$name){
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
function drawValueL2($x1,$x2,$y,$name){
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
function drawMainstayNoMoving($x,$y,$name){
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

function drawMainstayMoving($x,$y,$name){
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
function drawMainstayNoMoving2($x,$y,$name,$name2){
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

function drawMainstayMoving2($x,$y,$name,$name2){
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
function drawOnePointEnergyCursor($x,$y,$value,$name){
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
function drawOneLoadCursor($x,$y){
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
function drawOneLoadCursor2($x,$y){
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

function drawLoadCursors($x1,$x2,$y,$value,$name){
    $return = '';
    $x1=$x1+50;
    $x2=$x2+50;
    $y=$y+70;
    $between=10;
    if ($value<0){  
    $return .= '
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
        $return .= $this->drawOneLoadCursor($x_start,0);
        $x_start=$x_start+$between;
    }
    $return .= $this->drawOneLoadCursor(($x2-50),0);
    }
    if ($value>0){  
    $return .= '
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
        $return .= $this->drawOneLoadCursor2($x_start,0);
        $x_start=$x_start+$between;
    }
    $return .= $this->drawOneLoadCursor2(($x2-50),0);
    }
    return $return;
}
function drawMoment($x,$y,$value,$name){
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
















  

	
}
?>