function calcular_tamanio_lienzo()
{
	const MAX_WIDTH = 988;
	const MAX_HEIGHT = 500;

	orden = localStorage.getItem("wallplot_order");
	orden = JSON.parse(orden);

	var width = parseInt(orden.medidas.width);
	var height = parseInt(orden.medidas.height);

	if (width > height)
	{
		new_h = (height/width) * MAX_WIDTH;
		return {width: MAX_WIDTH, height: new_h};
	}
	else
	{
		new_w = (width/height) * MAX_HEIGHT;
		return {width: new_w, height: MAX_HEIGHT};
	}
}




/* JSON FUNCTIONS */

function nueva_orden(tipo)
{
	orden = new Object();
	orden.tipo = tipo;
	localStorage.setItem("wallplot_order", JSON.stringify(orden));

	location.href = "paso-2-" + tipo + ".html.php";
}

function validar_seleccion(forma)
{
	if (forma == "simple")
	{
		if ( !$("input[name=forma-radio]:checked").length  )
		{
			alert("Debe elegir una forma para poder continuar con su compra.");
			return false;
		}
		else
		{
			if ($("#cmbSize").val().split("_")[2] == "rectangulo" && !$("input[name=disposicion]:checked").length)
			{
				alert("Debe elegir una disposicion de la forma para poder continuar con su compra.");
				return false;
			}
			else
			{
				return true;
			}
		}
	}
	else if (forma == "multiple")
	{
		if ( !$("input[name=cant_paneles]:checked").length )
		{
			alert("Debe elegir una forma para poder continuar con su compra.");
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		return true;
	}

	
}

function elegir_medidas()
{
	orden = localStorage.getItem("wallplot_order");
	orden = JSON.parse(orden);

	tipo = orden.tipo;

	// Si no eligio ninguna forma no lo dejo continuar
	var resultado = validar_seleccion(tipo);
	if (!resultado)
	{
		return;
	}

	orden.medidas = new Object();
	orden.medidas.width = $("#cmbSize").val().split("_")[0];
	orden.medidas.height = $("#cmbSize").val().split("_")[1];
	orden.medidas.forma = new Object();
	orden.medidas.forma.nombre = $("#cmbSize").val().split("_")[2];

	
	
	if (tipo == "collage")
	{
		location.href = "paso-2-" + tipo + "-b.html.php";
		localStorage.setItem("wallplot_order", JSON.stringify(orden));
	}
	else if (tipo == "simple")
	{
		
		if (orden.medidas.forma.nombre == "rectangulo")
		{
			var disposicion = $("input[name=disposicion]:checked").val();
			orden.medidas.forma.numero = orden.medidas.forma.nombre[0] + disposicion[0];
			orden.medidas.forma.disposicion = disposicion;

			if (disposicion == "vertical")
			{
				// switcheo el width con el height
				orden.medidas.width = $("#cmbSize").val().split("_")[1];
				orden.medidas.height = $("#cmbSize").val().split("_")[0];
			}
		}
		else
		{
			// si es panoramica o cuadrado
			orden.medidas.forma.numero = orden.medidas.forma.nombre[0];
		}
		localStorage.setItem("wallplot_order", JSON.stringify(orden));
		location.href = "paso-3-" + tipo + ".html.php";
	}
	else if (tipo == "multiple")
	{
		// multiple
		var cantidad_paneles = $("input[name=cant_paneles]:checked").val();
		orden.medidas.cantidad_paneles = cantidad_paneles;
		orden.medidas.forma.numero = orden.medidas.forma.nombre[0] + cantidad_paneles;

		localStorage.setItem("wallplot_order", JSON.stringify(orden));
		location.href = "paso-3-" + tipo + ".html.php";
	}
}

function elegir_disenio_forma(disenio_forma)
{
	orden = localStorage.getItem("wallplot_order");
	orden = JSON.parse(orden);

	tipo = orden.tipo;

	orden.medidas.forma.numero = disenio_forma;

	localStorage.setItem("wallplot_order", JSON.stringify(orden));

	location.href = "paso-3-" + tipo + ".html.php";
}

function elegir_imagen()
{
	orden = localStorage.getItem("wallplot_order");
	orden = JSON.parse(orden);

	tipo = orden.tipo;

	orden.imagenes = new Array();

	$(".img-elegida").not(":hidden").each(function(i,e) {

			imagen = new Object();

			imagen.url = $(e).css("background-image").match(/\(([^)]+)\)/)[1]; // La regexp es para sacarle el url()
			imagen.background_x = $(e).css("background-position-x");
			imagen.background_y = $(e).css("background-position-y");

			orden.imagenes.push(imagen);
	})

	tabla = $("#container_elegir").html();

	orden.tabla = tabla;

	$.ajax({
		url: 'guardar_pedido.php',
		type: 'POST',
		async: false,
		data: {tipo: orden.tipo, width: orden.medidas.width, height: orden.medidas.height, cantidad_paneles: orden.medidas.cantidad_paneles, imagenes_raw: JSON.stringify(orden.imagenes), tabla_raw: orden.tabla},
	})
	.done(function() {
		localStorage.setItem("wallplot_order", JSON.stringify(orden));

		location.href = "paso-4.html.php";
	})

}

function armar_tabla_collage()
{
	var collage_completo = true;

	$(".collage-elegir").each(function(i,e){
		
		if ($(e).css("background-image") == "none")
		{
			collage_completo = false;
			return false;
		}
	});

	if (collage_completo)
	{
		tabla = $("#container_elegir").html();

		orden = localStorage.getItem("wallplot_order");
		orden = JSON.parse(orden);

		orden.tabla = tabla;

		localStorage.setItem("wallplot_order", JSON.stringify(orden));

		location.href = "paso-4.html.php";	
	}
	else
	{
		alert("Faltan completar imagenes"); // TODO: cambiar alert por algo mejor
	}

	
}


/* ELEGIR FORMA Y TAMAÑO */

function update_combo_values(forma)
{
	//debugger;
	var combo_options;
	switch(forma)
	{
		case 'cuadrado':
			combo_options = {"15x15 cm": "15_15", "20x20 cm": "20_20", "30x30 cm": "30_30", "40x40 cm": "40_40", "50x50 cm": "50_50", "60x60 cm": "60_60"}
			$("#disposicion").addClass("hidden");
		break;

		case 'rectangulo':
			combo_options = {"30x15 cm": "30_15", "40x30 cm": "40_30", "50x30 cm": "50_30", "60x40 cm": "60_40", "80x50 cm": "80_50"}
			$("#disposicion").removeClass("hidden");
		break;

		case 'panoramico':
			combo_options = {"40x15 cm": "40_15", "50x15 cm": "50_15", "50x20 cm": "50_20", "60x20 cm": "60_20", "70x30 cm": "70_30"}
			$("#disposicion").addClass("hidden");
		break;
	}

	$("#cont-cmbSize").html("");
	//$el.remove(); // remove old options
	$("#cont-cmbSize").html('<select class="selectLarge tipo-m" id="cmbSize" tabindex="1" style="width: 300px"></select>');
	var $el = $("#cmbSize");
	$.each(combo_options, function(key,value) {
	  $el.append($("<option></option>")
	     .attr("value", value + "_" + forma).text(key));
	});

	$("select:not([multiple='multiple'])").attr("tabindex","1").dropkick({
        change: function (value, label) {
            $(this).change();
        }
    });

	preview_size_event();
}

function preview_size_event() {

	// Preview imagen
  	$("#cmbSize").change(function() {
		value = $(this).val();
		disposicion = $("input[name=disposicion]:checked").val();
		if (disposicion == "vertical")
		{
			width = parseInt(value.split("_")[1]);
			height = parseInt(value.split("_")[0]);
		}
		else
		{
			width = parseInt(value.split("_")[0]);
			height = parseInt(value.split("_")[1]);
		}
		

		new_h = Math.round((height*290)/175);
		new_w = Math.round(width * (new_h/height));

		template = $("#template_size").html();
		template = template.replace(/__WIDTH__/g, new_w + "px");
		template = template.replace(/__HEIGHT__/g, new_h + "px");

		$("#size").html(template);

	});
}


/* ELEGIR IMAGENES DE FUENTE */

function dibujarImagenes(imagenes)
{
	var tbl = "";

	$(imagenes).each(function(i,e){

		if (i % 4 === 0)
		{
			tbl += "<tr>";
		}

		tbl += "<td class='gal-fb'>";

		html = $("#template-imagen").html();
		html = html.replace(/#URL_IMAGEN#/g, e.picture);
		html =  html.replace(/#IMG_GRANDE#/g, e.source);
		//$("#imagenes").append(html);
		

		tbl += html;
		tbl += "</td>";

		if (i % 4 === 3)
		{
			tbl += "</tr>";
		}
	});

	$("#fb_gallery").html(tbl);

	$(".gal-fb").click(function() {
	img = "url(" + $(this).children().attr('id') + ")";
		$(".tbl-elegir").css("background-image", img);
		})
}

function ajustar_background()
{
	if ( $(".tbl-elegir").css("background-size") == "cover" )
	{
		$(".tbl-elegir").css("background-size","auto");
	}
	else
	{
		$(".tbl-elegir").css("background-size","cover");
	}
}

function ajustar_posicion_imagen()
{
	// Ajustar posicion de las imagenes
	$(".bkg-down").click(function() {
		position = $(".tbl-elegir").css("background-position-y").split("%")[0];
		position = parseInt(position) + 5;
		
		if (position <= 100)
		{
			$(".tbl-elegir").css("background-position-y", position + "%");	
		}
	})	

	$(".bkg-up").click(function() {
		position = $(".tbl-elegir").css("background-position-y").split("%")[0];
		position = parseInt(position) - 5;
		
		if (position >= 0)
		{
			$(".tbl-elegir").css("background-position-y", position + "%");	
		}
	})		

	$(".bkg-left").click(function() {
		position = $(".tbl-elegir").css("background-position-x").split("%")[0];
		position = parseInt(position) - 5;
		
		if (position >= 0)
		{
			$(".tbl-elegir").css("background-position-x", position + "%");	
		}
	})	

	$(".bkg-right").click(function() {
		position = $(".tbl-elegir").css("background-position-x").split("%")[0];
		position = parseInt(position) + 5;
		
		if (position <= 100)
		{
			$(".tbl-elegir").css("background-position-x", position + "%");	
		}
	})

}

/* FINALIZAR COMPRA */

function ver_thumb_tabla()
{
	orden = localStorage.getItem("wallplot_order");
	orden = JSON.parse(orden);

	tabla = orden.tabla;
	tabla = tabla.replace(/\n/g,"");
	tabla = tabla.replace(/\"/g,'"');
	
	if (orden.tipo == "collage")
	{
		tabla = tabla.replace(/\+/g,"");
		tabla = tabla.replace(/collage-elegir/g,"collage-elegir-thumb");	
	}
	else
	{
		tabla = tabla.replace(/tbl-elegir/g,"tbl-elegir-thumb");
	}
	
	return tabla;
}

function tabs_modal()
{
	// Eventos para elegir imagen
	$("#btn-fb").click(function() {

		$("#tab-fb").removeClass("hidden");

		$("#tab-ig").addClass("hidden");
		$("#tab-tupc").addClass("hidden");
	});

	$("#btn-ig").click(function() {

		$("#tab-ig").removeClass("hidden");

		$("#tab-fb").addClass("hidden");
		$("#tab-tupc").addClass("hidden");

	});

	$("#btn-pc").click(function() {

		$("#tab-tupc").removeClass("hidden");

		$("#tab-fb").addClass("hidden");
		$("#tab-ig").addClass("hidden");

	});
}

function elegir_imagen_event () {
	
	$(".btn-elegir").click(function() {		
		$("#modal-imagen").modal();
	});
}

function paginacion_fb()
{
	$("#next-page").click(function(){

		nextPage = $("#next-hidden").val();
		$.get( nextPage, function( response ) {

		 	$("#imagenes").html("");
		 	dibujarImagenes(response.data);

		 	nextPage = response.paging.next;
		 	$("#next-hidden").val(nextPage);

		 	prevPage = response.paging.previous;
		 	$("#prev-hidden").val(prevPage);

		 	if (typeof nextPage != 'undefined')
			{
				$("#next-page").removeClass("hidden");
			}
			else
			{
				$("#next-page").addClass("hidden");
			}

		 	if (typeof prevPage != 'undefined')
			{
				$("#prev-page").removeClass("hidden");
			}
			else
			{
				$("#prev-page").addClass("hidden");
			}
		});

	})

	$("#prev-page").click(function(){
		
		prevPage = $("#prev-hidden").val();
		$.get( prevPage, function( response ) {

		 	$("#imagenes").html("");
		 	dibujarImagenes(response.data);

		 	nextPage = response.paging.next;
		 	$("#next-hidden").val(nextPage);

		 	prevPage = response.paging.previous;
		 	$("#prev-hidden").val(prevPage);

		 	if (typeof nextPage != 'undefined')
			{
				$("#next-page").removeClass("hidden");
			}
			else
			{
				$("#next-page").addClass("hidden");
			}

		 	if (typeof prevPage != 'undefined')
			{
				$("#prev-page").removeClass("hidden");
			}
			else
			{
				$("#prev-page").addClass("hidden");
			}
		});
	})
}

$(document).ready(function() {

	tabs_modal();
	paginacion_fb();
	
})

/* INSTAGRAM API */

function elegir_foto_instagram(url_foto)
{
	if (! $.isEmptyObject($.modal) )
	{
		$td_elegido.css("background-image", "url(" + url_foto + ")");
	}
	else
	{
		window.opener.$td_elegido.css("background-image", "url(" + url_foto + ")");
		window.close();
	}

	$.modal.close();
}



/* FACEBOOK API */

// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {

    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      getUserPhotos();
      $("#btn-fbk").addClass("hidden");
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1528694377358712',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {

    FB.api('/me', function(response) {
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  function getUserPhotos()
  {
  	FB.api(
		    "/me/photos",
		    function (response) {
		      if (response && !response.error) {
		      dibujarImagenes(response.data);

		      nextPage = response.paging.next;     
		      $("#next-hidden").val(nextPage);

		      prevPage = response.paging.previous;
		 	  $("#prev-hidden").val(prevPage);

		      if (typeof nextPage != 'undefined')
				{
					$("#next-page").removeClass("hidden");
				}
				else
				{
					$("#next-page").addClass("hidden");
				}

			 	if (typeof prevPage != 'undefined')
				{
					$("#prev-page").removeClass("hidden");
				}
				else
				{
					$("#prev-page").addClass("hidden");
				}
         		  
		      }
		    }
		);
  }