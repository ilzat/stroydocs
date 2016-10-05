$(document).ready(function() {

//1111111111111111111111111111111111111111111111111111111111111111111111111
///////////////////////////////////////////////////////////////////////////
$("#1_width").keyup(function(){
  valid_num ("1_width", "Ширина траншеи", 0, 1000, 3);
  ground_1 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#1_height").keyup(function(){
  valid_num ("1_height", "Высота траншеи", 0, 50, 3);
  ground_1 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#1_length").keyup(function(){
  valid_num ("1_length", "Длина траншеи", 0, 1000, 3);
  ground_1 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_1 () {
  var error = false;
  
  var fieldsArr = new Array ("1_width", "1_height", "1_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _1_width = Number($("#1_width").val());
    var _1_height = Number($("#1_height").val());
    var _1_length = Number($("#1_length").val());
    
    var answer_1_f = number_good_view(_1_width * _1_height, 3);
    var answer_1_f_str = 'F = a * H = ' + _1_width + ' * ' + _1_height + ' = ' + answer_1_f + ' м2';
    var answer_1_v = number_good_view(_1_width * _1_height * _1_length, 3);
    var answer_1_v_str = 'V = a * H * L = ' + _1_width + ' * ' + _1_height + ' * ' + _1_length + ' = ' + answer_1_v + ' м3';
    
    $("#answer_1_v").html(answer_1_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_1_f_str").html(answer_1_f_str);
    $("#answer_1_v_str").html(answer_1_v_str);
    $("#answer_1_f").html(answer_1_f).removeClass("bg-red").addClass("bg-green");
  } else {
    $("#answer_1_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_1_f_str").html("");
    $("#answer_1_v_str").html("");
    $("#answer_1_f").html("###").removeClass("bg-green").addClass("bg-red");
  }
}
ground_1 ();

//222222222222222222222222222222222222222222222222222222222222222222222
$("#2_width").keyup(function(){
  valid_num ("2_width", "Ширина траншеи", 0, 1000, 3);
  ground_2 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#2_height_1").keyup(function(){
  valid_num ("2_height_1", "Высота траншеи H1", 0, 50, 3);
  ground_2 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#2_height_2").keyup(function(){
  valid_num ("2_height_2", "Высота траншеи H2", 0, 50, 3);
  ground_2 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#2_length").keyup(function(){
  valid_num ("2_length", "Длина траншеи", 0, 1000, 3);
  ground_2 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_2 () {
  var error = false;
  
  var fieldsArr = new Array ("2_width", "2_height_1", "2_height_2", "2_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _2_width = Number($("#2_width").val());
    var _2_height_1 = Number($("#2_height_1").val());
    var _2_height_2 = Number($("#2_height_2").val());
    var _2_length = Number($("#2_length").val());
    
    
    var answer_2_f_1 = number_good_view(_2_width * _2_height_1, 3);
    var answer_2_f_1_str = 'F<sub>1</sub> = a * H<sub>1</sub> = ' + _2_width + ' * ' + _2_height_1 + ' = ' + answer_2_f_1 + ' м2';    
    var answer_2_f_2 = number_good_view(_2_width * _2_height_2, 3);
    var answer_2_f_2_str = 'F<sub>2</sub> = a * H<sub>2</sub> = ' + _2_width + ' * ' + _2_height_2 + ' = ' + answer_2_f_2 + ' м2';
    var answer_2_v = number_good_view(_2_width * (_2_height_1 + _2_height_2) * 0.5 * _2_length, 3);
    var answer_2_v_str = 'V = a * (H<sub>1</sub> + H<sub>2</sub>) / 2 * L = ' + _2_width + ' * ( ' + _2_height_1 + ' + ' + _2_height_2 + ' ) / 2 * ' + _2_length + ' = ' + answer_2_v + ' м3';
    
    $("#answer_2_v").html(answer_2_v).removeClass("bg-red").addClass("bg-green");    
    $("#answer_2_f_1").html(answer_2_f_1).removeClass("bg-red").addClass("bg-green");
    $("#answer_2_f_2").html(answer_2_f_2).removeClass("bg-red").addClass("bg-green");
    $("#answer_2_v_str").html(answer_2_v_str);
    $("#answer_2_f_1_str").html(answer_2_f_1_str);
    $("#answer_2_f_2_str").html(answer_2_f_2_str);
  } else {
    $("#answer_2_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_2_f_1").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_2_f_2").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_2_v_str").html("");
    $("#answer_2_f_1_str").html("");
    $("#answer_2_f_2_str").html("");
  }
}
ground_2 ();


//3333333333333333333333333333333333333333333333333333333333333333
$("#3_ground_type").change(function(){
  if (Number($("#3_ground_type").val()) == 222) {
    $("#3_width_2").val(Number($("#3_width_1").val())+1);
    $( "#3_width_2" ).prop( "disabled", false );
  } else {
    $("#3_width_2").val('');
    $( "#3_width_2" ).prop( "disabled", true );
    var n = noty({
      text: "Выбран расчет по виду грунта, размер a2 учитываться не будет",
      type: 'information',
      layout: 'top',
      timeout: 5000
    });
  }
  ground_3 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#3_width_1").keyup(function(){
  valid_num ("3_width_1", "Ширина основания траншеи", 0, 1000, 3);
  ground_3 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#3_width_2").keyup(function(){
  valid_num ("3_width_2", "Ширина верха траншеи", 0, 1000, 3);
  ground_3 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#3_height").keyup(function(){
  valid_num ("3_height", "Высота траншеи H", 0, 50, 3);
  ground_3 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#3_length").keyup(function(){
  valid_num ("3_length", "Длина траншеи", 0, 1000, 3);
  ground_3 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_3 () {
  var error = false;
  
  var fieldsArr = new Array ("3_width_1", "3_width_2", "3_height", "3_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _3_ground_type = Number($("#3_ground_type").val());
    var _3_width_1 = Number($("#3_width_1").val());
    var _3_width_2 = Number($("#3_width_2").val());
    var _3_height = Number($("#3_height").val());
    var _3_length = Number($("#3_length").val());
    
    if (_3_ground_type == 222) { // если считаем по a2
        
        $("#answer_3_ground").html(" грунт не выбран, расчет по размеру a2").removeClass("bg-red").addClass("bg-green");
        var answer_3_a2_str = '';
        
    } else {
        //0 - насыпной
        //1 - песчаный
        //2 - супесь
        //3 - глина
        //4 - лессы
        var grunt_name=['насыпной неуплотненный','песчаный и гравийный','супесь','суглинок','глина','лессы и лессовидные']
        var m=[[0.67,0.5,0.25,0,0,0],[1,1,0.67,0.5,0.25,0.5],[1.25,1,0.85,0.75,0.5,0.5]]; // при глубине до 1.5  / 3  / 5 м. соответственно
        
        if (_3_height <= 1.5) {
            m = m[0][_3_ground_type];
        } else 
        if (_3_height > 1.5 && _3_height <= 3) {
            m = m[1][_3_ground_type];
        } else 
        if (_3_height > 3) {
            m = m[2][_3_ground_type];
        }
        _3_width_2 = _3_width_1 + m * _3_height * 2;
        
        $("#answer_3_ground").html(grunt_name[_3_ground_type] + " >>> коэф. m = " + m).removeClass("bg-red").addClass("bg-green");
        
        var answer_3_a2_str = 'a<sub>2</sub> = H * m + a<sub>1</sub> + H * m = ' + _3_height + ' * ' + m + ' + ' +  _3_width_1 + ' + ' + _3_height + ' * ' + m + ' = ' + _3_width_2 + ' м';
        
    }    
    
    var answer_3_f = number_good_view((_3_width_1 + _3_width_2) * 0.5 * _3_height, 3);
    var answer_3_v = number_good_view((_3_width_1 + _3_width_2) * 0.5 * _3_height * _3_length, 3);
    
    var answer_3_f_str = 'F = ( a<sub>1</sub> + a<sub>2</sub> ) / 2 * H = ( ' + _3_width_1 + ' + ' + _3_width_2 + ' ) / 2 * ' + _3_height + ' = ' + answer_3_f + ' м2';
    var answer_3_v_str = 'V = ( a<sub>1</sub> + a<sub>2</sub> ) / 2 * H * L = ( ' + _3_width_1 + ' + ' + _3_width_2 + ' ) / 2 * ' + _3_height + ' * ' + _3_length + ' = ' + answer_3_v + ' м3';
    
    $("#answer_3_v").html(answer_3_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_3_f").html(answer_3_f).removeClass("bg-red").addClass("bg-green");
    $("#answer_3_a2_str").html(answer_3_a2_str);
    $("#answer_3_f_str").html(answer_3_f_str);
    $("#answer_3_v_str").html(answer_3_v_str);
    
    
  } else {
    $("#answer_3_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_3_f").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_3_a2_str").html("");
    $("#answer_3_f_str").html("");
    $("#answer_3_v_str").html("");
  }
}
ground_3 ();


//4444444444444444444444444444444444444444444444444444444444444444444444444
$("#4_ground_type").change(function(){
  if (Number($("#4_ground_type").val()) == 222) {
    $("#4_width_2").val(Number($("#4_width_1").val())+1);
    $( "#4_width_2" ).prop( "disabled", false );
  } else {
    $("#4_width_2").val('');
    $( "#4_width_2" ).prop( "disabled", true );
    var n = noty({
      text: "Выбран расчет по виду грунта, размер a2 учитываться не будет",
      type: 'information',
      layout: 'top',
      timeout: 5000
    });
  }
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#4_width_1").keyup(function(){
  valid_num ("4_width_1", "Ширина основания траншеи", 0, 1000, 3);
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#4_width_2").keyup(function(){
  valid_num ("4_width_2", "Ширина верха траншеи", 0, 1000, 3);
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#4_height_1").keyup(function(){
  valid_num ("4_height_1", "Высота траншеи H1", 0, 50, 3);
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#4_height_2").keyup(function(){
  valid_num ("4_height_2", "Высота траншеи H2", 0, 50, 3);
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#4_length").keyup(function(){
  valid_num ("4_length", "Длина траншеи", 0, 1000, 3);
  ground_4 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_4 () {
  var error = false;
  
  var fieldsArr = new Array ("4_width_1", "4_width_2", "4_height_1", "4_height_2", "4_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _4_ground_type = Number($("#4_ground_type").val());
    var _4_width_1 = Number($("#4_width_1").val());
    var _4_width_2 = Number($("#4_width_2").val());
    var _4_height_1 = Number($("#4_height_1").val());
    var _4_height_2 = Number($("#4_height_2").val());
    var _4_length = Number($("#4_length").val());
    
    if (_4_ground_type == 222) { // если считаем по a2
        
        $("#answer_4_ground").html(" грунт не выбран, расчет по размеру a2").removeClass("bg-red").addClass("bg-green");
        var m = (_4_width_2 - _4_width_1) / 2 / _4_height_1;
        
        var answer_4_a2_str = '';
        
    } else {
        //0 - насыпной
        //1 - песчаный
        //2 - супесь
        //3 - глина
        //4 - лессы
        var grunt_name=['насыпной неуплотненный','песчаный и гравийный','супесь','суглинок','глина','лессы и лессовидные']
        var m=[[0.67,0.5,0.25,0,0,0],[1,1,0.67,0.5,0.25,0.5],[1.25,1,0.85,0.75,0.5,0.5]]; // при глубине до 1.5  / 3  / 5 м. соответственно
        
         var height_max=Math.max(_4_height_1, _4_height_2);
        
        if (height_max <= 1.5) {
            m = m[0][_4_ground_type];
        } else 
        if (height_max > 1.5 && height_max <= 3) {
            m = m[1][_4_ground_type];
        } else 
        if (height_max > 3) {
            m = m[2][_4_ground_type];
        }
        _4_width_2 = number_good_view(_4_width_1 + m * _4_height_1 * 2, 3);        
        
        $("#answer_4_ground").html(grunt_name[_4_ground_type] + " >>> коэф. m = " + m).removeClass("bg-red").addClass("bg-green");
        
        var answer_4_a2_str = 'a<sub>2</sub> = H<sub>1</sub> * m + a<sub>1</sub> + H<sub>1</sub> * m = ' + _4_height_1 + ' * ' + m + ' + ' +  _4_width_1 + ' + ' + _4_height_1 + ' * ' + m + ' = ' + _4_width_2 + ' м';
        
    }
    var _4_width_3 = number_good_view(_4_width_1 + m * _4_height_2 * 2, 3);
    
    var answer_4_a3_str = 'a<sub>3</sub> = H<sub>2</sub> * m + a<sub>1</sub> + H<sub>2</sub> * m = ' + _4_height_2 + ' * ' + m + ' + ' +  _4_width_1 + ' + ' + _4_height_2 + ' * ' + m + ' = ' + _4_width_3 + ' м';
    
    var answer_4_f_1 = number_good_view((_4_width_1 + _4_width_2) * 0.5 * _4_height_1, 3);
    var answer_4_f_2 = number_good_view((_4_width_1 + _4_width_3) * 0.5 * _4_height_2, 3);
    var answer_4_v = number_good_view((((Number(answer_4_f_1) + Number(answer_4_f_2)) / 2 - m * Math.pow((_4_height_1 - _4_height_2), 2) / 6) * _4_length), 3);    
    
    var answer_4_f_1_str = 'F<sub>1</sub> = ( a<sub>1</sub> + a<sub>2</sub> ) / 2 * H<sub>1</sub> = ( ' + _4_width_1 + ' + ' + _4_width_2 + ' ) / 2 * ' + _4_height_1 + ' = ' + answer_4_f_1 + ' м2';
    var answer_4_f_2_str = 'F<sub>2</sub> = ( a<sub>1</sub> + a<sub>3</sub> ) / 2 * H<sub>2</sub> = ( ' + _4_width_1 + ' + ' + _4_width_3 + ' ) / 2 * ' + _4_height_2 + ' = ' + answer_4_f_2 + ' м2';
    var answer_4_v_str = 'V = ( F<sub>1</sub> / 2 + F<sub>2</sub> / 2 - m * ( H<sub>1</sub> - H<sub>2</sub> )<sup>2</sup> / 6 ) * L = ( ' + answer_4_f_1 + ' / 2 + ' + answer_4_f_2 + ' / 2 - m * ( ' + _4_height_1 + ' - ' + _4_height_2 + ' )<sup>2</sup> / 6 ) * ' + _4_length + ' = ' + answer_4_v + ' м3';
    
    
    $("#answer_4_v").html(answer_4_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_4_f_1").html(answer_4_f_1).removeClass("bg-red").addClass("bg-green");
    $("#answer_4_f_2").html(answer_4_f_2).removeClass("bg-red").addClass("bg-green");
    $("#answer_4_a2_str").html(answer_4_a2_str);
    $("#answer_4_a3_str").html(answer_4_a3_str);
    $("#answer_4_f_1_str").html(answer_4_f_1_str);
    $("#answer_4_f_2_str").html(answer_4_f_2_str);
    $("#answer_4_v_str").html(answer_4_v_str);
    
  } else {
    $("#answer_4_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_4_f_1").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_4_f_2").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_4_a2_str").html("");
    $("#answer_4_a3_str").html("");
    $("#answer_4_f_1_str").html("");
    $("#answer_4_f_2_str").html("");
    $("#answer_4_v_str").html("");
  }
}
ground_4 ();


//5555555555555555555555555555555555555555555555555555555555555555555555555
///////////////////////////////////////////////////////////////////////////
$("#5_width").keyup(function(){
  valid_num ("5_width", "Ширина котлована", 0, 1000, 3);
  ground_5 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#5_length").keyup(function(){
  valid_num ("5_length", "Длина котлована", 0, 1000, 3);
  ground_5 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#5_height").keyup(function(){
  valid_num ("5_height", "Высота котлована", 0, 100, 3);
  ground_5 ();  
});

///////////////////////////////////////////////////////////////////////////
function ground_5 () {
  var error = false;
  
  var fieldsArr = new Array ("5_width", "5_height", "5_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _5_width = Number($("#5_width").val());
    var _5_height = Number($("#5_height").val());
    var _5_length = Number($("#5_length").val());
    
    var answer_5_v = number_good_view(_5_width * _5_height * _5_length, 3);
    var answer_5_f = number_good_view(_5_width * _5_length, 3);
    
    var answer_5_f_str = 'F = L<sub>1</sub> * L<sub>2</sub> = ' + _5_width + ' * ' + _5_length + ' = ' + answer_5_f + ' м2';
    var answer_5_v_str = 'V = L<sub>1</sub> * L<sub>2</sub> * H = ' + _5_width + ' * ' + _5_length + ' * ' + _5_height + ' = ' + answer_5_v + ' м3';
    
    $("#answer_5_v").html(answer_5_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_5_f").html(answer_5_f).removeClass("bg-red").addClass("bg-green");
    $("#answer_5_f_str").html(answer_5_f_str);
    $("#answer_5_v_str").html(answer_5_v_str);
  } else {
    $("#answer_5_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_5_f").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_5_f_str").html("");
    $("#answer_5_v_str").html("");
  }
}
ground_5 ();



//6666666666666666666666666666666666666666666666666666666666666666666666666
///////////////////////////////////////////////////////////////////////////
$("#6_width").keyup(function(){
  valid_num ("6_width", "Ширина котлована", 0, 1000, 3);
  ground_6 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#6_length").keyup(function(){
  valid_num ("6_length", "Длина котлована", 0, 1000, 3);
  ground_6 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#6_height_1").keyup(function(){
  valid_num ("6_height_1", "Высота котлована H1", 0, 50, 3);
  ground_6 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#6_height_2").keyup(function(){
  valid_num ("6_height_2", "Высота котлована H2", 0, 50, 3);
  ground_6 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#6_height_3").keyup(function(){
  valid_num ("6_height_3", "Высота котлована H3", 0, 50, 3);
  ground_6 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#6_height_4").keyup(function(){
  valid_num ("6_height_4", "Высота котлована H4", 0, 50, 3);
  ground_6 ();  
});

///////////////////////////////////////////////////////////////////////////
function ground_6 () {
  var error = false;
  
  var fieldsArr = new Array ("6_width", "6_height_1", "6_height_2", "6_height_3", "6_height_4", "6_length");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _6_width = Number($("#6_width").val());
    var _6_height_1 = Number($("#6_height_1").val());
    var _6_height_2 = Number($("#6_height_2").val());
    var _6_height_3 = Number($("#6_height_3").val());
    var _6_height_4 = Number($("#6_height_4").val());
    var _6_length = Number($("#6_length").val());
    
    var answer_6_v = number_good_view(_6_width * (_6_height_1 + _6_height_2 + _6_height_3 + _6_height_4) / 4 * _6_length, 3);
    var answer_6_f = number_good_view(_6_width * _6_length, 3);
    
    var answer_6_f_str = 'F = L<sub>1</sub> * L<sub>2</sub> = ' + _6_width + ' * ' + _6_length + ' = ' + answer_6_f + ' м2';
    var answer_6_v_str = 'V = L<sub>1</sub> * L<sub>2</sub> * ( H<sub>1</sub> + H<sub>2</sub> + H<sub>3</sub> + H<sub>4</sub> ) / 4 = ' + _6_width + ' * ' + _6_length + ' * ( ' + _6_height_1 + ' + ' + _6_height_2 + ' + ' + _6_height_3 + ' + ' + _6_height_4 + ' ) / 4 = ' + answer_6_v + ' м3';
    
    $("#answer_6_v").html(answer_6_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_6_f").html(answer_6_f).removeClass("bg-red").addClass("bg-green");
    $("#answer_6_f_str").html(answer_6_f_str);
    $("#answer_6_v_str").html(answer_6_v_str);
  } else {
    $("#answer_6_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_6_f").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_6_f_str").html("");
    $("#answer_6_v_str").html("");
  }
}
ground_6 ();



//77777777777777777777777777777777777777777777777777777777777777777777777777
$("#7_ground_type").change(function(){
  ground_7 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#7_width_1").keyup(function(){
  valid_num ("7_width_1", "Ширина основания котлована L1", 0, 1000, 3);
  ground_7 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#7_width_2").keyup(function(){
  valid_num ("7_width_2", "Длина основания котлована L2", 0, 1000, 3);
  ground_7 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#7_height").keyup(function(){
  valid_num ("7_height", "Высота котлована H", 0, 50, 3);
  ground_7 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_7 () {
  var error = false;
  
  var fieldsArr = new Array ("7_width_1", "7_width_2", "7_height");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _7_ground_type = Number($("#7_ground_type").val());
    var _7_width_1 = Number($("#7_width_1").val());
    var _7_width_2 = Number($("#7_width_2").val());
    var _7_height = Number($("#7_height").val());
    
    //0 - насыпной
    //1 - песчаный
    //2 - супесь
    //3 - глина
    //4 - лессы
    var grunt_name=['насыпной неуплотненный','песчаный и гравийный','супесь','суглинок','глина','лессы и лессовидные']
    var m=[[0.67,0.5,0.25,0,0,0],[1,1,0.67,0.5,0.25,0.5],[1.25,1,0.85,0.75,0.5,0.5]]; // при глубине до 1.5  / 3  / 5 м. соответственно
    
    if (_7_height <= 1.5) {
        m = m[0][_7_ground_type];
    } else 
    if (_7_height > 1.5 && _7_height <= 3) {
        m = m[1][_7_ground_type];
    } else 
    if (_7_height > 3) {
        m = m[2][_7_ground_type];
    }
    var _7_width_3 = _7_width_1 + m * _7_height * 2;
    var _7_width_4 = _7_width_2 + m * _7_height * 2;
    
    $("#answer_7_ground").html(grunt_name[_7_ground_type] + " >>> коэф. m = " + m).removeClass("bg-red").addClass("bg-green");
    
    var answer_7_width_3 = number_good_view(_7_width_3, 3);
    var answer_7_width_4 = number_good_view(_7_width_4, 3);
    var _7_v = _7_height / 6 * ((2 * _7_width_1 + _7_width_3) * _7_width_2 + (2 * _7_width_3 + _7_width_1) * _7_width_4);
    var answer_7_v = number_good_view(_7_v, 3);
    
    var answer_7_l_3_str = 'L<sub>3</sub> = H * m + L<sub>1</sub> + H * m = ' + _7_height + ' * ' + m + ' + ' + _7_width_1 + ' + ' + _7_height + ' * ' + m + ' = ' + answer_7_width_3 + ' м';
    var answer_7_l_4_str = 'L<sub>4</sub> = H * m + L<sub>2</sub> + H * m = ' + _7_height + ' * ' + m + ' + ' + _7_width_2 + ' + ' + _7_height + ' * ' + m + ' = ' + answer_7_width_4 + ' м';
    
    _7_width_3 = number_good_view(_7_width_3, 3);
    _7_width_4 = number_good_view(_7_width_4, 3);
    
    var answer_7_v_str = 'V = ( H / 6 * ( ( 2 * L<sub>1</sub> + L<sub>3</sub> ) * L<sub>2</sub> + ( 2 * L<sub>3</sub> + L<sub>1</sub> ) * L<sub>4</sub> ) = ( ' + _7_height + ' / 6 * ( ( 2 * ' + _7_width_1 + ' + ' + _7_width_3 + ' ) * ' + _7_width_2 + ' + ( 2 * ' + _7_width_3 + ' + ' + _7_width_1 + ' ) * ' + _7_width_4 + ' ) = ' + answer_7_v + ' м3';
    
    $("#answer_7_v").html(answer_7_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_7_width_3").html(answer_7_width_3).removeClass("bg-red").addClass("bg-green");
    $("#answer_7_width_4").html(answer_7_width_4).removeClass("bg-red").addClass("bg-green");
    $("#answer_7_l_3_str").html(answer_7_l_3_str);
    $("#answer_7_l_4_str").html(answer_7_l_4_str);
    $("#answer_7_v_str").html(answer_7_v_str);
    
    
  } else {
    $("#answer_7_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_7_width_3").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_7_width_4").html("###").removeClass("bg-green").addClass("bg-red");    
    $("#answer_7_l_3_str").html("");
    $("#answer_7_l_4_str").html("");
    $("#answer_7_v_str").html("");
  }
}
ground_7 ();




//8888888888888888888888888888888888888888888888888888888888888888888888888
$("#8_width_1").keyup(function(){
  valid_num ("8_width_1", "Ширина основания d1", 0, 1000, 3);
  ground_8 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#8_width_2").keyup(function(){
  valid_num ("8_width_2", "Ширина по верху d2", 0, 1000, 3);
  ground_8 ();  
});
///////////////////////////////////////////////////////////////////////////
$("#8_height").keyup(function(){
  valid_num ("8_height", "Высота котлована H", 0, 50, 3);
  ground_8 ();  
});
///////////////////////////////////////////////////////////////////////////
function ground_8 () {
  var error = false;
  
  var fieldsArr = new Array ("8_width_1", "8_width_2", "8_height");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    var _8_width_1 = Number($("#8_width_1").val());
    var _8_width_2 = Number($("#8_width_2").val());
    var _8_height = Number($("#8_height").val());
    
    var r = (_8_width_1 + _8_width_2) / 2 / 2;
    var _8_v = Math.PI * r * r * _8_height;
    var answer_8_v = number_good_view(_8_v, 3);
    var answer_8_v_str = 'V = 3.14 * ( ( D<sub>1</sub> + D<sub>2</sub>) / 2 )<sup>2</sup> / 4 * H = 3.14 * ( ( ' + _8_width_1 + ' + ' + _8_width_2 + ' ) / 2 )<sup>2</sup> / 4 * ' + _8_height + ' = ' + answer_8_v + ' м3';
    
    $("#answer_8_v").html(answer_8_v).removeClass("bg-red").addClass("bg-green");
    $("#answer_8_v_str").html(answer_8_v_str);    
  } else {
    $("#answer_8_v").html("###").removeClass("bg-green").addClass("bg-red");
    $("#answer_8_v_str").html("");
  }
}
ground_8 ();






















///////////////////////////////////////////////////////////////////////////
}); // end of $(document).ready(function()