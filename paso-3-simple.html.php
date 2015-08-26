<?php require_once("header.html.php"); ?>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.modal.css" type="text/css" media="screen" />
	<link href="css/uploadfile.min.css" rel="stylesheet">

	<div>
		<!-- HEADER -->
		<div id="header" class="fondo-menu">
			<div id="contenedor-header">
				<a href="/"><div id="logo-wp"></div></a>
				<div id="menu">
					<span class="item-menu">Sobre Wallplot</span>
					<a href="comencemos.html.php"><span class="item-menu item-seleccionado">Comencemos</span></a>
					<a href="inspiracion.html.php"><span class="item-menu">Inspiracion</span></a>
					<a href="precios.html.php"><span class="item-menu">Tama&ntilde;os y precios</span></a>
					<a href="contacto.html.php"><span class="item-menu">Contactenos</span></a>
			</div>
			</div>
		</div>
		<!-- FIN HEADER -->
		<!-- CONTENIDO -->
		<div id="contenedor">

			<div class="pasos">
				<div class="numero-pasos">
					<img src="img/paso-2.jpg">
				</div>	
				<div class="titulo-pasos pasos-oscuro">
					eleg&iacute; tu lienzo para imprimir
				</div>
			</div>	
			<div id="contenedor-pasos-sub">
				<div class="pasos-sub">
					A- Seleccionar tipo y medida del lienzo
				</div>	
				<a href="javascript: elegir_imagen();">
					<div class="btn-continuar">
						Continuar >
					</div>
				</a>
			</div>

			<div id="container_elegir">

			</div>

			
			<!-- FIN CONTENIDO -->

			<div class="clear"></div>
			
			<!-- FOOTER -->
			<div id="footer" style="display:none">
				<div id="contenedor-footer">	
					<div id="cuadros-footer"></div>
					<div id="contenedor-lista">
						 <div id="titulo-lista">Nos encanta la impresi&oacute;n de fotos!</div> 
						 <div class="lista-footer">
						 	. Mejor impresi&oacute;n de la lona de la calidad en cualquier lugar! <br>
							. Atenci&oacute;n al cliente inmejorable. <br>
							. Pruebas digitales gratuitos. <br>
							. Gratis de im&aacute;genes puesta a punto PicturePerfect &#8482;. <br>
							. 100% "Love it" garant&iacute;a de por vida! <br>
						 </div>
					 </div>
					 <div id="contacto">
					 	<img src="img/contacto.png">
					 </div>
					 <div id="redes-sociales">
					 	<a href="#"><img src="img/instagram-logo.jpg"></a>
					 	<a href="#"><img src="img/facebook-logo.jpg"></a>
					 	<a href="#"><img src="img/twitter-logo.jpg"></a>
					 </div>
				 </div>
			</div>
			<!-- FIN FOOTER -->

		</div>

	</div>

	<!-- MODAL -->
	<div id="modal-imagen" class="modal">

		<div id="btns-modal">
			<div id="btn-fb" class="btn-modal">facebook</div>
			<div id="btn-ig" class="btn-modal">instagram</div>
			<div id="btn-pc" class="btn-modal">tu compu</div>
		</div>
		<div class="clear"></div>

		<div id="tab-fb">
			
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();" id="btn-fbk">
			</fb:login-button>

			<div id="status">
			</div>

			<!--
			<div id="imagenes">
			</div>
			-->

			<div id="template-imagen" class="hidden">
				<img src="#URL_IMAGEN#" style="height:100px" id="#IMG_GRANDE#" class="multiple-borders">
			</div>

			<table id="fb_gallery">

			</table>
			
			<div id="next-page" class="btn-continuar">Siguiente >></div>
			<div id="prev-page" class="btn-continuar"><< Anterior</div>
			<input id="next-hidden" type="hidden"></input>
			<input id="prev-hidden" type="hidden"></input>

		</div>

		<div id="tab-ig" class="hidden">
			<iframe src="/instagram/home.php" width="400" height="550" frameborder="0"></iframe>
		</div>

		<div id="tab-tupc" class="hidden">
			<div id="fileuploader">Subir</div>
		</div>

	</div>
	<!-- FIN MODAL -->

	<script src="js/jquery.modal.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.uploadfile.min.js"></script>
	<script src="js/drag-image.js"></script>

	<script>
		$(function() {

			$td_elegido = "";

			// obtengo el template para cargar las imagenes
			var orden = localStorage.getItem("wallplot_order");
			orden = JSON.parse(orden);

			var forma = orden.medidas.forma.nombre;
			var numero_forma = orden.medidas.forma.numero;
			var tipo = orden.tipo;

			$.ajax({
				url: 'obtener_tabla_elegir_imagen.php',
				type: 'GET',
				dataType: 'html',
				data: {forma: forma, numero_forma: numero_forma, tipo: tipo}
			})
			.done(function(response) {
				$("#container_elegir").html(response);
				elegir_imagen_event();
				ajustar_posicion_imagen();
				medidas_tabla = calcular_tamanio_lienzo();

				var width = medidas_tabla.width;
				var height = medidas_tabla.height;

				$(".tbl-elegir").width(width);
				$(".tbl-elegir").height(height);
			})

			$("#fileuploader").uploadFile({
				url:"upload.php",
				fileName:"myfile",
				onSuccess:function(files,data,xhr)
				{	
					// data trae el nombre de la imagen correspondiente
					img = "url(uploads/temp/" + data.substr(2, data.length - 4) + ".jpg)";
		  			$(".tbl-elegir").css("background-image", img);
				}
			});

		})	
	</script>
	
<?php require_once("footer.html.php"); ?>	