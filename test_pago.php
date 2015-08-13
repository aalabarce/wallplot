<?php
require_once "mercadopago.php";
$mp = new MP ("6674852797490123", "FZCBjQvOsqmXCVU9sYzJF06h9EHkZzey");

$mp->sandbox_mode(TRUE);

$payment_info = $mp->get_payment_info($_GET["id"]);

if ($payment_info["status"] == 200) {
	print_r($payment_info["response"]);
}
?>
