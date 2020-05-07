$(function () {
	const base64_encode_chars =
		"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	const base64_decode_chars = [
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		62,
		-1,
		-1,
		-1,
		63,
		52,
		53,
		54,
		55,
		56,
		57,
		58,
		59,
		60,
		61,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		-1,
		0,
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
		11,
		12,
		13,
		14,
		15,
		16,
		17,
		18,
		19,
		20,
		21,
		22,
		23,
		24,
		25,
		-1,
		-1,
		-1,
		-1,
		-1,

		26,
		27,
		28,
		29,
		30,
		31,
		32,
		33,
		34,
		35,
		36,
		37,
		38,
		39,
		40,
		41,
		42,
		43,
		44,
		45,
		46,
		47,
		48,
		49,
		50,
		51,
		-1,
		-1,
		-1,
		-1,
		-1,
	];
	("use strict");
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
			$("#resultjso").text($(this).convertjso());
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
				enchasil = base64encode($anchor.val());
			} else if ($("#labeltypedec").hasClass("active")) {
				enchasil = base64decode($anchor.val());
			}
			$("#resultencdec").text(enchasil);
		});

		$("#labeltypeenc").on("click", function () {
			$("#resultencdec").text();
		});

		$("#labeltypedec").on("click", function () {
			$("#resultencdec").text(base64decode($("#textencdec").val()));
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
				$("#resultjso").text($("#scjso").convertjso());
				form.submit();
			},
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
		function base64encode(str) {
			var out, i, len;
			var char1, char2, char3;

			len = str.length;
			i = 0;
			out = "";
			while (i < len) {
				char1 = str.charCodeAt(i++) & 0xff;
				if (i == len) {
					out += base64_encode_chars.charAt(char1 >> 2);
					out += base64_encode_chars.charAt((char1 & 0x3) << 4);
					out += "==";
					break;
				}
				char2 = str.charCodeAt(i++);
				if (i == len) {
					out += base64_encode_chars.charAt(char1 >> 2);
					out += base64_encode_chars.charAt(
						((char1 & 0x3) << 4) | ((char2 & 0xf0) >> 4),
					);
					out += base64_encode_chars.charAt((char2 & 0xf) << 2);
					out += "=";
					break;
				}
				char3 = str.charCodeAt(i++);
				out += base64_encode_chars.charAt(char1 >> 2);
				out += base64_encode_chars.charAt(
					((char1 & 0x3) << 4) | ((char2 & 0xf0) >> 4),
				);
				out += base64_encode_chars.charAt(
					((char2 & 0xf) << 2) | ((char3 & 0xc0) >> 6),
				);
				out += base64_encode_chars.charAt(char3 & 0x3f);
			}
			return out;
		}
		function base64decode(str) {
			var char1, char2, char3, char4;
			var i, len, out;

			len = str.length;
			i = 0;
			out = "";
			while (i < len) {
				/* char1 */
				do {
					char1 = base64_decode_chars[str.charCodeAt(i++) & 0xff];
				} while (i < len && char1 == -1);
				if (char1 == -1) break;

				/* char2 */
				do {
					char2 = base64_decode_chars[str.charCodeAt(i++) & 0xff];
				} while (i < len && char2 == -1);
				if (char2 == -1) break;

				out += String.fromCharCode((char1 << 2) | ((char2 & 0x30) >> 4));

				/* char3 */
				do {
					char3 = str.charCodeAt(i++) & 0xff;
					if (char3 == 61) return out;
					char3 = base64_decode_chars[char3];
				} while (i < len && char3 == -1);
				if (char3 == -1) break;

				out += String.fromCharCode(
					((char2 & 0xf) << 4) | ((char3 & 0x3c) >> 2),
				);

				/* char4 */
				do {
					char4 = str.charCodeAt(i++) & 0xff;
					if (char4 == 61) return out;
					char4 = base64_decode_chars[char4];
				} while (i < len && char4 == -1);
				if (char4 == -1) break;
				out += String.fromCharCode(((char3 & 0x03) << 6) | char4);
			}
			return out;
		}
	});
});
