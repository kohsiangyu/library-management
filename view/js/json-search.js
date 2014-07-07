$(document).ready(function(){
	//attach a jQuery live event to the button
	$('#searchform').on('submit', function(){
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
				// alert(data.ID); //uncomment this for debug
				$('#searchform #ID').val(data.data[0].ID);
				$('#searchform #NAME').val(data.data[0].NAME);
				$('#searchform #PUBLISHER').val(data.data[0].PUBLISHER);
				$('#searchform #STOCKDATE').val(data.data[0].STOCKDATE);
			}
		});

		return false;
	});
});
