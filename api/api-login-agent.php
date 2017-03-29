<?php 
session_start();
$sessionId = session_id();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//$ar = array("success" => true);
//echo json_encode($ar); 

//die;
 
if(isset($_POST["numero"]) && isset($_POST["password"]) ){
	if( !empty($_POST["numero"])  && !empty($_POST["password"])  ){
	
		//$conn = new mysqli("localhost", "digextec_patient", "30Decembre?", "digextec_mccann");
		$conn = new mysqli("localhost", "root", "", "mccann_amigo");
		if (mysqli_connect_errno())
		{
		  	$outp ='{"success":false,"extras":{"msg":3}}';
		}
		else {
			$username=$_POST["numero"];
			$password=$_POST["password"];
			
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = $conn->real_escape_string($username);
			$password = $conn->real_escape_string($password);
			
			$query="SELECT id, numero, pass, nom, prenom, id_tablette FROM agent WHERE numero = '".$username."' and pass = '".$password."'";
			
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			//var_dump($row);
			//
			$outp = "";
			
			if( $row ) {
				if ($outp != "") {$outp .= ",";}
				$outp .= '{"id":"'  . $row["id"] . '",';
				$outp .= '"numero":"'  . $row["numero"] . '",';
				$outp .= '"nom":"'   . $row["nom"]        . '",';
				$outp .= '"prenom":"'   . $row["prenom"]        . '"}';
			}
			
			if($outp != '')
				$outp ='{"success":true,"sessionId":"'.$sessionId.'","extras":{"userProfileModel":'.$outp.'}}';
			else
				$outp ='{"success":false,"extras":{"msg":3}}';
			
			$conn->close();
		}
		echo($outp);
	}
}
 
?>