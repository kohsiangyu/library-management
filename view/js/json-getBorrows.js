$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#listborrows"]').on('click', function(){
		$.ajax({
			type: "POST",
			url: 'getBorrows.php',
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
				$('#listborrows tbody').html("");

				for(i=0;i<data.length;i++){
					text = "<tr>"+
							"<td><span class='badge'>"+(i+1)+"</span></td>"+
							"<td>"+data[i].BOOK_ID+"</td>"+
							"<td>"+data[i].EXPIRE+"</td>"+
							"</tr>";
					$('#listborrows tbody').append(text);
				}
			}
		});
	});
});
