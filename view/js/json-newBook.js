$(document).ready(function(){
	//attach a jQuery live event to the button
	$('form').on('submit', function(){
		alert("test");
		$.ajax({
			type: "POST",
			url: 'addnewBook.php',
			async: false,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
				},
			data     : $(this).serialize(),
			dataType: "json",
			success: function(data){
				alert(data); //uncomment this for debug
			}
		});

		return false;
	});
});
