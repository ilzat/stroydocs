$(document).ready(function() {
poll_id = $("#poll_id").val();
$(function(){
	var loader=$('#loader');
	var pollcontainer=$('#pollcontainer');
	var path = '/pages/pollsAjax/'+poll_id;
	loader.fadeIn();
	//Load the poll form
	$.get(path, '', function(data, status){
		pollcontainer.html(data);
		animateResults(pollcontainer);
		pollcontainer.find('#viewresult').click(function(){
			//if user wants to see result
			loader.fadeIn();
			$.get(path, 'result=1', function(data,status){
				pollcontainer.fadeOut(1000, function(){
					$(this).html(data);
					animateResults(this);
				});
				loader.fadeOut();
			});
			//prevent default behavior
			return false;
		}).end()
		.find('#pollform').submit(function(){
			var selected_val=$(this).find('input[name=poll]:checked').val();
			if(selected_val!=''){
				//post data only if a value is selected
				loader.fadeIn();
				$.post(path, $(this).serialize(), function(data, status){
					$('#formcontainer').fadeOut(100, function(){
						$(this).html(data);
						animateResults(this);
						loader.fadeOut();
					});
				});
			}
			//prevent form default behavior
			return false;
		});
		loader.fadeOut();
	});
	
	function animateResults(data){
		$(data).find('.bar').hide().end().fadeIn('slow', function(){
							$(this).find('.bar').each(function(){
								var bar_width=$(this).css('width');
								$(this).css('width', '0').animate({ width: bar_width }, 1000);
							});
						});
	}
	
});


}); // end of $(document).ready(function()