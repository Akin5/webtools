$(window).on('load', function () {
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1000);
	setTimeout(() => {
		$('[name="theme-color"]').attr('content', '#5a5c69');
	}, 2000);
	$('#sidebarToggle, #sidebarToggleTop').on('click', function (e) {
		$('body').toggleClass('sidebar-toggled');
		$('.sidebar').toggleClass('toggled');
		if ($('.sidebar').hasClass('toggled')) {
			$('.sidebar .collapse').collapse('hide');
		}
	});
});
$(document).ready(function () {
	$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (
		e,
	) {
		if ($(window).width() > 768) {
			var e0 = e.originalEvent,
				delta = e0.wheelDelta || -e0.detail;
			this.scrollTop += (delta < 0 ? 1 : -1) * 30;
			e.preventDefault();
		}
	});

	$(document).on('scroll', function () {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});

	$(document).on('click', 'a.scroll-to-top', function (e) {
		var $anchor = $(this);
		$('html, body')
			.stop()
			.animate(
				{
					scrollTop: $($anchor.attr('href')).offset().top,
				},
				1000,
				'easeInOutExpo',
			);
		e.preventDefault();
	});
});