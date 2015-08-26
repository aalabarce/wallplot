<?php require_once("header.html.php"); ?>
<!-- #FIXME -->
<link rel="stylesheet" href="css/dropkick.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href="./css/custom.css?v=1.0.2" rel="stylesheet">
<link href="css/all.css" rel="stylesheet">
<!-- #FIXME -->

<div id="template_size" class="hidden">
	<div style="width: __WIDTH__; height: __HEIGHT__; background-color: #000; margin: 10px auto;">&nbsp;</div>
</div>
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
				<a href="javascript: elegir_medidas();">
					<div class="btn-continuar">
						Continuar >
					</div>
				</a>	
			</div>

			<!-- ELEGI -->
			<div>
				<div id="izq-tipo-m">

					<select class="selectLarge tipo-m" id="cmbSize" tabindex="1" style="width: 300px">
						<option value="50_50_cuadrado">50x50CM</option>
						<option value="40_40_cuadrado">40X40CM</option>
						<option value="30_30_cuadrado">30X30CM</option>
						<option value="20_40_rectangulo">20X40CM</option>
						<option value="30_60_rectangulo">30X60CM</option>
					</select>
				</div>

				<div id="der-tipo-m">
					<div class="texto-referencia">
						<div class="titulo-referencia">Referencia de tama&ntilde;o del lienzo seleccionado</div>
						<div class="subt-referencia">(este es un ejemplo del tama&ntilde;o del lienzo que selecciono con respecto a una persona promedio)</div>
					</div>
					<div id="size" style="width: 400px; float: left">&nbsp;</div>
					<div class="persona-referencia">
						<img src="img/persona-referencia.png">
					</div>	
				</div>	
	 

				<div class="clear"></div>
				
			
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
	<script src="js/jquery-1.7.2.min.js"></script>
  	<script src="js/jquery.dropkick-1.0.0.js"></script>
  	<script src="js/icheck.min.js"></script>
  	<script src="./js/custom.min.js"></script>

    <script>
		  $(document).ready(function(){

	  		// Para estilar los combos
		 	$("select:not([multiple='multiple'])").attr("tabindex","1").dropkick({
		        change: function (value, label) {
		            $(this).change();
		        }
		    });

		  	preview_size_event();

		  	// iCheck
		    var callbacks_list = $('.demo-callbacks ul');
		    $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
		      callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
		    }).iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%'
		    });
		  });	
  </script>
<?php require_once("footer.html.php"); ?>