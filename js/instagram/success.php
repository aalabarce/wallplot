<? 
ob_start(); 
?> 
<?php
require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';

// Receive OAuth code parameter
$code = $_GET['code'];

// Check whether the user has granted access
if (true === isset($code)) {

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
echo "<pre>";
print_r ($data);
echo "</pre>";
  // Take a look at the API response
   
	if(empty($data->user->username))
	{
	header('Location: index.php');

	}
	else
	{
		session_start();
		$_SESSION['userdetails']=$data;
		$user=$data->user->username;
		$fullname=$data->user->full_name;
		$bio=$data->user->bio;
		$website=$data->user->website;
		$id=$data->user->id;
		$token=$data->access_token;

	$id_check=mysql_query("select instagram_id from instagram_users where instagram_id='$id'");

	if(mysql_num_rows($id_check) == 0)
	{	
	mysql_query("insert into instagram_users(username,Name,Bio,Website,instagram_id,instagram_access_token) values('$user','$fullname','$bio','$website','$id','$token')");
	}
	header('Location: http://www.senadorcollareco.com/instagram/home.php');
	}
} 
else 
{
// Check whether an error occurred
if (true === isset($_GET['error'])) 
{
    echo 'An error occurred: '.$_GET['error_description'];
}

}

?>
<? 
ob_end_flush(); 
?> 
