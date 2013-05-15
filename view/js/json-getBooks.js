$(document).ready(function(){
	//attach a jQuery live event to the button
//	$('#books').ready(function(){
		$.ajax({
			type: "GET",
			url: 'getBooks.php',
			async: false,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType: "json",
			success: function(data){
				// alert(data[0].NAME); //uncomment this for debug
				// $('#personal #ID').val(data.ID);
				for(i=0;i<data.length;i++){
					text = "<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td><span class='label'>"+data[i].PUBLISHER +"</span></td>"+
							"<td>"+data[i].NAME+"</td>"+
							"<td>"+data[i].ID+"</td>"+
							"<td>"+data[i].STOCKDATE+"</td>"+
							"</tr>";
					$('tbody').append(text);
				}
			}
		});
//	});
});
