$(document).ready(function(){
	//attach a jQuery live event to the button
	$('#searchform').on('submit', function(){
		// alert("test");
		$.ajax({
			type: "POST",
			url: 'getSearch.php',
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
				$('#searchform #ID').val(data.ID);
				$('#searchform #NAME').val(data.NAME);
				$('#searchform #PUBLISHER').val(data.PUBLISHER);
				$('#searchform #STOCKDATE').val(data.STOCKDATE);
			}
		});

		return false;
	});
});
