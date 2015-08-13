<?php require_once("header.html.php"); ?>

		<!-- HEADER -->
		<div id="header" class="fondo-menu">
			<div id="contenedor-header">
				<a href="/"><div id="logo-wp"></div></a>
				<div id="menu">
					<span class="item-menu">Sobre Wallplot</span>
					<span class="item-menu item-seleccionado">Comencemos</span>
					<span class="item-menu">Inspiracion</span>
					<span class="item-menu">Tama&ntilde;os y precios</span>
					<span class="item-menu">Contactenos</span>
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

			<div id="contenedor_formas">

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

		<script>

		function table_mouseover()
		{
			$(".elegir-tipo").mouseover(function() {
				var table_id = $(this).attr("id");
				$("#" + table_id + " td").css({"background-color": "#ff9b9b", "border": "3px solid #d86262"})
			});
		}

		function table_mouseout()
		{
			$(".elegir-tipo").mouseout(function() {
				var table_id = $(this).attr("id");
				$("#" + table_id + " td").css({"background-color": "#67a3c7", "border": "3px solid #ebebeb"})
			});
		}
	  original_table_id = "";
		$(function() {

		var orden = JSON.parse(localStorage.getItem("wallplot_order"));
		var forma = orden.medidas.forma.nombre;

			$.ajax({
				url: 'obtener_tipos_por_forma.php',
				type: 'GET',
				dataType: 'html',
				data: {forma: forma},
			})
			.done(function(response) {
				$("#contenedor_formas").html(response);

				$(".elegir-tipo").click(function(){
					var disenio_forma = $(this).attr("id");
					elegir_disenio_forma(disenio_forma);
				})

				// bindeo los eventos a las tablas
				table_mouseover();
				table_mouseout();

				
				/*$(".elegir-tipo").click(function() {
					original_table_id = $(this).attr("id");
					
					$("#" + original_table_id + " td").css({"background-color": "#ff9b9b", "border": "3px solid #d86262"})
					

					$(".elegir-tipo").each(function(j,k) {
						var table_id = $(k).attr("id");
						if (original_table_id != table_id)
						{
							table_mouseout();
							$(".elegir-tipo td").css({"background-color": "#67a3c7", "border": "3px solid #ebebeb"})
						}
					})
					$(this).unbind("mouseout");
					
				});*/
			})		

		})
	</script>
<?php require_once("footer.html.php"); ?>