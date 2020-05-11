$(function () {
	"use strict";
	const lightcolor = "#4e73df";
	const darkcolor = "#213040";
	const $dm = $("#darkmode");
	const $tnmc = $('[name="theme-color"]');
	const $html = $("html");

	$(window).on("load", function () {
		$dm &&
			(initMode(),
			$dm.on("change", function () {
				this.checked
					? ($html.attr("data-theme", "dark"),
					  $tnmc.attr("content", darkcolor),
					  localStorage.setItem("dark", "dark"))
					: ($html.removeAttr("data-theme"),
					  $tnmc.attr("content", lightcolor),
					  localStorage.removeItem("dark"));
			}));
		setTimeout(() => {
			$("body").addClass("loaded");
		}, 1500);

		// Sidebar
		$(document).on("click", "#sidebarToggle, #sidebarToggleTop", function () {
			$("body").toggleClass("sidebar-toggled");
			$(".sidebar").toggleClass("toggled");
			if ($(".sidebar").hasClass("toggled")) {
				$(".sidebar .collapse").collapse("hide");
			}
			$(this).toggleClass("active");
		});

		// Tools JSO
		$("#scjso").on("keyup", function () {
			let result = convertjso($(this).val());
			$("#resultjso").text(result);
		});
		$("#resultjso, #tagjso, #resultencdec").on("click", function () {
			$(this).select();
		});
		$("#copyjso").on("click", function () {
			$("#tagjso").select();
			document.execCommand("copy");
			$(this).tooltip("toggle");
		});

		// Tools Generate Hash
		$(".copyhash").on("click", function () {
			let $anchor = $(this);
			let $hashname = $anchor.data("hash");
			$("#hash_" + $hashname).select();
			document.execCommand("copy");
			$anchor.tooltip("toggle");
		});

		// Tools Encode & Decode Base64
		$("#textencdec").on("keyup", function () {
			let enchasil;
			let $anchor = $(this);
			if ($("#labeltypedec").hasClass("active"))
				enchasil = base64decode($anchor.val());
			else enchasil = base64encode($anchor.val());

			$("#resultencdec").text(enchasil);
		});

		$("#labeltypeenc").on("click", function () {
			let enctext = base64encode($("#textencdec").val());
			$("#resultencdec").text(enctext);
		});

		$("#labeltypedec").on("click", function () {
			let dectext = base64decode($("#textencdec").val());
			$("#resultencdec").text(dectext);
		});

		$("#btncopyencdec").on("click", function () {
			$("#resultencdec").select();
			document.execCommand("copy");
			$(this).tooltip("toggle");
		});

		// Waves
		const wavesConfig = {
			duration: 1500,
			delay: 300,
		};
		Waves.init(wavesConfig);
		Waves.attach(".btn", "waves-light");
		Waves.attach(".btn-circle", ["waves-light", "waves-circle"]);

		// Data Tables
		$("#adtable").DataTable({
			pagingType: "full_numbers",
			lengthMenu: [
				[10, 25, 50, -1],
				[10, 25, 50, "All"],
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari URL !",
			},
			paging: false,
			scrollY: "500px",
			scrollCollapse: true,
		});

		// Jquery Validation
		$.validator.setDefaults({
			errorElement: "div",
			errorPlacement: function (err, el) {
				err.addClass("invalid-feedback");
				err.insertAfter(el);
			},
			highlight: function (el) {
				$(el).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight: function (el) {
				$(el).removeClass("is-invalid").addClass("is-valid");
			},
		});
		$.extend($.validator.messages, {
			url: "Masukan URL dengan benar !",
			required: "Field harus di isi !",
			remote: "Please fix this field.",
			email: "Silahkan masukan email yang valid !",
			date: "Silahkan masukan tanggal yang valid !",
			dateISO: "Silahkan masukan tanggal yang valid (ISO) !",
			number: "Silahkan masukan number yang valid !",
			digits: "Silahkan masukan hanya angka !",
			creditcard: "Please enter a valid credit card number.",
			equalTo: "Please enter the same value again.",
			accept: "Please enter a value with a valid extension.",
			maxlength: $.validator.format(
				"Please enter no more than {0} characters.",
			),
			minlength: $.validator.format("Please enter at least {0} characters."),
			rangelength: $.validator.format(
				"Please enter a value between {0} and {1} characters long.",
			),
			range: $.validator.format("Please enter a value between {0} and {1}."),
			max: $.validator.format(
				"Please enter a value less than or equal to {0}.",
			),
			min: $.validator.format(
				"Please enter a value greater than or equal to {0}.",
			),
		});
		$("#adform").validate({
			rules: {
				urlad: {
					url: true,
					required: true,
				},
			},
		});
		$("#jsoform").validate({
			rules: {
				scjso: {
					required: true,
				},
			},
			ignore: "#resultjso",
			submitHandler: function (form) {
				let result = convertjso($("#scjso").val());
				$("#resultjso").text(result);
				form.submit();
			},
		});
		$("#whoform").validate({
			rules: {
				urlwho: {
					url: true,
					required: true,
				},
			},
			success: function (label) {
				label
					.removeClass("invalid-feedback")
					.addClass("valid-feedback")
					.html("Ok");
			},
		});
	});
	function initMode() {
		const e =
			null !== localStorage.getItem("dark") &&
			"dark" === localStorage.getItem("dark");
		$dm.prop("checked", e),
			e
				? ($html.attr("data-theme", "dark"),
				  $tnmc.attr("content", darkcolor),
				  $("#loader-wrapper").css("--loading-bg", darkcolor))
				: ($html.removeAttr("data-theme"), $tnmc.attr("content", lightcolor));
	}
});
