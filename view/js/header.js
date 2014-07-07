
function listBorrows(target, data){
	$(target+' tbody').html("");

	for(i=0;i<data.data.length;i++){
		text = "<tr>"+
				"<td><span class='badge'>"+(i+1)+"</span></td>"+
				"<td class='identifier'>"+data.data[i].BOOK_ID+"</td>"+
				"<td>"+data.data[i].EXPIRE+"</td>"+
				"<td><button class='btn btn-mini btn-warning' type='button'>Return</button></td>"+
				"</tr>";
		$(target+' tbody').append(text);
	}
}

function listBooks(target, data){
	$(target+' tbody').html("");

	for(i=0;i<data.data.length;i++){
		text = "<tr>"+
				"<td><span class='badge'>"+(i+1)+"</span></td>"+
				"<td><span class='label label-info'>"+data.data[i].PUBLISHER +"</span></td>"+
				"<td>"+data.data[i].NAME+"</td>"+
				"<td class='identifier'>"+data.data[i].ID+"</td>"+
				"<td>"+data.data[i].STOCKDATE+"</td>"+
				"<td>"+
				"<button class='btn btn-mini btn-warning' type='button'>Borrow</button> "+
				"<button class='btn btn-mini btn-danger' type='button'>Delete</button> "+
				"</td>"+
				"</tr>";
		$(target+' tbody').append(text);
	}
}

function showStatus(target, data, place){
	if(data.status == "success"){
		text = '<div class="alert alert-success span6">'+
				'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				'<strong>Success!</strong>'+
				'  Your book is now avaliable in the PolorLib'+
				'</div>';
		if(place == "before"){
			$(target+' table').before(text);
		}else if(place == "after"){
			$(target+' table').after(text);
		}else{
			alert("Undefined error on place to put the alert!");
		}
	}else if(data.status == "fail"){
		text = '<div class="alert alert-error span6">'+
				'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				'<strong>Failure!</strong>'+
				'  Something wrong happend!'+
				'</div>';
		if(place == "before"){
			$(target+' table').before(text);
		}else if(place == "after"){
			$(target+' table').after(text);
		}else{
			alert("Undefined error on place to put the alert!");
		}
	}else{
		alert("Undefined Error!");
	}
}

function addControls(target){
	$(target+' button').on('click', function(){
		if($(this).text() == "Return"){
			$.ajax({
				type: "POST",
				url: 'action.php',
				async: false,
				beforeSend: function(x){
						if(x && x.overrideMimeType){
							x.overrideMimeType("application/j-son;charset=UTF-8");
						}
					},
				data     : {"bookID":$(this).parent().parent().children('.identifier').text(),
							"action":"removeRecord"},
				dataType: "json",
				success: function(data){
					$('a[href='+target+']').click();
					showStatus(target, data, "after");
				}
			});
		}else if($(this).text() == "Borrow"){
			//alert("Borrow Submit");
			$.ajax({
				type: "POST",
				url: 'action.php',
				async: true,
				beforeSend: function(x){
						if(x && x.overrideMimeType){
							x.overrideMimeType("application/j-son;charset=UTF-8");
						}
					},
				data     : {"ID":$(this).parent().parent().children('.identifier').text(),
							"action":"addNewRecord"},
				dataType: "json",
				success: function(data){
					showStatus(target, data, "before");
				}
			});
		}else if($(this).text() == "Delete"){
			$.ajax({
				type: "POST",
				url: 'action.php',
				async: false,
				beforeSend: function(x){
						if(x && x.overrideMimeType){
							x.overrideMimeType("application/j-son;charset=UTF-8");
						}
					},
				data     : {"bookID":$(this).parent().parent().children('.identifier').text(),
							"action":"getBookDelete"},
				dataType: "json",
				success: function(data){
					$('a[href='+target+']').click();
					showStatus(target, data, "before");
				}
			});
			//$('a[href=#books]').click();
		}else{
			alert($(this).text());
		}
	});
}
