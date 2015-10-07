<? 
ob_start(); 
?> 
<h1>Login con Instagram</h1><span style='float:right'><a href='?id=logout'>Logout</a></span>	
<h2>User Details</h2>
<?php
session_start();
if($_GET['id']=='logout')
{
unset($_SESSION['userdetails']);
session_destroy();
	
	
}
//require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';

if (!empty($_SESSION['userdetails'])) 
{
$data=$_SESSION['userdetails'];

// Store user access token
$instagram->setAccessToken($data);

}
else
{	
header('Location: index.php');
}

?>

<h2>Fotos</h2>
<div>
<?php
$popular = $instagram->getUserMedia($data->user->id);

// Display results
foreach ($popular->data as $data) {
  echo "<a href=\"javascript: elegir_foto_instagram('{$data->images->standard_resolution->url}');\" class=\"instagram_pic\"><img style='border:0;' src=\"{$data->images->thumbnail->url}\"></a>";
}

?>
</div>
<script src="../js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../js/functions.js"></script>
<? 
ob_end_flush(); 
?> 