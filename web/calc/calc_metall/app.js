$(document).ready(function () {
    	
});


$("#img_menu button").click(function(){
	
	$("#img_menu button").each(function(indx, element){
		$(this).removeClass("active");
	});
	$(this).addClass("active");
	
	prokat_type = this.id.substring(4, this.id.length);	
	
	load_profile(prokat_type);
});


function load_profile(prokat_type) {
	
	$.post('/calc_metall/profile_taken',
		{ 'prokat_type':prokat_type },
		
		// когда Web-сервер отвечает на запрос
		function(data) {
			$('#profile').html(data);
			
			
			load_size();
		}
	);
	reset_value();  
}

$('select[name="profile"]').change(function(){
    load_size();
    reset_value();    
});

function load_size () {
  
  profile = $('select[name="profile"]').val().toString();
  
  $.post('/calc_metall/size_taken',
    { 'profile':profile },
    
    // когда Web-сервер отвечает на запрос
    function(data) {
      
      // меняем статус документа
      switch (data.status) {
         case "1":
            $('#normat_status').html('<span class="label label-success">действует</span>');
            break;
         case "0":
            $('#normat_status').html('<span class="label label-warning">отменен</span>');
            break;
         default:
            $('#normat_status').html('<span class="label label-default">неизвестно</span>');
            break;
      }
      
      
      $('#size').html(data.size);
      $("#size :first").attr("selected", "selected");
      $('#size_desc').html(data.size_desc);
      
      $('#prop_lin_prokat').hide();
      $('#prop_list_prokat').hide();
      switch (data.pattern) {
         case "lin_prokat":
            $('#prop_lin_prokat').show();
            weight_1_m_count();
            break;
         case "list_prokat":
            $('#prop_list_prokat').show();
            break;
         default:
            alert("Ошибка pattern!");
            break;
      }
    }, "json"
  );  
}

$('select[name="size"]').change(function(){
    weight_1_m_count();
    reset_value();
});

function weight_1_m_count() {
  
  size = $('select[name="size"]').val().toString();
  
  $.post('/calc_metall/weight_1_m_taken',
    { 'size':size },
    
    // когда Web-сервер отвечает на запрос
    function(data) {
      $('#weight_1_m_str').html(data);
      
      var weight_1_m = data;      
    }
  );
}

function reset_value() {
    $('input[name="length"]').val(''); 
    $('input[name="width"]').val(''); 
    $('input[name="weight"]').val(''); 
}

$('input[name="length"]').keyup(function(){
    valid_num_with_return ("#length", 0, 1000000, 3);
    weight_1_m = Number($("#weight_1_m_str").text());
    length = Number($('input[name="length"]').val()); 
    weight = number_good_view((length * weight_1_m),3);
    $('input[name="weight"]').val(weight);
    
}); 
$('input[name="weight"]').keyup(function(){
    valid_num_with_return ("#weight", 0, 1000000, 3);
    weight_1_m = Number($("#weight_1_m_str").text());
    weight = Number($('input[name="weight"]').val()); 
    length = number_good_view((weight / weight_1_m),3);
    $('input[name="length"]').val(length);
});

/////////////////////////////////////////////


$("#add_to_spec").click(function(){
	
	var add_name = $('select[name="profile"] option:selected').text();
	
	var add_weight = Number($('input[name="weight"]').val());
	
	var add_pattern = $('select[name="profile"] option:selected').data("pattern");
	
	var add_length = Number($('input[name="length"]').val());
	
    var add_desc = $("#size_desc").html();
	
	var add_size = $('select[name="size"] option:selected').text();
	
	if (add_weight > 0) {
		
		var lineArr = new Array (add_name, add_weight, add_pattern, add_length, add_size, add_desc);
	
		specArr.push(lineArr);
		
		draw_table();
	}	
});


function draw_table(){
	
	var tbody = new String();
	
	var spec_weight = new Number();
	
	for (var key in specArr) { 
		var val = specArr [key];
		
		key_1 = Number(key) + 1;
		
		tbody = tbody + '<tr id ="row_' + key_1 + '">';
		
		tbody = tbody + '<td>' + key_1 + '</td>';
		
		if (val[2] == 'lin_prokat') {
			tbody = tbody + '<td>' + val[0] + ', ' + val[5] + ' ' + val[4] + ', L = ' + val[3] + ' м.</td>';
		} else {
			tbody = tbody + '<td>error</td>';
		}		
		
		tbody = tbody + '<td>' + val[1] + '</td>';
		tbody = tbody + '<td><button type="button" class="btn btn-warning btn-xs del_line" id="del_line_' + key_1 + '"><i class="fa fa-times-circle"></i></button></td>';
		tbody = tbody + '<tr>';
		
		spec_weight = spec_weight + Number(val[1]);
	} 
	
	$(".spec tbody").html(tbody);
	
	$("#result").html(number_good_view(spec_weight,2));	
}


$('.spec').on('click', '.del_line', function(e){
	
	id = this.id.substring(9, this.id.length);
	
	specArr.splice(id-1, 1);
	
	draw_table();
});


$("#save_btn").click(function(){
	
		if (specArr.length < 1) {
			alert('Спецификация пока пуста');
		} else {
			// отправляем массив на сервер
			$.post('/calc_metall/save',
				{ 'specArrJSON':JSON.stringify(specArr) },
				
				// когда Web-сервер отвечает на запрос
				function(data) {
					if (data > 0) {
						$("#save_result").slideDown('2000', function() {
							$('#link').val('http://stroydocs.com/kalkulyator_metalloprokata/spec/' + data);
							$('#link_2').attr('href', 'http://stroydocs.com/kalkulyator_metalloprokata/spec/' + data);
						});
					} else {
						alert('Ошибка сохранения в базу данных (');
					}
				}
			);
		}
		
		
		
});


function spec_view() {
    specArr = JSON.parse(specArrJSON);
    draw_table();
    $('#link').val('http://stroydocs.com/kalkulyator_metalloprokata/spec/' + id);
}







	





