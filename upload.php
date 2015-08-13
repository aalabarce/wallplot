<?php
$output_dir = "uploads/temp/";
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	//if(!is_array($_FILES["myfile"]["name"])) //single file
	//{

		$fileName = date("Y-m-d_His") . "_" ;// . $_SERVER['REMOTE_ADDR'];

 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName . ".jpg");

    	$ret[]= $fileName;
//	}
	
	
    echo json_encode($ret);
 }
 ?>