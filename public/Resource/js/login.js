jQuery(document).ready(function() {
	$("#submit").click(function () {
		$.ajax({
			url: '/login/submit',
			type: 'POST',
			dataType: 'json',
			/*contentType: 'application/x-www-form/urlencoded;charset=UTF-8',*/
			data: $("form").serialize(),
		})
		.done(function(data) {
			console.log(data.ok);
			if (data.ok) {
				$(location).attr("href", data.toMove);
			}
		})
		.fail(function(ajax, state, exception) {
			$(".err").html(ajax.responseText);
		});
		
	});
});