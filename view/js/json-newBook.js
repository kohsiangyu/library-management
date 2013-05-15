$(document).ready(function(){
	//attach a jQuery live event to the button
	$('#newbookform').on('submit', function(){
		// alert("test");
		$.ajax({
			type: "POST",
			url: 'addnewbook.php',
			async: false,
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
				if(data == "success"){
					$('#newbookform').after(
						'<div class="alert alert-success span5">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong>Success!</strong>'+
						'  Your book is now avaliable in the PolorLib'+
						'</div>'
					);
				}else if(data == "failure"){
					$('#newbookform').after(
						'<div class="alert alert-error span5">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong>Failure!</strong>'+
						'  Your avaliable in the PolorLib'+
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
