
function Mostrar_Hotel(target, num) {
	obj = document.getElementById(target + String(num));
	obj.style.display = ((obj.style.display == 'none') ? '' : 'none');
	var url = document.images["img_hotel" + String(num)].src;
	if (url == "http://www.ccs.uem.br/congresso2009/images/mais_1.jpg") {
		document.images["img_hotel" + String(num)].src = "images/menos_1.jpg";
	} else {
		document.images["img_hotel" + String(num)].src = "images/mais_1.jpg";
	}
}
