// JavaScript Document
$(function() {
	$(".delete").click(function(){
		var src = $(this).attr('href');
		var element = $(this);
		var del_id = element.attr("id");
		var info = 'id=' + del_id;
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				type: "POST",
				url: src+info,
				data: info,
				success: function(){
					$("#hide"+del_id).hide(2500);
					$("#hide"+del_id).css("backgroundColor", "#dd4b39");
				}
			});
		}
		return false;
	});
});


$(document).on('click', '.approved', function() {
	var src = $(this).attr('href');
	var the = $(this);
	var id = $(this).attr('id');
	$('#looder'+id).show();
	$.ajax({ 
		url: src, 
		type: 'post', 
		data: 'type=approved', 
		dataType: 'json', 
		success: function(html) {
			setInterval(function(){
				the.removeClass('approved').addClass('Napproved').html(html.cnt);
				$('#looder'+id).hide();
			},1500);
		} 
	});
	return false;
});

$(document).on('click', '.Napproved', function() {
	var src = $(this).attr('href');
	var the = $(this);
	var id = $(this).attr('id');
	$('#looder'+id).show();
	$.ajax({ 
		url: src, 
		type: 'post', 
		data: 'type=Napproved', 
		dataType: 'json', 
		success: function(html) {
			setInterval(function(){
				the.removeClass('Napproved').addClass('approved').html(html.cnt);
				$('#looder'+id).hide();
			},1500);
		} 
	});
	return false;
});
