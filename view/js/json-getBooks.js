$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href=#books]').on('click', function(){
		$('#books select').html("");
		text = "<option></option>";
		$('#books select').append(text);
		text = "<option>蓋亞</option>";
		$('#books select').append(text);
		text = "<option>Flags</option>";
		$('#books select').append(text);

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
							"<td class='identifier'>"+data[i].ID+"</td>"+
							"<td>"+data[i].STOCKDATE+"</td>"+
							"<td><button class='btn btn-mini btn-warning' type='button'>Borrow</button></td>"+
							"</tr>";
					$('#books tbody').append(text);
				}
				$('#books button').on('click', function(){
					alert($(this).parent().parent().children('.identifier').text());
				});
			}
		});
	});

	$('#books select').on('change', function(){
		$.ajax({
			type: "POST",
			url: 'getCatBooks.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			data     : {"PUBLISHER":$(this).val()},
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
