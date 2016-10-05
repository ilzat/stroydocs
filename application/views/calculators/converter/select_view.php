<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function selected($converter_name){
	$ci =& get_instance();
	if ($converter_name == $ci->uri->segment(2)) {
		return 'selected="selected"';
	}
}
?>
<div style="float: left; margin-top: 5px;">Конвертировать:&nbsp; </div>
<select class="form-control" style="float: left; width: 220px;" name="convert_type">
	<option value="sila" <?=selected('sila');?>>Силы</option>
	<option value="raspred_sila" <?=selected('raspred_sila');?>>Распределенные силы</option>
	<option value="pressure" <?=selected('pressure');?>>Давления</option>
	<option value="weight" <?=selected('weight');?>>Удельные веса</option>
	<option value="lin_size" <?=selected('lin_size');?>>Линейные размеры</option>
	<option value="square" <?=selected('square');?>>Площади</option>
	<option value="volume" <?=selected('volume');?>>Объемы</option>
	<option value="speed" <?=selected('speed');?>>Скорости</option>
	<option value="acceleration" <?=selected('acceleration');?>>Ускорения</option>
	<option value="moments" <?=selected('moments');?>>Моменты</option>
	<option value="angles" <?=selected('angles');?>>Углы</option>
	<option value="times" <?=selected('times');?>>Времена</option>
</select>