$(document).ready(function(){
	//attach a jQuery live event to the button
	$('#getdata-button').on('click', function(){
		$.ajax({
			type: "GET",
			url: 'json-data.php',
			async: false,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
				},
			dataType: "json",
			success: function(data){
				//alert(data); //uncomment this for debug
				//alert (data.item1+" "+data.item2+" "+data.item3); //further debug
				$('#showdata').html("<p>item1="+data.item1+" item2="+data.item2+" item3="+data.item3+"</p>");
			}
		});
	});
});
