<?php 
session_start();
$sessionId = session_id();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

 
if(isset($_GET["info"])){
	if( !empty($_GET["info"]) ){
	
		//$conn = new mysqli("localhost", "digextec_patient", "30Decembre?", "digextec_mccann");
		$conn = new mysqli("localhost", "root", "", "mccann_amigo");
		if (mysqli_connect_errno())
		  {
		  	$outp ='{"success":false,"extras":{"msg":3}}';
		  }
		else {
			$info = $_GET["info"];
			
			// To protect MySQL injection for Security purpose
			
			$info = stripslashes($info);
			
			$info = $conn->real_escape_string($info);
			
			$infosClient = array();
			$infosArray = explode(",", $info);
			
			foreach($infosArray as $info) {
				list($k, $v) = explode(":", $info);
				$infosClient[$k] = $v;
			}
			
			$query = "SELECT `id_sac` FROM `vendeuse_sac` WHERE `id_vendeuse` = ".$infosClient['ID'].";";
			
			if ($result = $conn->query($query)) {

				/* determine number of rows result set */
				$row_cnt = $result->num_rows;
				$infosClient['quota'] = $row_cnt;

				/* close result set */
				$result->close();
			}

			/* close connection */
			$conn->close();
			$infosClient['success'] = true;
			
			$outp = json_encode($infosClient);
		}
		echo($outp);
	}
}
 
?>