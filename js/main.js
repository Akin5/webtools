$(document).ready(function () {
	setTimeout(() => {
		$('body').addClass('loaded');
	}, 1000);
	setTimeout(() => {
		$('[name="theme-color"]').attr('content', '#5a5c69');
	}, 2000);
});
