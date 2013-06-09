$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href="#listborrows"]').on('click', function(){
		$.ajax({
			type	: "POST",
			url		: 'action.php',
			async	: true,
			beforeSend	: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType	: "json",
			data		: {"action":"getBorrows"},
			success: function(data){
				// alert(data[0].NAME); //uncomment this for debug
				// $('#personal #ID').val(data.ID);
				$('#listborrows tbody').html("");

				if(data.status == "success"){
				for(i=0;i<data.data.length;i++){
					text = "<tr>"+
							"<td><span class='badge'>"+(i+1)+"</span></td>"+
							"<td class='identifier'>"+data.data[i].BOOK_ID+"</td>"+
							"<td>"+data.data[i].EXPIRE+"</td>"+
							"<td><button class='btn btn-mini btn-warning' type='button'>Return</button></td>"+
							"</tr>";
					$('#listborrows tbody').append(text);
				}

				$('#listborrows button').on('click', function(){
					// alert("test");
					$.ajax({
						type: "POST",
						url: 'removerecord.php',
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
								$('#listborrows table').after(
									'<div class="alert alert-success span6">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong>Success!</strong>'+
									'  Your book is now avaliable in the PolorLib'+
									'</div>'
								);
							}else if(data == "failure"){
								$('#listborrows table').after(
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
				});
				}
			}
		});
	});
});
