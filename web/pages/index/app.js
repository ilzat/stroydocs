$(document).ready(function() {

$("#index .col-sm-3").hover(

function() { 
	$(this).find('.box').removeClass("box-info").addClass("box-danger");
	},
function() { 
	$(this).find('.box').removeClass("box-danger").addClass("box-info");
	}
);




}); // end of $(document).ready(function()