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
			convertjso();
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
		let enchasil;
		$("#textencdec").on("keyup", function () {
			let $anchor = $(this);
			if ($("#labeltypeenc").hasClass("active")) {
				enchasil = b64enc($anchor.val());
			} else if ($("#labeltypedec").hasClass("active")) {
				enchasil = b64dec($anchor.val());
			}
			$("#resultencdec").text(enchasil);
		});

		$("#labeltypeenc").on("click", function () {
			$("#resultencdec").text(b64enc($("#textencdec").val()));
		});

		$("#labeltypedec").on("click", function () {
			$("#resultencdec").text(b64dec($("#textencdec").val()));
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
		$("#adform").validate({
			messages: {
				urlad: {
					url: "Masukan URL dengan benar !",
					required: "Field ini harus diisi !",
				},
			},
			rules: {
				urlad: {
					url: true,
					required: true,
				},
			},
		});
		$("#jsoform").validate({
			messages: {
				scjso: {
					required: "Field ini harus diisi !",
				},
			},
			rules: {
				scjso: {
					required: true,
				},
			},
			ignore: "#resultjso",
			submitHandler: function (form) {
				convertjso();
				form.submit();
			},
		});
		function convertjso() {
			let scjso = $("#scjso").val();
			let resultjso =
				"document.documentElement.innerHTML = String.fromCharCode(";
			for (let n = 0; n < scjso.length; n++) {
				if (n != 0) resultjso += ", ";
				resultjso += scjso.charCodeAt(n);
			}
			resultjso += ");";
			$("#resultjso").text(resultjso);
		}
		function b64enc(str) {
			return window.btoa(
				encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function (
					match,
					p1,
				) {
					return String.fromCharCode(parseInt(p1, 16));
				}),
			);
		}
		function b64dec(str) {
			return decodeURIComponent(
				Array.prototype.map
					.call(atob(str), function (c) {
						return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
					})
					.join(""),
			);
		}
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
});
