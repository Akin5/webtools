$(window).on('load', function () {
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1000);
	$(document).ready(function () {
		if (window.localStorage.getItem('dm')) {
			$('#wrapper, .sidebar, .navbar, .footer').addClass('dark');
			$('#darkmode').attr('checked', 'checked');
		} else {
			$('#wrapper, .sidebar, .navbar, .footer').removeClass('dark');
		}
		$('#darkmode').on('change', function () {
			if (this.checked) {
				window.localStorage.setItem('dm', true);
				$('#wrapper, .sidebar, .navbar, .footer').addClass('dark');
			} else {
				window.localStorage.removeItem('dm');
				$('#wrapper, .sidebar, .navbar, .footer').removeClass('dark');
			}
		});
		$('#sidebarToggle, #sidebarToggleTop').on('click', function () {
			$('body').toggleClass('sidebar-to');
			$('.sidebar').toggleClass('toggled');
			if ($('.sidebar').hasClass('toggled')) {
				$('.sidebar .collapse').collapse('hide');
			}
			$(this).toggleClass('active');
		});

		$(document).on('scroll', function () {
			var scrollDistance = $(this).scrollTop();
			if (scrollDistance > 100) {
				$('.scroll-to-top').fadeIn();
			} else {
				$('.scroll-to-top').fadeOut();
			}
		});

		$('a.scroll-to-top').click(function (e) {
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
});
