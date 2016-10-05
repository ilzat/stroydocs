diameter = Number($('input[name="diameter"]').val());

function calc_v() {  
  var length_pipe = $('input[name="length_pipe"]').val();
  var r = diameter/2;
  if (diameter == filling_height){
    s = Math.PI * r * r;
  } else if (r == filling_height) {
    s = Math.PI * r * r / 2;
  } else if (filling_height < r) {
    s = r * r * Math.acos(1 - filling_height / r) - (r - filling_height) * Math.sqrt(2 * r * filling_height - filling_height * filling_height);
  } else if (filling_height > r) {
    filling_height_2 = diameter - filling_height;    
    s_dugi = r * r * Math.acos(1 - filling_height_2 / r) - (r - filling_height_2) * Math.sqrt(2 * r * filling_height_2 - filling_height_2 * filling_height_2);
    s = Math.PI * r * r - s_dugi;
  } else {
    alert ("Ошибка!"+filling_height+"__"+diameter);
  }
  $('#volume_text').html("Объем жидкости в трубе: " + number_good_view((s * 0.000001 * length_pipe), 6) + " м3" + " = <span class='badge bg-green'>" + number_good_view((s * 0.001 * length_pipe), 2) + " литров</span>");
  $('#sectional_area').html("Площадь сечения жидкости: " + number_good_view((s * 0.000001), 6) + " м2" + " = " + number_good_view((s), 0) + " мм2");
  
  drawVolumeText(number_good_view((s * 0.001 * length_pipe), 2));//в литрах
}

$(document).ready(function () {

$('input[name="diameter"]').keyup(function(){
  diameter = $('input[name="diameter"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,3}$/;
  diameter = diameter.replace(",", ".");
  if(!diameter.match(num_pattern) || Number(diameter)>500 || Number(diameter)<0){ //если поле не верно 
    diameter = diameter.substring(0, diameter.length - 1);
  }
  $('input[name="diameter"]').val(diameter);
  $('input[name="filling_height"]').val(diameter);
  
  $("#filling_height_slider").data("ionRangeSlider").update({
      from: diameter,
      from_max: diameter
  }); 
  
  // Изменяем в слайдере
  $("#diameter_slider").data("ionRangeSlider").update({
      from: diameter
  });
  drawChangeDiameter(diameter);
});

/////////////////////////////////////////////////////////////////
$('input[name="length_pipe"]').keyup(function(){
  length_pipe = $('input[name="length_pipe"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,4}[.]{0,1}[0-9]{0,3}$/;
  length_pipe = length_pipe.replace(",", ".");
  if(!length_pipe.match(num_pattern) || Number(length_pipe)>100 || Number(length_pipe)<0){ //если поле не верно 
    length_pipe = length_pipe.substring(0, length_pipe.length - 1);
  }
  $('input[name="length_pipe"]').val(length_pipe);
  
  // Изменяем в слайдере
  $("#length_pipe_slider").data("ionRangeSlider").update({
      from: length_pipe
  });
  drawChangeLength(length_pipe);
});

/////////////////////////////////////////////////////////////////
$('input[name="filling_height"]').keyup(function(){
  filling_height = $('input[name="filling_height"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,3}$/;
  filling_height = filling_height.replace(",", ".");
  if(!filling_height.match(num_pattern) || Number(filling_height)>500 || Number(filling_height)<0){ //если поле не верно 
    filling_height = filling_height.substring(0, filling_height.length - 1);
  }
  $('input[name="filling_height"]').val(filling_height);
  
  // Изменяем в слайдере
  $("#filling_height_slider").data("ionRangeSlider").update({
      from: filling_height
  });
  drawChangeFilling(filling_height);
});


//////////////////////////////////////////////////////////

var filling_height_onChange = function (value) {   
  $('input[name="filling_height"]').val(value);
  filling_height = value;
  drawChangeFilling(value);
};

$("#filling_height_slider").ionRangeSlider({
  min: 0,
  max: 500,
  type: 'single',
  step: 1,
  postfix: " (h) мм.",
  onStart: function (data) {
    filling_height_onChange(data.from);
  },
  onChange: function (data) {
      filling_height_onChange(data.from);
  },
  onFinish: function (data) {
      filling_height_onChange(data.from);
  },
  onUpdate: function (data) {
      filling_height_onChange(data.from);;
  }
});


//////////////////////////////////////////////////////////

var diameter_slider_onChange = function (value) {

  $('input[name="diameter"]').val(value);  
  $('input[name="filling_height"]').val(value);
  
  $("#filling_height_slider").data("ionRangeSlider").update({
      from: value,
      from_max: value
  }); 
  diameter = value;
  drawChangeDiameter(value);
};

$("#diameter_slider").ionRangeSlider({
  min: 0,
  max: 500,
  from: 50,
  type: 'single',
  step: 1,
  postfix: " (d) мм.",
  onStart: function (data) {
    diameter_slider_onChange(data.from);
  },
  onChange: function (data) {
      diameter_slider_onChange(data.from);
  },
  onFinish: function (data) {
      diameter_slider_onChange(data.from);
  }
});

///////////////////////////////////////////////////////
var length_pipe_onChange = function (value) {
  
  $('input[name="length_pipe"]').val(value);
  length_pipe = value;
  drawChangeLength(value);
  
};


$("#length_pipe_slider").ionRangeSlider({
  min: 0,
  max: 100,
  from: 1,
  type: 'single',
  step: 1,
  postfix: " (L) м.",
  onStart: function (data) {
    length_pipe_onChange(data.from);
  },
  onChange: function (data) {
      length_pipe_onChange(data.from);
  },
  onFinish: function (data) {
      length_pipe_onChange(data.from);
  }
});

///////////////////////////////////////////////////////

}); // end of $(document).ready(function ()