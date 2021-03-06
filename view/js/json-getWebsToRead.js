$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href=#WebsToReadPage]').on('click', function(){
		$('#books select').html("");
		text = "<option></option>";
		$('#books select').append(text);
		text = "<option>蓋亞</option>";
		$('#books select').append(text);
		text = "<option>Flags</option>";
		$('#books select').append(text);

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
			data		: {"action":"getWebsToRead"},
			success: function(data){
				// alert(data[0].NAME); //uncomment this for debug
				// $('#personal #ID').val(data.ID);
				$('#WebsToReadPage tbody').html("");

				for(i=0;i<data.data.length;i++){
					text = "<tr>"+
							"<td><span class='badge'>"+(i+1)+"</span></td>"+
							"<td class='second'><span class='label label-info'>"+data.data[i].date+"</span></td>"+
							"<td class='third'>"+data.data[i].description+"</td>"+
							"<td class='fourth'><a href='"+data.data[i].url+"' target='_blank'>"+data.data[i].url+"</a></td>"+
							"<td>"+
							"<button class='btn btn-mini btn-danger' type='button'>Delete</button> "+
							"</td>"+
							"</tr>";
					$('#WebsToReadPage tbody').append(text);
				}

				$('#WebsToReadPage button').on('click', function(){
					if($(this).text() == "Borrow"){
						alert("Borrow Submit");
						$.ajax({
							type: "POST",
							url: 'addnewrecord.php',
							async: true,
							beforeSend: function(x){
									if(x && x.overrideMimeType){
										x.overrideMimeType("application/j-son;charset=UTF-8");
									}
								},
							data     : {"ID":$(this).parent().parent().children('.identifier').text()},
							dataType: "json",
							success: function(data){
								// console.log(data);
								// alert(data); //uncomment this for debug
								if(data == "success"){
									$('#books table').before(
										'<div class="alert alert-success span6">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong>Success!</strong>'+
										'  Your book is now avaliable in the PolorLib'+
										'</div>'
									);
								}else if(data == "failure"){
									$('#books table').before(
										'<div class="alert alert-error span6">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong>Failure!</strong>'+
										'  Something wrong happend!'+
										'</div>'
									);
								}else{
									alert("Undefined Error!");
								}
							}
						});
					}else if($(this).text() == "Delete"){
						$.ajax({
							type: "POST",
							url: 'getDelete.php',
							async: true,
							beforeSend: function(x){
									if(x && x.overrideMimeType){
										x.overrideMimeType("application/j-son;charset=UTF-8");
									}
								},
							data     : {"ID":$(this).parent().parent().children('.identifier').text()},
							dataType: "json",
							success: function(data){
								// console.log(data);
								// alert(data); //uncomment this for debug
								if(data == "success"){
									$('#books table').before(
										'<div class="alert alert-success span6">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong>Success!</strong>'+
										'  Your book is now avaliable in the PolorLib'+
										'</div>'
									);
								}else if(data == "failure"){
									$('#books table').before(
										'<div class="alert alert-error span6">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong>Failure!</strong>'+
										'  Something wrong happend!'+
										'</div>'
									);
								}else{
									alert("Undefined Error!");
								}
							}
						});
						$('a[href=#books]').click();
					}else{
						alert($(this).text());
					}
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
