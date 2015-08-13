<?php
require_once("header.html.php");
require_once ('mercadopago.php');

/* Obtén tus credenciales en:
* Argentina: https://www.mercadopago.com/mla/herramientas/aplicaciones
* Brasil: https://www.mercadopago.com/mlb/ferramentas/aplicacoes
* México: https://www.mercadopago.com/mlm/herramientas/aplicaciones
* Venezuela: https://www.mercadopago.com/mlv/herramientas/aplicaciones
* Colombia: https://www.mercadopago.com/mco/herramientas/aplicaciones
*/

session_start();

$pid = $_SESSION["pid"];
$precio = (int)$_SESSION["precio"];

$mp = new MP('6674852797490123', 'FZCBjQvOsqmXCVU9sYzJF06h9EHkZzey');

$preference_data = array(
    "items" => array(
       array(
           "title" => "Cuadro " . $_SESSION["tipo"] . " de " .  $_SESSION["width"] . " por " . $_SESSION["height"] . ".",
           "quantity" => 1,
           "currency_id" => "ARS",
           "unit_price" => $precio
       )
    ),
    "external_reference" => $pid
);

$preference = $mp->create_preference ($preference_data);
?>
<div>
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
					<img src="img/paso-3.jpg">
				</div>
				<div class="titulo-pasos pasos-oscuro">
					disfrut&aacute; tu foto
				</div>
			</div>

			<div id="contenedor-pasos-sub">
				<div class="pasos-sub">
					CARRO DE COMPRAS
				</div>
				<div class="btn-continuar hidden" style="width: 180px;">
					agregar al carro >
				</div>
			</div>

			<table id="tbl-detalle-compra">
				<tr class="titulos">
					<th>Detalle del item</th>
					<th colspan="2" class="hidden">Detalle del item</th>
					<th>Precio</th>
					<th>Cantidad</th>
				</tr>
				<tr>
					<td id="nombre_item" class="columna-detalle"><?php echo "Cuadro " . $_SESSION["tipo"] . " de " .  $_SESSION["width"] . " por " . $_SESSION["height"] . "." ?></td>
					<td id="thumb_tabla" class="columna-detalle hidden"></td>
					<td id="precio" class="columna-detalle">$<?php echo $precio; ?></td>
					<td class="columna-detalle">1</td>
				</tr>
			</table>

			<div id="comentarios-compra" class="hidden">
				<textarea rows="5" cols="50" placeholder="Agregue un comentario de ser necesario..."></textarea>
			</div>

			<div id="final-compra-btn">
				<a href="<?php echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="blue-rn-m" onreturn="execute_my_onreturn">Pagar</a>
			</div>
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

	<script type="text/javascript">

		$(function() {
			/*tabla = ver_thumb_tabla();
			$("#thumb_tabla").html(tabla);

			if (1)
			{
				$(".click-drag").remove();
				$(".btn-elegir").remove();
				$(".ajustar_background").remove();
			}*/
		});

	</script>

	<script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>

	<script type="text/javascript">
		function execute_my_onreturn (json) {

		  if (json.collection_status=='approved')
      {
        location.href = "test_pago.php?id=" + json.collection_id;
		  }
      else if(json.collection_status=='pending')
      {
		    console.log(response);
		  }
      else if(json.collection_status=='in_process')
      {
		    console.log(response);
		  }
      else if(json.collection_status=='rejected')
      {
		    console.log(response);
		  }
      else if(json.collection_status==null)
      {
		    console.log(response);
		  }
		}
	</script>

	<script type="text/javascript">
    (function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
    s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
    var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}
    window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;})();
</script>

<?php require_once("footer.html.php"); ?>
