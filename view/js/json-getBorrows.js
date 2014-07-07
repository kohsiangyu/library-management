$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#listborrows"]').on('click', function(){
		$.ajax({
			type	: "POST",
			url		: 'action.php',
			async	: false,
			beforeSend	: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType	: "json",
			data		: {"action":"getBorrows"},
			success: function(data){
				// alert(data[0].NAME); //uncomment this for debug
				// $('#personal #ID').val(data.ID);

				if(data.status == "success"){
					listBorrows("#listborrows", data);
					addControls("#listborrows");
				}
			}
		});
	});
});
