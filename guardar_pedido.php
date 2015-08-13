<?php

$con = new mysqli('23.229.207.164', 'wallplot', 'Wall!Plot!1110', 'wallplot');

$tipo = $_POST["tipo"];
$width = $_POST["width"];
$height = $_POST["height"];
$cantidad_paneles = $_POST["cantidad_paneles"];
$imagenes_raw = $_POST["imagenes_raw"];
$tabla_raw = $_POST["tabla_raw"];

$sql = "INSERT INTO pedido (tipo, width, height, cantidad_paneles, imagenes_raw, tabla_raw) VALUES ('" . $tipo;
$sql .= "', " . $width . ", " . $height;
$sql .= $tipo == "multiple"? ", " . $cantidad_paneles : "";
$sql .= ", '" . $imagenes_raw . "', '" . $tabla_raw . "');";


$con->query($sql);

session_start();

// Obtengo el id del pedido
$result = $con->query("SELECT LAST_INSERT_ID() as pid;");

while($row = mysqli_fetch_assoc($result)) 
{
    $_SESSION["pid"] = $row["pid"];
}

// Obtengo el precio del cuadro

$sql = "SELECT precio FROM precio p WHERE tipo = '" . $tipo . "'";
$sql .= " AND width = " . $width;
$sql .= " AND height = " . $height;
$sql .= is_null($cantidad_paneles)? "" : " AND cant_paneles = " . $cantidad_paneles . ";";

$result = $con->query($sql);

while($row = mysqli_fetch_assoc($result)) 
{
    $precio = $row["precio"];
}

// Por seguridad si no encontro el precio en la db le pongo un valor alto
$_SESSION["precio"] =  isset($precio) ? $precio : 999;

$_SESSION["tipo"] = $tipo;
$_SESSION["width"] = $width;
$_SESSION["height"] = $height;

?>
