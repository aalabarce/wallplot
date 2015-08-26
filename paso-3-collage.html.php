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
				<a href="javascript: armar_tabla_collage();">	
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
		<iframe src="instagram/home.php" width="750" height="450" frameBorder="0"></iframe>
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
				data: {forma: forma, numero_forma: numero_forma, tipo: tipo }
			})
			.done(function(response) {
				$("#container_elegir").html(response);
				$(".collage-elegir").html("+");
				
				$(".collage-elegir").click(function() {
					$td_elegido = $(this);
					//$("#modal-imagen").modal();
  					window.open("http://wallplot.com/instagram/home.php", "popupWindow", "width=600,height=600,scrollbars=yes");
				})
			})
			
			// fileuploader
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