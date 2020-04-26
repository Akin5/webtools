$(window).on('load', function () {
	const darkcolor = '#213040';
	const lightcolor = '#4e73df';
	const comp = $(
		'#wrapper, .sidebar, .navbar, .footer, .form-control, .custom-select',
	);
	const base_url =
		window.location.protocol +
		'//' +
		window.location.host +
		'/' +
		window.location.pathname.split('/')[1];
	window.localStorage.getItem('dm')
		? (comp.addClass('dark'),
		  $('#darkmode').attr('checked', 'checked'),
		  $('[name="theme-color"]').attr('content', darkcolor),
		  $('#loader-wrapper').css('--loading-bg', darkcolor))
		: (comp.removeClass('dark'),
		  $('[name="theme-color"]').attr('content', lightcolor));
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1500);
	// Dark Mode
	$('#darkmode').on('change', function () {
		this.checked
			? (window.localStorage.setItem('dm', true),
			  comp.addClass('dark'),
			  $('[name="theme-color"]').attr('content', darkcolor),
			  darkcolor)
			: (window.localStorage.removeItem('dm'),
			  comp.removeClass('dark'),
			  $('[name="theme-color"]').attr('content', lightcolor));
	});

	// Sidebar
	$('#sidebarToggle, #sidebarToggleTop').on('click', function () {
		$('body').toggleClass('sidebar-to');
		$('.sidebar').toggleClass('toggled');
		if ($('.sidebar').hasClass('toggled')) {
			$('.sidebar .collapse').collapse('hide');
		}
		$(this).toggleClass('active');
	});

	$('#scjso').on('keyup', function () {
		convertjso();
	});
	$('#resultjso, #tagjso').on('click', function () {
		$(this).select();
	});
	$('#copyjso').click(function () {
		$('#tagjso').select();
		document.execCommand('copy');
		$(this).tooltip('toggle');
	});

	// Waves
	const wavesConfig = {
		duration: 1000,
		delay: 500,
	};
	Waves.init(wavesConfig);
	Waves.attach('.btn', 'waves-light');
	Waves.attach('.btn-circle', ['waves-light', 'waves-circle']);

	// Data Tables
	$('#adtable').DataTable({
		pagingType: 'full_numbers',
		lengthMenu: [
			[10, 25, 50, -1],
			[10, 25, 50, 'All'],
		],
		responsive: true,
		language: {
			search: '_INPUT_',
			searchPlaceholder: 'Cari URL !',
		},
		paging: false,
		scrollY: '500px',
		scrollCollapse: true,
	});

	// Jquery Validation
	$.validator.setDefaults({
		errorElement: 'div',
		errorPlacement: function (err, el) {
			err.addClass('invalid-feedback');
			err.insertAfter(el);
		},
		highlight: function (el) {
			$(el).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (el) {
			$(el).removeClass('is-invalid').addClass('is-valid');
		},
	});
	$('#adform').validate({
		messages: {
			urlad: {
				url: 'Masukan URL dengan benar !',
				required: 'Field ini harus diisi !',
			},
		},
		rules: {
			urlad: {
				url: true,
				required: true,
			},
		},
	});
	$('#jsoform').validate({
		messages: {
			scjso: {
				required: 'Field ini harus diisi !',
			},
		},
		rules: {
			scjso: {
				required: true,
			},
		},
		ignore: '#resultjso',
		submitHandler: function (form) {
			convertjso();
			form.submit();
		},
	});
});
function toast(judul, tipe = 'success') {
	let mode;
	window.localStorage.getItem('dm') ? (mode = 'dark') : (mode = 'light');
	const btn = Swal.mixin({
		toast: true,
		position: 'top-start',
		customClass: {
			title: 'text-primary',
			popup: mode == 'dark' ? 'swa-dark' : '',
		},
		timer: 1500,
		timerProgressBar: false,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer);
			toast.addEventListener('mouseleave', Swal.resumeTimer);
		},
		showCancelButton: false,
		showConfirmButton: false,
		backdrop: true,
	});
	btn.fire({
		icon: tipe,
		title: judul,
	});
}
function convertjso() {
	let scjso = $('#scjso').val();
	let resultjso = 'document.documentElement.innerHTML = String.fromCharCode(';
	for (let n = 0; n < scjso.length; n++) {
		if (n != 0) resultjso += ', ';
		resultjso += scjso.charCodeAt(n);
	}
	resultjso += ');';
	$('#resultjso').text(resultjso);
}
