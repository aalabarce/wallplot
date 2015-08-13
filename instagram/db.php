<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'USUARIO');
define('DB_PASSWORD', 'CLAVE123');
define('DB_DATABASE', 'NOMBREDEBASE');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
