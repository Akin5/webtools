$(document).ready(function () {
	setTimeout(() => {
		$('body').addClass('loaded');
		$('[name="theme-color"]').attr('content', '#5a5c69');
	}, 1000);
	setTimeout(() => {
		$('[name="theme-color"]').attr('content', '#5a5c69');
	}, 3000);
});
