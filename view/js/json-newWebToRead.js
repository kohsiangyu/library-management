$(document).ready(function(){
	//attach a jQuery live event to the button
	$('#AddWebToReadForm').on('submit', function(){
		// alert("test");
		$.ajax({
			type: "POST",
			url: 'action.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
				},
			data     : $(this).serialize(),
			dataType: "json",
			success: function(data){
				// console.log(data);
				// alert(data); //uncomment this for debug
				if(data['status'] == "success"){
					$('#AddWebToReadForm').after(
						'<div class="alert alert-success span6">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong>Success!</strong>'+
						'  Your book is now avaliable in the PolorLib'+
						'</div>'
					);
					$('#AddWebToReadForm #url').val("");
					$('#AddWebToReadForm #description').val("");
				}else if(data['status'] == "fail"){
					$('#AddWebToReadForm').after(
						'<div class="alert alert-error span6">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong>Failure!</strong>'+
						'  Something wrong happend!'+
						'</div>'
					);
				}else{
					alert("Undefined Error!");
				}
			}
		});

		return false;
	});
});
