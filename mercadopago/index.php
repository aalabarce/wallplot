<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

$producto = $_GET['producto'];

$con = new mysqli('23.229.207.164', 'wallplot', 'Wall!Plot!1110', 'wallplot');

//$sql = "select precio from wallplot where productID like $producto";
$sql = mysqli_query($con, "SELECT precio FROM wallplot WHERE productID LIKE '$producto';");

$ulti = mysqli_fetch_array($sql, MYSQLI_NUM);

echo "el producto $producto sale $ulti[0] pesos";

$con->close();

?>
