$(window).on('load', function () {
	const comp = $(
		'#wrapper, .sidebar, .navbar, .footer, .form-control, .custom-select',
	);
	setTimeout(() => {
		$('body').addClass('loaded');
		window.localStorage.getItem('dm')
			? (comp.addClass('dark'),
			  $('#darkmode').attr('checked', 'checked'),
			  $('[name="theme-color"]').attr('content', '#213040'))
			: (comp.removeClass('dark'),
			  $('[name="theme-color"]').attr('content', '#4e73df'));
	}, 1000);
	$(document).ready(function () {
		$('#darkmode').on('change', function () {
			this.checked
				? (window.localStorage.setItem('dm', true),
				  comp.addClass('dark'),
				  $('[name="theme-color"]').attr('content', '#213040'))
				: (window.localStorage.removeItem('dm'),
				  comp.removeClass('dark'),
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
				typeyt: 'Field ini harus di isi !',
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
				$(element)
					.find('.invalid-feedback')
					.removeClass('invalid-fedback error')
					.addClass('valid-feedback valid');
			},
			submitHandler: function (form, e) {
				e.preventDefault();
				// Get URL
				const urlyt = $('#urlyt').val();
				const typet = $('#typeyt').val();

				$.ajax({
					method: 'POST',
					dataType: 'json',
					data: {
						url: urlyt,
						type: typeyt,
					},
					url: '/tools/ytdown',
					beforeSend: function () {
						$('#btnyt').find('span').text('Loading..');
					},
					complete: function () {
						$('#btnyt').find('span').text('Convert Now');
					},
					success: function (data) {
						alert(1);
					},
				});
			},
		});
	});
});
