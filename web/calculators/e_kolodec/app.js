$(document).ready(function() {
  
///////////////////////////////////////////////////////////////////////////
$("#depth").keyup(function(){
  valid_num ("depth", "Глубина", 2000, 10000, 0);
});


///////////////////////////////////////////////////////////////////////////
$('#form').submit(function(){
  return check_form();
});

function check_form(){
  
  // предварительная проверка
  var error = false;
  var fieldsArr = new Array ("depth");
  
  for (var key in fieldsArr) { // проверяем все поля
    var val = fieldsArr [key];
    if ($("#" + val).parent().parent().hasClass("has-error"))
    error = true; 
  }
  
  if (!error) { // если ошибок нет
    // старт общей проверки
    var depth = Number($("#depth").val());
    var h_work = Number($("#h_work").val());
    
    var error = false;
    var errorT = '';
    if((depth - h_work) < 450) {
      error = true;
      errorT = errorT + 'Ошибка, высота засыпки от перекрытия колодца до уровня земли должна быть более 0,5 м. см. п. 14.27 СНиП 2.04.02-84*. Уменьшите высоту рабочей части';
    }
    if (!error) {
      return true;    
    } else {
    var n = noty({
      text: errorT,
      type: 'error',
      layout: 'top',
      timeout: 5000
    });
      return false;
    }
    
    
  } else { // не прошли предварительную проверку
    return false;
  }
       

    
}










































///////////////////////////////////////////////////////////////////////////
}); // end of $(document).ready(function()