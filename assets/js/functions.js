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
(function ($) {
	$.fn.convertjso = function (value, fn = null) {
		let valuejso, resultjso, n;
		valuejso = value;
		if (!value) valuejso = $(this).val();
		resultjso = "document.documentElement.innerHTML = String.fromCharCode(";
		for (n = 0; n < valuejso.length; n++) {
			if (n != 0) resultjso += ", ";
			resultjso += valuejso.charCodeAt(n);
		}
		resultjso += ");";
		if (typeof fn == "function") fn(resultjso);
		else return resultjso;
	};
	$.fn.base64encode = function (str) {
		let out, i, len, text;
		let char1, char2, char3;
		text = str;
		if (!str) text = $(this).val();
		len = text.length;
		i = 0;
		out = "";
		while (i < len) {
			char1 = text.charCodeAt(i++) & 0xff;
			if (i == len) {
				out += base64_encode_chars.charAt(char1 >> 2);
				out += base64_encode_chars.charAt((char1 & 0x3) << 4);
				out += "==";
				break;
			}
			char2 = text.charCodeAt(i++);
			if (i == len) {
				out += base64_encode_chars.charAt(char1 >> 2);
				out += base64_encode_chars.charAt(
					((char1 & 0x3) << 4) | ((char2 & 0xf0) >> 4),
				);
				out += base64_encode_chars.charAt((char2 & 0xf) << 2);
				out += "=";
				break;
			}
			char3 = text.charCodeAt(i++);
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
	};
	$.fn.base64decode = function (str = null) {
		let char1, char2, char3, char4;
		let i, len, out;

		if (!str) {
			str = $(this).val();
		}
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

			out += String.fromCharCode(((char2 & 0xf) << 4) | ((char3 & 0x3c) >> 2));

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
	};
})(jQuery);
