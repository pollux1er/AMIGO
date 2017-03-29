<?php
Class Sms_model extends CI_Model
{
	public function __construct()
	{
		 $this->load->database();
		 $this->load->library('sms');
		 $this->load->model('vendeuse_model','',TRUE);
	}
	
	public function sendToMamie($post)
	{
		switch($post['group']){
			case "client":
				$this->sendToMamieOnly($post['id_vendeuse'], $post['sms']);
				break;
			case "secteur":
				$this->sendToMamieSecteur($post['id_secteur_1'], $post['sms']);
				break;
			case "ville":
				$this->sendToMamieVille($post['ville'], $post['sms']);
				break;
			case "agent":
				$this->sendToMamieAgent($post['agent'], $post['sms']);
				break;
		}
	}
	
	public function sendToMamieVille($id_ville, $msg)
	{   //die("ville");
		$vendeuses = $this->vendeuse_model->getVendeuseOfVille($id_ville);
		if(!empty($vendeuses))
			foreach($vendeuses as $vendeuse) {
				$num = "237" . $vendeuse->numero;
				$this->sms->Sender("121.241.242.114","80","dms-benedicte","dicteben","AMIGO","$msg","$num","1","1");
				$this->sms->Submit();
				$this->save_log(array("dest" => $vendeuse->numero, "msg => $msg"));
			}
		else {
			echo "echec";
		}
	}
	
	public function sendToMamieSecteur($id_secteur, $msg)
	{   //die("secteur");
		$vendeuses = $this->vendeuse_model->getVendeuseOfSecteur($id_secteur);
		if(!empty($vendeuses))
			foreach($vendeuses as $vendeuse) {
				$num = "237" . $vendeuse->numero;
				$this->sms->Sender("121.241.242.114","80","dms-benedicte","dicteben","AMIGO","$msg","$num","1","1");
				$this->sms->Submit();
				$this->save_log(array("dest" => $vendeuse->numero, "msg => $msg"));
			}
		else {
			echo "echec";
		}
	}
	
	public function sendToMamieAgent($id_agent, $msg)
	{	//die("agent");
		$vendeuses = $this->vendeuse_model->getVendeuseOfAgent($id_agent);
		if(!empty($vendeuses))
			foreach($vendeuses as $vendeuse) {
				$num = "237" . $vendeuse->numero;
				$this->sms->Sender("121.241.242.114","80","dms-benedicte","dicteben","AMIGO","$msg","$num","1","1");
				$this->sms->Submit();
				$this->save_log(array("dest" => $vendeuse->numero, "msg => $msg"));
			}
		else {
			echo "echec";
		}
	}
	
	public function sendToMamieOnly($id_vendeuse, $msg)
	{	//die("cleint");
		$vendeuse = $this->vendeuse_model->getInfo($id_vendeuse);
		$num = "237" . $vendeuse->numero;
		//
		if(strlen($num)==12) {
			//var_dump ($num); die;
			$this->sms->Sender("121.241.242.114","80","dms-benedicte","dicteben","AMIGO","$msg","$num","1","1");
			$this->sms->Submit();
			$this->save_log(array("dest" => $vendeuse->numero, "msg" => $msg));
			}
		else {
			echo "echec";
		}
	}
	
	public function sendSMS($num, $msg)
	{	
		$num = "237" . $num;
		//
		if(strlen($num)==12) {
			//var_dump ($num); die;
			$this->sms->Sender("121.241.242.114","80","dms-benedicte","dicteben","AMIGO","$msg","$num","1","1");
			$this->sms->Submit();
			$this->save_log(array("dest" => $num, "msg" => $msg));
			}
		else {
			echo "echec";
		}
	}
	
	public function log()
	{
		return $this->db->count_all('sms_logs');
	}
	
	public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM secteur;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function save_log($tab)
	{
		return $this->db->insert('sms_logs', $tab);
	}
	
    
}
?>
