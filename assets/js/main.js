$(window).on('load', function () {
	setTimeout(() => {
		$('body').addClass('loaded');
		window.localStorage.getItem('dm')
			? ($('#wrapper, .sidebar, .navbar, .footer').addClass('dark'),
			  $('#darkmode').attr('checked', 'checked'),
			  $('[name="theme-color"]').attr('content', '#213040'))
			: ($('#wrapper, .sidebar, .navbar, .footer').removeClass('dark'),
			  $('[name="theme-color"]').attr('content', '#4e73df'));
	}, 1000);
	$(document).ready(function () {
		$('#darkmode').on('change', function () {
			this.checked
				? (window.localStorage.setItem('dm', true),
				  $('#wrapper, .sidebar, .navbar, .footer').addClass('dark'),
				  $('[name="theme-color"]').attr('content', '#213040'))
				: (window.localStorage.removeItem('dm'),
				  $('#wrapper, .sidebar, .navbar, .footer').removeClass('dark'),
				  $('[name="theme-color"]').attr('content', '#4e73df'));
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
		$('#ytform').validate({
			rules: {
				urlyt: {
					url: true,
					required: true,
				},
				typeyt: 'required',
			},
			messages: {
				urlyt: {
					required: 'URL ini harus di isi !',
					url: 'Masukan URL dengan benar !',
				},
				typeyt: 'Tipe harus di isi !',
			},
			errorElement: 'div',
			errorPlacement: function (err, el) {
				err.addClass('invalid-feedback');
				err.insertAfter(el);
			},
			highlight: function (element) {
				$(element).addClass('is-invalid').removeClass('is-valid');
			},
			unhighlight: function (element) {
				$(element).addClass('is-valid').removeClass('is-invalid');
			},
		});
	});
});
