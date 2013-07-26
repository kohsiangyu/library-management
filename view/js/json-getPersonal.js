$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#personal"]').on('click', function(){
		$.ajax({
			type: "POST",
			url: 'action.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType: "json",
			data		: {"action":"getPersonalInfo"},
			success: function(data){
				//alert(data); //uncomment this for debug
				newData(data);
			}
		});
	});
	$('a[href="#personal"]').click();
});

function newData(data){
	$('#personal #ID').val(data.data[0].ID);
	$('#personal #TYPE').val(data.data[0].TYPE);
	$('#personal #STUDENT_ID').val(data.data[0].STUDENT_ID);
	$('#personal #SOCIAL_ID').val(data.data[0].SOCIAL_ID);
	$('#personal #NAME').val(data.data[0].NAME);
	$('#personal #EMAIL').val(data.data[0].EMAIL);
	$('#personal #BIRTH').val(data.data[0].BIRTH);
}
