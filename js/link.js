function chkForm() {
	with(document.myform) {
		if (link_man.value == "") {
			alert("请输入姓名.");
			link_man.focus();
			return false;
		}
		if (phone.value == "") {
			alert("请输入手机号码.");
			phone.focus();
			return false;
		}
		if (isNaN(phone.value) || (phone.value.length != 11)) {
			alert("手机号码为11位数字！请正确填写！");
			phone.focus();
			return false;
		}
		if (qq.value != " " || isNaN(qq.value) || (qq.value.length != 11)) {
			alert(qq.value);
			alert('请输入正确QQ号！');
			address.focus();
			return false;
		}
		var reg = /^0{0,1}(13[0-9]|15[0-9])[0-9]{8}$/;
		if (reg.test(phone)) {
			alert("请正确填写手机号码！");
			return false;
		}
		if (address.value == "") {
			alert("请输入地址.");
			address.focus();
			return false;
		}
		//验证qq号码

		if (content.value != "") {
			var con_val = content.value;
			var badChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789><,[]{}?/+=|':;~!#$%()`";
			var num = "";
			for (i = 0; i < con_val.length; i++) {
				c = con_val.charAt(i); //字符串s中的字符
				if (badChar.indexOf(c) > -1) {
					num = num + 'b';
				}
			}
			if (num != "") {
				alert("请输入中文,勿添加任何英文及字符");
				content.focus();
				return false;
			}
		} else {
			alert("请输入留言！");
			content.focus();
			return false;
		}
		if (verfiycode.value.length == 0) {
			window.alert("请填写验证码！");
			verfiycode.focus();
			return false;
		}
	}
}
function isCharsInBag(s, bag) {
	var i, c;
	for (i = 0; i < s.length; i++) {
		c = s.charAt(i); //字符串s中的字符
		if (bag.indexOf(c) > -1) {
			// return c;
		}
	}
	return false;
}
	// 检查函数:
	function ischinese(s) {
		var errorChar;
		var badChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789><,[]{}?/+=|':;~!#$%()`";
		errorChar = isCharsInBag(s, badChar)
		if (errorChar != "") {
			report = report + "请重新输入中文";
			return false;
		}
		// alert('c');
		return false;
	}