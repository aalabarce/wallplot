<?php 

require_once "nusoap/lib/nusoap.php";

class TrackingDao
{

	public function getTrackingEnvio_EstadoActual($params)
	{
		$client = new nusoap_client("http://webservice.oca.com.ar/oep_tracking/?wsdl",true);
 
		$error = $client->getError();
		if ($error) {
		    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
		}
		$result = $client->call("GetCentrosImposicionPorCP", array("CodigoPostal" => "1428"));
		 
		if ($client->fault) {
		    echo "<h2>Fault</h2><pre>";
		    print_r($result);
		    echo "</pre>";
		}
		else {
		    $error = $client->getError();
		    if ($error) {
		        echo "<h2>Error</h2><pre>" . $error . "</pre>";
		    }
		    else {
		        echo "<h2>Result</h2><pre>";
		        print_r($result);
		        echo "</pre>";
		    }
		}/*	*/
	}



}

$test = new TrackingDao();

$test->getTrackingEnvio_EstadoActual(null);