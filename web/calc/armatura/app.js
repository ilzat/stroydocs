
$(document).ready(function () {

$("#size").change(function(){
	culc();
	reset_value();
});
function reset_value(){
	$("#len").val(''); 
	$("#weight").val(''); 
}

function culc() {
	var size = Number($("#size").val());
	var weight_1m = 3.1415 * (size/1000/2) * (size/1000/2) * 7850;
	$("#weight_1m").val(number_good_view(weight_1m, 3));
}
$("#len").keyup(function(){
	valid_num_with_return("#len", 0, 1000000, 3);
	var weight_1m = Number($("#weight_1m").val());
	var len = Number($("#len").val());
	$("#weight").val(number_good_view(len * weight_1m, 3));
});
$("#weight").keyup(function(){
	valid_num_with_return("#weight", 0, 1000000, 3);
	var weight_1m = Number($("#weight_1m").val());
	var weight = Number($("#weight").val());
	$("#len").val(number_good_view(weight / weight_1m, 3));
});










culc();

});