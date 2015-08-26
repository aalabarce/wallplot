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
					<a href="comencemos.html.php"><a href="comencemos.html.php"><span class="item-menu item-seleccionado">Comencemos</span></a></a>
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
					<div class="radio-title">Forma:</div>
					<div class="demo-list">
						<ul>
      						<li>
								<input tabindex="3" type="radio" id="input-1" name="forma-radio" value="cuadrado">
		            			<label for="input-1">Cuadrado<span></span></label>
            				</li>
            				<li>
								<input tabindex="3" type="radio" id="input-2" name="forma-radio" value="rectangulo">
		            			<label for="input-2">Rectangular<span></span></label>
            				</li>
            				<li>
								<input tabindex="3" type="radio" id="input-3" name="forma-radio" value="panoramico">
		            			<label for="input-3">Panor&aacute;mico<span></span></label>
            				</li>
 				     	</ul>
					</div>
					<br style="clear: both">
					<div id="disposicion" class="hidden">
						<div class="radio-title">Disposici&oacute;n:</div>
						<div class="demo-list">
							<ul>
	      						<li>
									<input tabindex="3" type="radio" id="input-h" name="disposicion" value="horizontal">
			            			<label for="input-h">Horizontal<span></span></label>
	            				</li>
	            				<li>
									<input tabindex="3" type="radio" id="input-v" name="disposicion" value="vertical">
			            			<label for="input-v">Vertical<span></span></label>
	            				</li>
	 				     	</ul>
						</div>
					</div>
					<div id="cont-cmbSize">
						<select class="selectLarge tipo-m" id="cmbSize" tabindex="1" style="width: 300px">
						</select>
					</div>	
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

		  	// iCheck
		    var callbacks_list = $('.demo-callbacks ul');
		    $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
		      callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
		    }).iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%'
		    });

		    $('input[name=forma-radio]').on('ifChecked', function(event){
				// 
			  	update_combo_values(this.value);

			  	// Actualizo el preview del tamaño cuando hay click en un radio
		    	value = $("#cmbSize").val();
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

			$('input[name=disposicion]').on('ifChecked', function(event){

			  	// Actualizo el preview del tamaño cuando hay click en un radio
		    	value = $("#cmbSize").val();
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
		  });	
  </script>

<?php require_once("footer.html.php"); ?>