$('.navbar-toggle').on('click', function () {
	$('#magic-image').toggleClass('.transition');
	if($('#magic-image').hasClass('.transition')) {
		$('#magic-image').css('top',265);
	}
	else {
		$('#magic-image').css('top',-1);
	}

})