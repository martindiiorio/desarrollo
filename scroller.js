function scrollMe(target) {
	var gradiente = 6,  // si queres probar otras velocidades de scroll cambiá esta variable.
		largoBody = document.body.offsetHeight,
		alBody = actualPos + window.innerHeight,
		actualPos = window.pageYOffset,
		targetPos = document.getElementById(target).offsetTop - (window.innerHeight / 6),
		scrolling = setTimeout('scrollMe(\''+target+'\')', gradiente);	

	if (alBody >= largoBody) {
		clearTimeout(scrolling);
	} else {
		if (actualPos < targetPos - gradiente) {
			var scrollTo = actualPos + gradiente;
			window.scroll(0, scrollTo);
		} else {
			clearTimeout(scrolling);
		}
	}
}
function goBack(target) { // esta la metí por si queremos tener un boton para volver arriba de todo.
	var gradiente = 6,  
		actualPos = window.pageYOffset,
		targetPos = document.getElementById(target).offsetTop,
		scrolling = setTimeout('goBack(\''+target+'\')', gradiente);

	if (actualPos > targetPos) {
		var scrollTo = actualPos - gradiente;
		window.scroll(0, scrollTo);
	} else {
		clearTimeout(scrolling);
	}
}