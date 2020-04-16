$(window).on('load', function () {
	const comp = $(
		'#wrapper, .sidebar, .navbar, .footer, .form-control, .custom-select',
	);
	window.localStorage.getItem('dm')
		? (comp.addClass('dark'),
		  $('#darkmode').attr('checked', 'checked'),
		  $('[name="theme-color"]').attr('content', '#213040'),
		  $('#loader-wrapper').css('--loading-bg', '#213040'))
		: (comp.removeClass('dark'),
		  $('[name="theme-color"]').attr('content', '#4e73df'));
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1500);
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
		$('#likebtn').on('click', function () {
			swal(
				'Terimakasih atas penilaian nya',
				'Success Like',
				localStorage.getItem('dm') ? 'dark' : 'light',
			);
		});
	});
});
function swal(pesan, judul, mode = 'light', tipe = 'success') {
	mode == 'dark' ? (pesan = `<span class="text-white">${pesan}</span>`) : '';
	const btn = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger',
			title: 'text-primary',
			popup: mode == 'dark' ? 'swa-dark' : '',
		},
		buttonsStyling: false,
		reverseButtons: true,
		showCancelButton: false,
		confirmButtonText: 'Ok, sama sama',
		backdrop: true,
	});
	btn.fire({
		icon: tipe,
		title: judul,
		html: pesan,
	});
}
