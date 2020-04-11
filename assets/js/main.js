$(window).on('load', function () {
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1000);
	setTimeout(() => {
		$('[name="theme-color"]').attr('content', '#5a5c69');
	}, 2000);
	$(document).ready(function () {
		const dm = localStorage.getItem('dm');
		if (dm == 'dark') {
			$('#wrapper, .sidebar, .navbar, .footer').toggleClass('dark');
			localStorage.setItem('dm', 'dark');
		} else {
			$('#wrapper, .sidebar, .navbar, .footer').toggleClass('dark');
			localStorage.setItem('dm', '');
		}
		$('#darkmode').click(function () {
			if (dm == 'dark') {
				$('#wrapper, .sidebar, .navbar, .footer').toggleClass('dark');
				localStorage.setItem('dm', '');
			} else {
				$('#wrapper, .sidebar, .navbar, .footer').toggleClass('dark');
				localStorage.setItem('dm', 'dark');
			}
		});
		$('#sidebarToggle, #sidebarToggleTop').on('click', function () {
			$('body').toggleClass('sidebar-toggled');
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
