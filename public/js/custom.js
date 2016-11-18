$(document).ready(function() {

	/**
	 * ---------------------------------------------------
	 * Scroll to clicked id
	 * ---------------------------------------------------
	 */

	 $('li').click(function () {
	 	
		// Get id from clicked element
		var id = $(this).attr('data-id');


		// Scroll to selected id
		$('html,body').animate({scrollTop: $('#' + id).offset().top}, 'slow');
	});


	/**
	 * ---------------------------------------------------
	 * Sticky menu
	 * ---------------------------------------------------
	 */

	 var nav = $('#menu');

	 $(window).scroll(function () {

		// Add class when scroll
		if ($(this).scrollTop() > $(window).height() - nav.height())
			nav.addClass("f-nav");
		else
			nav.removeClass("f-nav");
	});
});