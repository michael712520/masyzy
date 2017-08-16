/* $Id: listtable.js 14980 2008-10-22 05:01:19Z testyang $ */
var yzyif = new Object;

/**
 * ppt 显示
 */
function changeBGImage(image) {
	$$.ajax({
		type : "get",
		url : "basicppt.php?act=bjgh&pptimageurl=" + image,
		success : function(data, textStatus) {
			var leftFrame = parent.document.getElementById("left-frame");
			leftFrame.src = $$("#left-frame").attr("src");
			var mainFrame = parent.document.getElementById("main-frame");
			mainFrame.src = $$("#main-frame").attr("src");
		},
		error : function() {
			alert("更换背景失败！请与相关人员联系");
		}
	})
}
yzyif.addsp = function() {
	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=addsp&id=0";
}
yzyif.view = function(obj, act, id) {
	var dd = parent.document.getElementById("left-frame");
	dd.src = "basicppt.php?act=left&view=fa&programId=" + id;
}
yzyif.leftcick = function(obj, act, id) {
	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=dgppt&goods_id=" + id;
}
yzyif.leftcickbt = function(obj, act, id) {

	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=bt&btControl=view";
}
yzyif.leftcickjw = function(obj, act, id) {
	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=jw&jwcontrol=view";
	
}
yzyif.fabc = function(obj, act, id) {
	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=fabc";
}
yzyif.remove = function(obj, act, id) {

	var dd = parent.document.getElementById("main-frame");

	dd.src = "basicppt.php?act=fadelete&programId=" + id;
	alert("ddd");

}
yzyif.removegood = function(id) {

	var dd = parent.document.getElementById("main-frame");
	dd.src = "basicppt.php?act=removegood&goods_id=" + id;
	dd = parent.document.getElementById("left-frame");
	dd.src = "basicppt.php?act=left&listsp=addsp&goods_id=" + id;

}

function onaddsp(goods_id) {

	var dd = parent.document.getElementById("left-frame");
	dd.src = "basicppt.php?act=left&view=addsp&goods_id=" + goods_id;

}
// 写cookies
function setCookie(name, value) {
	var Days = 30;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
	document.cookie = name + "=" + escape(value) + ";expires="
			+ exp.toGMTString();
}
// 读取cookies
function getCookie(name) {
	var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

	if (arr = document.cookie.match(reg))

		return unescape(arr[2]);
	else
		return null;
}
// 删除cookies
function delCookie(name) {
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	if (cval != null)
		document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}