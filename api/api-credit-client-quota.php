<?php 
session_start();
$sessionId = session_id();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

 
if(isset($_GET["id_sac"])){
	if( !empty($_GET["id_sac"]) ){
	
		$conn = new mysqli("localhost", "root", "", "mccann_amigo");
		//$conn = new mysqli("localhost", "digextec_patient", "30Decembre?", "digextec_mccann");
		if (mysqli_connect_errno())
		{
		  	$outp ='{"success":false,"extras":{"msg":3}}';
		}
		else {
			$id_sac = explode(":", $_GET["id_sac"]);
			$id_vendeuse = $_GET["id_vendeuse"];
			$id_agent = $_GET["id_agent"];
			
			// To protect MySQL injection for Security purpose
			
			$id_agent = stripslashes($id_agent);
			
			$id_agent = $conn->real_escape_string($id_agent);
			
			$infosClient = array();
			
			$query = "INSERT INTO `vendeuse_sac` (`id`, `id_vendeuse`, `id_sac`, `date_ajout`, `ajoute_par`) 
						VALUES (NULL, '$id_vendeuse', '$id_sac[1]', CURRENT_TIMESTAMP, '$id_agent');";
			
			if ($conn->query($query)) {
				$infosClient['success'] = true;
			}

			/* close connection */
			$conn->close();
			
			
			$outp = json_encode($infosClient);
		}
		echo($outp);
	}
}
 
?>