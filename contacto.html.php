<?php
require_once("header.html.php");
?>
	<div>
		<!-- HEADER -->
		<div id="header" class="fondo-menu">
			<div id="contenedor-header">
				<a href="/"><div id="logo-wp"></div></a>
				<div id="menu">
					<span class="item-menu">Sobre Wallplot</span>
					<a href="comencemos.html.php"><span class="item-menu">Comencemos</span></a>
					<a href="inspiracion.html.php"><span class="item-menu">Inspiracion</span></a>
					<a href="precios.html.php"><span class="item-menu">Tama&ntilde;os y precios</span></a>
					<a href="contacto.html.php"><span class="item-menu item-seleccionado">Contactenos</span></a>
			</div>
			</div>
		</div>
		<!-- FIN HEADER -->
		<!-- CONTENIDO -->
		<div id="contenedor">
			<div class="pasos">
				<div class="titulo-pasos pasos-oscuro">
					contactenos
				</div>
			</div>
			<div id="form-main">
			  <div id="form-div">
			    <form class="form" id="form1">
			      
			      <p class="name">
			        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nombre" id="name" required />
			      </p>
			      
			      <p class="email">
			        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" required />
			      </p>
			      
			      <p class="text">
			        <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comentario" required></textarea>
			      </p>
			      
			      
			      <div class="submit">
			        <input type="submit" value="Enviar" id="button-blue"/>
			        <div class="ease"></div>
			      </div>
			    </form>
			  </div>
			</div>
			<br>
		</div>
		<!-- FIN CONTENIDO -->

		<div class="clear"></div>

		<!-- FOOTER -->
		<div id="footer">
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

<?php require_once("footer.html.php"); ?>
