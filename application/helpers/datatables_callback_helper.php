<?php
// Callback Functions
function callback_status ($status){
  switch ($status) {
    case 1:
        return '<span class="label label-success">действующий</span>';
        break;
    case 0:
        return '<span class="label label-warning">отменен</span>';
        break;
    default:
        return '<span class="label label-default">неизвестно</span>';
  }
}
function callback_part ($part){
  switch ($part) {
    case "gost":
        return 'ГОСТ';
        break;
    case "snip":
        return 'СНИП';
        break;
    case "tu":
        return 'ТУ';
        break;
    default:
        return '';
  }
}


?>
