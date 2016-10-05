
function valid_num (field_id, field_name, min, max, floating) {
  
  var error = false;
  var errorT = '';
  
  var value = $("#" + field_id).val();
  value = value.replace(",", ".");
  
  var length = value.length;
  
  
  
  if (length == 0) {
    error = true;
    errorT = errorT + 'Поле "' + field_name + '" должно быть заполнено<br/>';
  } else
  
  var num_pattern = new RegExp("^[0-9]{1,"+ length +"}[.]{0,1}[0-9]{0,"+ floating +"}$");
  if(!value.match(num_pattern)) {
    error = true;
    errorT = errorT + 'Поле "' + field_name + '" содержит запрещенные сиволы<br/>';
  } else
  
  if(Number(value) < min) {
    error = true;
    errorT = errorT + 'Поле "' + field_name + '" должно быть больше ' + min + '<br/>';
  } else
  
  if(Number(value) > max) {
    error = true;
    errorT = errorT + 'Поле "' + field_name + '" должно быть меньше ' + max + '<br/>';
  }
  
  
  
  if (!error) {
    $("#" + field_id).parent().parent().removeClass("has-error")
    
    $("#" + field_id).val(value);    
    return true;    
  } else {
    $("#" + field_id).parent().parent().addClass("has-error")
    
    var n = noty({
      text: errorT,
      type: 'error',
      layout: 'top',
      timeout: 3000
    });
    return false;
  }
}
function valid_num_with_return (field, min, max, floating) {
  
  var error = false;
  
  var value = $(field).val();
  value = value.replace(",", ".");
  
  var length = value.length;
  
  if (Number(value) == 0) {
  	error = false;
  } else
  
  var num_pattern = new RegExp("^[0-9]{1,"+ length +"}[.]{0,1}[0-9]{0,"+ floating +"}$");
  if(!value.match(num_pattern)) {
    error = true;
  } else
  
  if(Number(value) < min) {
    error = true;
  } else
  
  if(Number(value) > max) {
    error = true;
  }  
  
  if (error) {    
  	value = value.substring(0, value.length - 1);
    $(field).val(value);    
    return false;    
  } else {
  	$(field).val(value); 
    return true;
  }
}