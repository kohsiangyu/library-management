$(document).ready(function(){
	$('form').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type     : "POST",
			cache    : false,
			url      : $(this).attr('action'),
			data     : $(this).serialize(),
			success  : function(data) {
							$(#debug).html("test");
						}
		});
		return false;
	});

});
