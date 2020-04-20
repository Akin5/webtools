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
	setTimeout(() => {
		counter(`${base_url}/views/visitor.txt`, '#visitor');
		counter(`${base_url}/views/likes.txt`, '#like');
		counter(`${base_url}/views/dislikes.txt`, '#dislike');
	}, 2000);
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
	$('#sidebarToggle, #sidebarToggleTop').on('click', function () {
		$('body').toggleClass('sidebar-to');
		$('.sidebar').toggleClass('toggled');
		if ($('.sidebar').hasClass('toggled')) {
			$('.sidebar .collapse').collapse('hide');
		}
		$(this).toggleClass('active');
	});
	// let like = $('#like');
	// console.log(_like_);
	// $.ajax({
	//   url: `${base_url}/like`,
	//   type: 'POST',
	//   data: `like=${like.val()}`,
	//   success: function (data) {
	//     if (like.text() == _like_) {
	//       swal('Terimakasih atas penilaian nya', 'Success UnLike');
	//     } else {
	//       swal('Terimakasih atas penilaian nya', 'Success Like');
	//     }
	//     like.text(data);
	//   },
	// });
	$('#likebtn').on('click', function () {
		if (!$('#boxbtn').hasClass('active')) {
			$('#boxbtn').toggleClass('active');
			$(this).toggleClass('btn-secondary btn-primary').attr('id', 'unlikebtn');
		} else {
			$(this).toggleClass('btn-secondary btn-primary').attr('id', 'unlikebtn');
			$('#undislikebtn').removeClass('btn-danger').addClass('btn-secondary');
		}
	});
	$('#unlikebtn').on('click', function () {
		$('#boxbtn').hasClass('active')
			? $('#boxbtn').toggleClass('active')
			: $('#boxbtn').toggleClass('active');
		$(this).toggleClass('btn-primary btn-secondary').attr('id', 'likebtn');
	});
	$('#dislikebtn').on('click', function () {
		if (!$('#boxbtn').hasClass('active')) {
			$('#boxbtn').toggleClass('active');
			$(this)
				.toggleClass('btn-secondary btn-danger')
				.attr('id', 'undislikebtn');
		} else {
			$(this)
				.toggleClass('btn-secondary btn-danger')
				.attr('id', 'undislikebtn');
			$('#unlikebtn').removeClass('btn-primary').addClass('btn-secondary');
		}
	});
	$('#undislikebtn').on('click', function () {
		$('#boxbtn').hasClass('active')
			? $('#boxbtn').toggleClass('active')
			: $('#boxbtn').toggleClass('active');
		$(this).toggleClass('btn-danger btn-secondary').attr('id', 'dislikebtn');
	});
	const wavesConfig = {
		duration: 1000,
		delay: 500,
	};
	Waves.init(wavesConfig);
	Waves.attach('.btn', 'waves-light');
	Waves.attach('.btn-circle', ['waves-light', 'waves-circle']);
});
function swal(pesan, judul, tipe = 'success') {
	let mode;
	window.localStorage.getItem('dm') ? (mode = 'dark') : (mode = 'light');
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
function counter(file, el, speed = 60) {
	$.get(file, (data) => {
		if (data > 30) speed = 60;
		else if (data > 10) speed = 100;
		else if (data < 5) speed = 1000;

		let element = $(el);
		let end, c, count;
		end = data;

		count = setInterval(() => {
			c = parseInt(element.text());
			element.text((++c).toString());
			if (c == end) {
				clearInterval(count);
			}
		}, speed);
	});
}
