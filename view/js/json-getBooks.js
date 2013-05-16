$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#books"]').on('click', function(){
		$.ajax({
			type: "POST",
			url: 'getBooks.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType: "json",
			success: function(data){
				// alert(data[0].NAME); //uncomment this for debug
				// $('#personal #ID').val(data.ID);
				$('#books tbody').html("");

				for(i=0;i<data.length;i++){
					text = "<tr>"+
							"<td><span class='badge'>"+(i+1)+"</span></td>"+
							"<td><span class='label label-info'>"+data[i].PUBLISHER +"</span></td>"+
							"<td>"+data[i].NAME+"</td>"+
							"<td>"+data[i].ID+"</td>"+
							"<td>"+data[i].STOCKDATE+"</td>"+
							"</tr>";
					$('#books tbody').append(text);
				}
			}
		});
	});
});
