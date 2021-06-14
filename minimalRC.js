/**
 * Toma la cadena numérica del id de una entrada (i.e. "post-link-13") y la
 * transforma a una secuencia de mousetrap.
 * Es decir, el "13" e inserta espacios entre los caracteres, terminando con
 * una cadena como "1 3" (que es una secuencia de teclas para mousetrap).
 */
function conversionMoustrapShortcut(elemento)
{
	var link_id = elemento.id;
	var link_number = link_id.substring(link_id.lastIndexOf("-") + 1);
	var mousetrapString = "";
	for (var i = 0; i < link_number.length; i++) {
		mousetrapString += link_number[i] + " ";
	}

	return mousetrapString.trim();
}

function visitar(pagina) {
	window.location.href = "http://ramoscarlos.com/"+pagina;
}

// Binding de los accesos del menú principal.
Mousetrap.bind('r', function() { visitar('') });
Mousetrap.bind('c', function() { visitar('cursos') });
Mousetrap.bind('l', function() { visitar('libros') });
Mousetrap.bind('p', function() { visitar('letrista-sublime') });
Mousetrap.bind('b', function() { visitar('blog') });
Mousetrap.bind('a', function() { visitar('acerca-de') });

// Buscar el binding para la página de blog.
var paginaTieneBusqueda = document.getElementById("search-archive");
if ( paginaTieneBusqueda ) {
	Mousetrap.bind('ctrl+shift+f', function() {
		document.getElementById("search-archive").focus();
	});
}

// Buscar el binding para atajos numéricos para entradas.
var atajosParaEntradas = document.getElementsByClassName("mousetrap-link-a");
if ( atajosParaEntradas ) {
	for (var i = 0; i < atajosParaEntradas.length; i++) {
		mousetrapString = conversionMoustrapShortcut(atajosParaEntradas[i]);
		Mousetrap.bind(mousetrapString, function(e, combo) {
			// Una vez que entramos aquí, realizamos la operación contraria, removiendo
			// los espacios para obtener el id:
			var element_id = 'post-link-' + combo.replace(/\s/g, "");
			url_enlace = document.getElementById(element_id).getAttribute("href");
			visitar(url_enlace);
		});
	}
}