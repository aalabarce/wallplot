<?php

// https://www.mercadopago.com.ar/developers/es/related/basic-sandbox

require_once "../mercadopago.php";

$mp = new MP ("6674852797490123", "FZCBjQvOsqmXCVU9sYzJF06h9EHkZzey");

$mp->sandbox_mode(TRUE);

$payment_info = $mp->get_payment_info($_GET["id"]);

if ($payment_info["status"] == 200) {
	//$payment = var_export($payment_info["response"], true);
	//error_log($payment);

	$payment = $payment_info["response"];
	$payment = $payment["collection"];

	$date_created = new DateTime($payment["date_created"]);
	$date_approved = new DateTime($payment["date_approved"]);
	$money_release_date = new DateTime($payment["money_release_date"]);

	
	/*error_log("____________________________");
	error_log("INSERT INTO notificacion_ipn values ('" . $_GET["id"] . "', " . $payment["external_reference"] . ", '" . $payment["payer"]["first_name"] . "', '" . $payment["payer"]["last_name"] . "', '" . $payment["payer"]["email"] . "', '" . $payment["reason"] . "', " . $payment["transaction_amount"] . ", '" . $payment["currency_id"] . "', " . $payment["net_received_amount"] . ", "  . $payment["total_paid_amount"] . ", " . $payment["shipping_cost"] . ", '" . $payment["status"] . "', '" . $payment["status_detail"] . "', " . $payment["installments"] . ", '" . $payment["payment_type"] . "', '" . $payment["payment_method_id"] . "', '" . $date_created->format('Y-m-d H:i:s'); . "', '" . $date_approved->format('Y-m-d H:i:s'); . "', '" . $money_release_date->format('Y-m-d H:i:s'); . "')");
	error_log("____________________________");*/

	$con = new mysqli('23.229.207.164', 'wallplot', 'Wall!Plot!1110', 'wallplot');
	$con->query("INSERT INTO notificacion_ipn values ('" . $_GET["id"] . "', " . $payment["external_reference"] . ", '" . $payment["payer"]["first_name"] . "', '" . $payment["payer"]["last_name"] . "', '" . $payment["payer"]["email"] . "', '" . $payment["reason"] . "', " . $payment["transaction_amount"] . ", '" . $payment["currency_id"] . "', " . $payment["net_received_amount"] . ", "  . $payment["total_paid_amount"] . ", " . $payment["shipping_cost"] . ", '" . $payment["status"] . "', '" . $payment["status_detail"] . "', " . $payment["installments"] . ", '" . $payment["payment_type"] . "', '" . $payment["payment_method_id"] . "', '" . $date_created->format('Y-m-d H:i:s') . "', '" . $date_approved->format('Y-m-d H:i:s') . "', '" . $money_release_date->format('Y-m-d H:i:s') . "')");

}
?>


<?php
// https://www.mercadopago.com.ar/developers/es/api-docs/basic-checkout/ipn/

/*
require_once "../mercadopago.php";

$mp = new MP("6674852797490123", "FZCBjQvOsqmXCVU9sYzJF06h9EHkZzey");

$con = new mysqli('23.229.207.164', 'wallplot', 'Wall!Plot!1110', 'wallplot');
$con->query("insert into notificacion_ipn (id, type) values ('" . $_GET["id"] . "', 'prev')");
error_log("ID: " . $_GET["id"] . ", Topic: " . $_GET["topic"], 0);
// Get the payment and the corresponding merchant_order reported by the IPN.
if($_GET["topic"] == 'payment'){
	$payment_info = $mp->get("/collections/notifications/" . $_GET["id"]);
	$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
// Get the merchant_order reported by the IPN.
} else if($_GET["topic"] == 'merchant_order'){
	$merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"]);
}

if ($merchant_order_info["status"] == 200) {
	$con->query("insert into notificacion_ipn (id, type) values ('" . $_GET["id"] . "', '200')");
	// If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items 
	$paid_amount = 0;

	foreach ($merchant_order_info["response"]["payments"] as  $payment) {
		if ($payment['status'] == 'approved'){
			$con->query("insert into notificacion_ipn (id, type) values ('" . $_GET["id"] . "', '" . $payment['status'] . "')");
			$paid_amount += $payment['transaction_amount'];
		}	
	}

	if($paid_amount >= $merchant_order_info["response"]["total_amount"]){
		if(count($merchant_order_info["response"]["shipments"]) > 0) { // The merchant_order has shipments
			if($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship"){
				print_r("Totally paid. Print the label and release your item.");
			}
		} else { // The merchant_order don't has any shipments
			print_r("Totally paid. Release your item.");
		}
	} else {
		print_r("Not paid yet. Do not release your item.");
	}
}*/
?>