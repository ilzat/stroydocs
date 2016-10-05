$(document).ready(function () {
	
$('select[name="convert_type"]').change(function(){	
	var url = "/converter/" + $('select[name="convert_type"]').val().toString();
	$(location).attr('href',url);
});

}); // end of $(document).ready(function ()

function lineal_calc(key, convert_array) {
	
	var field = $('#text_'+key);
	 
	valid_num_with_return(field, 0, 1000000, 3);
	
	field.css("color", "red");
	
	var value = Number(field.val());
	
	for (var arrKey in convert_array) { 
		var val = convert_array [arrKey];
		if (arrKey != key) {
			var number = 0;
			number = value * (convert_array[arrKey]) / convert_array[key];
			$('#text_'+arrKey).val(number_good_view((number),10));
			$('#text_'+arrKey).css( "color", "" ); 
		}
	}
	
}
//********************************************************* sila start
function sila_convert(key) {
	
	var convert_array = new Array();  
	convert_array.push(1); // 0 - N
	convert_array.push(0.001); // 1 - kN
	convert_array.push(0.000001); // 2 - mN
	convert_array.push(0.10197162129); // 3 - кг
	convert_array.push(0.00010197162); // 4 - т
	
	lineal_calc(key, convert_array);
}
//********************************************************* sila end

//********************************************************* lin_size start
function lin_size_convert(key){
  
  var convert_array = new Array();  
  convert_array.push(1); // 0 - Километр
  convert_array.push(1000); // 1 - Метр
  convert_array.push(100000); // 2 - Сантиметр
  convert_array.push(1000000); // 3 - Миллиметр
  convert_array.push(39370.0787401575); // 4 - Дюйм
  convert_array.push(1406.07424071991); // 5 - Аршин
  convert_array.push(0.937382827146607); // 6 - Верста
  convert_array.push(22497.1878515186); // 7 - Вершок
  convert_array.push(0.539956803455724); // 8 - Миля морская (уставн.)
  convert_array.push(0.539665407447383); // 9 - Миля морская (англ.)
  convert_array.push(468.691413573303); // 10 - Сажень
  convert_array.push(3280.83989501312); // 11 - Фут
  convert_array.push(1093.61329833771); // 12 - Ярд

  lineal_calc(key, convert_array);
}
//********************************************************* lin_size end

//********************************************************* square start
function square_convert(key){
	
	var convert_array = new Array();  
	convert_array.push(1); // 0
	convert_array.push(1000000); // 1
	convert_array.push(10000000000); // 2
	convert_array.push(1000000000000); // 3
	convert_array.push(1550003100.0062); // 4
	convert_array.push(247.105163015276); // 5
	convert_array.push(10000); // 6
	convert_array.push(100); // 7
	convert_array.push(0.878688294114546); // 8
	convert_array.push(0.386101876841223); // 9
	convert_array.push(219672.073528636); // 10
	convert_array.push(10763915.0511824); // 11
	convert_array.push(1195990.56124249); // 12
	
	lineal_calc(key, convert_array);
}
//********************************************************* square end

//********************************************************* volume start
function volume_convert(key){
	
	var convert_array = new Array();  
	convert_array.push(1); // 0
	convert_array.push(1000000); // 1
	convert_array.push(1000000000); // 2
	convert_array.push(61023.7440947323); // 3
	convert_array.push(1000); // 4
	convert_array.push(81.3047790949152); // 5
	convert_array.push(0.102958212016002); // 6
	convert_array.push(2.77987172443205); // 7
	convert_array.push(35.3146667214886); // 8
	convert_array.push(1.30795061931439); // 9
	
	lineal_calc(key, convert_array);
}
//********************************************************* volume end

//********************************************************* angles start
function angles_convert(key){
	
	var convert_array = new Array();  
	convert_array.push(1); // 0
	convert_array.push(0.0174532925199684); // 1
	
	lineal_calc(key, convert_array);
}
//********************************************************* angles end

//********************************************************* times start
function times_convert(key){
	
	var convert_array = new Array();  
	convert_array.push(1); // 0
	convert_array.push(60); // 1
	convert_array.push(3600); // 2
	
	lineal_calc(key, convert_array);
}
//********************************************************* times end

//********************************************************* raspred_sila start

function raspred_sila(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	if (line == 1) {
		text_2 = text_1 * select_1_1 / select_2_1 * select_2_2 / select_1_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * select_2_1 / select_1_1 * select_1_2 / select_2_2;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* raspred_sila end

//********************************************************* pressure start
function pressure(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	// база - 1 Па 
	var k_line_1;
	if (select_1_1 == 10 || select_1_1 == 10000 || select_1_1 == 10000000) {
		$('.opt_1').hide();
		k_line_1 = select_1_1 / 10;
	} else {
		$('.opt_1').show();
		k_line_1 = select_1_1 / select_1_2;
	}
	var k_line_2;
	if (select_2_1 == 10 || select_2_1 == 10000 || select_2_1 == 10000000) {
		$('.opt_2').hide();
		k_line_2 = select_2_1 / 10;
	} else {
		$('.opt_2').show();
		k_line_2 = select_2_1 / select_2_2;		
	}
	
	if (line == 1) {
		text_2 = text_1 * k_line_1 / k_line_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * k_line_2 / k_line_1;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* pressure end

//********************************************************* weight start
function weight(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	if (line == 1) {
		text_2 = text_1 * select_1_1 / select_2_1 * select_2_2 / select_1_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * select_2_1 / select_1_1 * select_1_2 / select_2_2;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* weight end

//********************************************************* speed start
function speed(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	if (line == 1) {
		text_2 = text_1 * select_1_1 / select_2_1 * select_2_2 / select_1_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * select_2_1 / select_1_1 * select_1_2 / select_2_2;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* speed end

//********************************************************* acceleration start
function acceleration(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	// база - 1 км/час 
	var k_line_1;
	if (select_1_1 == 127137.6) {
		$('.opt_1').hide();
		k_line_1 = 1 / 12960000 * 127137.6;
	} else {
		$('.opt_1').show();
		k_line_1 = select_1_1 / select_1_2;
	}
	var k_line_2;
	if (select_2_1 == 127137.6) {
		$('.opt_2').hide();
		k_line_2 = 1 / 12960000 * 127137.6;
	} else {
		$('.opt_2').show();
		k_line_2 = select_2_1 / select_2_2;		
	}
	
	if (line == 1) {
		text_2 = text_1 * k_line_1 / k_line_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * k_line_2 / k_line_1;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* acceleration end

//********************************************************* moments start
function moments(line) {
	 
	valid_num_with_return($('#text_1'), 0, 1000000, 3);
	valid_num_with_return($('#text_2'), 0, 1000000, 3);
	
	var text_1 = Number($('#text_1').val());
	var select_1_1 = Number($('#select_1_1').val());
	var select_1_2 = Number($('#select_1_2').val());
	var text_2 = Number($('#text_2').val());
	var select_2_1 = Number($('#select_2_1').val());
	var select_2_2 = Number($('#select_2_2').val());
	
	if (line == 1) {
		text_2 = text_1 * select_1_1 / select_2_1 / select_2_2 * select_1_2;
		$('#text_2').val(number_good_view((text_2),10));
	} else {
		text_1 = text_2 * select_2_1 / select_1_1 / select_1_2 * select_2_2;
		$('#text_1').val(number_good_view((text_1),10));
	}		
}
//********************************************************* moments end
