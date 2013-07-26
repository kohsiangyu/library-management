$(document).ready(function(){
	//attach a jQuery live event to the button
	$('a[href=#books]').on('click', function(){
		$('#books select').html("");
		text = "<option></option>";
		$('#books select').append(text);
		text = "<option value='蓋亞'>蓋亞</option>";
		$('#books select').append(text);
		text = "<option value='Flags'>Flags</option>";
		$('#books select').append(text);

		$.ajax({
			type	: "POST",
			url		: 'action.php',
			async	: false,
			beforeSend	: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			dataType	: "json",
			data		: {"action":"getBooks"},
			success: function(data){
						listBooks("#books", data);
						addControls("#books");
					}
		});
	});

	$('#books select').on('change', function(){
		$.ajax({
			type: "POST",
			url: 'action.php',
			async: true,
			beforeSend: function(x){
					if(x && x.overrideMimeType){
						x.overrideMimeType("application/j-son;charset=UTF-8");
					}
			},
			data     : {"PUBLISHER":$(this).val(), "action":"getBooksByCategory"},
			dataType: "json",
			success: function(data){
						listBooks("#books", data);
						addControls("#books");
					}
		});
	});
});

