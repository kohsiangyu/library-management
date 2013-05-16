$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#personal"]').on('click', function(){
		$.ajax({
			type: "POST",
			url: 'getPersonal.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType: "json",
			success: function(data){
				//alert(data); //uncomment this for debug
				$('#personal #ID').val(data.ID);
				$('#personal #TYPE').val(data.TYPE);
				$('#personal #STUDENT_ID').val(data.STUDENT_ID);
				$('#personal #SOCIAL_ID').val(data.SOCIAL_ID);
				$('#personal #NAME').val(data.NAME);
				$('#personal #EMAIL').val(data.EMAIL);
				$('#personal #BIRTH').val(data.BIRTH);
			}
		});
	});
	$('a[href="#personal"]').click();
});
