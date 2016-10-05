
basis = Number($('input[name="basis"]').val());


$(document).ready(function () {

//////////////////////////////////////////////////////////////////////
$('input[name="basis"]').keyup(function(){
  basis = $('input[name="basis"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,6}[.]{0,1}[0-9]{0,2}$/;
  basis = basis.replace(",", ".");
  if(!basis.match(num_pattern) || Number(basis)>100000 || Number(basis)<0){ //если поле не верно 
    basis = basis.substring(0, basis.length - 1);
  }
  $('input[name="basis"]').val(basis);
  
  drawTriangle();
}); 

//////////////////////////////////////////////////////////////////////
$('input[name="angle"]').keyup(function(){
  angle = $('input[name="angle"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,2}[.]{0,1}[0-9]{0,1}$/;
  angle = angle.replace(",", ".");
  if(!angle.match(num_pattern) || Number(angle)>89 || Number(angle)<0){ //если поле не верно 
    angle = angle.substring(0, angle.length - 1);
  }
  $('input[name="angle"]').val(angle);
  
  // Изменяем в слайдере
  $("#angle_slider").data("ionRangeSlider").update({
      from: angle
  });
  
  percent = Math.tan(angle * Math.PI / 180) * 100;
  $('input[name="percent"]').val(number_good_view(percent, 1));

  drawTriangle();
});

//////////////////////////////////////////////////////////////////////
$('input[name="percent"]').keyup(function(){
  percent = $('input[name="percent"]').val();
  
  // Валидация
  num_pattern = /^[0-9]{1,2}[.]{0,1}[0-9]{0,2}$/;
  percent = percent.replace(",", ".");
  if(!percent.match(num_pattern) || Number(percent)>163312394 || Number(percent)<0){ //если поле не верно 
    percent = percent.substring(0, percent.length - 1);
  }
  $('input[name="percent"]').val(percent);
  
  angle = Math.atan(percent / 100) * 180 / Math.PI;
  
  // Изменяем в слайдере
  $("#angle_slider").data("ionRangeSlider").update({
      from: angle
  }); 
  $('input[name="angle"]').val(number_good_view(angle, 1));
  
  drawTriangle();
});

//////////////////////////////////////////////////////////////////////
var angle_slider_onChange = function (value) {
  $('input[name="angle"]').val(value);
  angle = value;  
  
  percent = Math.tan(angle * Math.PI / 180) * 100;
  $('input[name="percent"]').val(number_good_view(percent, 1));
  
  drawTriangle();
};

$("#angle_slider").ionRangeSlider({
  min: 0,
  max: 89,
  from: 60,
  type: 'single',
  step: 1,
  postfix: " град.",
  onStart: function (data) {
    angle_slider_onChange(data.from);
  },
  onChange: function (data) {
      angle_slider_onChange(data.from);
  },
  onFinish: function (data) {
      angle_slider_onChange(data.from);
  }/*,
  onUpdate: function (data) {
      angle_slider_onChange(data.from);
  }*/
});

});


