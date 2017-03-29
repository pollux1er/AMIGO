<?php
Class Agent_model extends CI_Model
{
	public function __construct()
	{
		 $this->load->database();
	}
	
	public function getTotal()
	{
		return $this->db->count_all('agent');
	}
	
	public function getInfo($id)
	{
		$query = $this->db->query("SELECT * FROM agent WHERE id = '$id' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM agent;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getListWithClientNumber($clause=null)
	{
		
		$query = $this->db->query('SELECT a.*, av.id_vendeuse, ( SELECT COUNT(*) FROM `agent_vendeuse` WHERE id_agent = `a`.`id` ) AS `nbclients`, ( SELECT COUNT(*) FROM `vendeuse_sac` WHERE ajoute_par = `a`.`id` ) AS `nbrecords` 		FROM `agent` a LEFT JOIN agent_vendeuse av ON a.id = av.id_agent GROUP BY a.id');
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 
	}
	
	public function getLastAgents()
	{
		
		$query = $this->db->query('SELECT a.* FROM `agent` a ORDER BY a.id DESC LIMIT 3');
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 
	}
	
	public function getNbRecords()
	{
		
		$query = $this->db->query("SELECT count(*) as nbrec FROM `vendeuse_sac` a WHERE DATE_FORMAT(date_ajout, '%Y %d %M') = DATE_FORMAT(NOW(), '%Y %d %M')");
		if ($query->result())
		{
			
			$row = $query->result();
			return $row[0]->nbrec;
		
		} else
			return false; 
	}
	
	public function getListOfClients($idagent)
	{
		$query = $this->db->query("SELECT v.nom, v.numero, v.id_secteur, av.id_vendeuse   
									FROM agent_vendeuse av  
									LEFT JOIN vendeuse v ON av.id_vendeuse = v.id  
									WHERE av.id_agent = '".$idagent."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getActiveList($clause=null)
	{
		$query = $this->db->query("SELECT secteur.id, secteur.name, secteur.status, secteur.price FROM secteur WHERE secteur.status <> 'non-actif';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
    public function getAgentNameById($id)
	{
		$query = $this->db->query("SELECT nom FROM secteur WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->nom;
		}
		return false;
	}
	
	public function getNumeroAgentById($id)
	{
		$query = $this->db->query("SELECT numero FROM agent WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->numero;
		}
		return false;
	}
	
	public function getZoneByName($name)
	{
		$query = $this->db->query("SELECT * FROM secteur WHERE name = '".$name."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
   
	public function attrib_agent_vendeuse($tab)
	{
		if($this->db->insert('agent_vendeuse', $tab))
			return true;
		$this->db->where('id_vendeuse', $tab['id_vendeuse']);
		$this->db->update('agent_vendeuse', $tab);
	}
    
	public function save($data)
	{
		if(isset($data['id']))
			return $this->update($data);
		
		return $this->save_new($data);
	}
	
    public function update($tab){
        $this->db->where('id', $tab['id']);
        return $this->db->update('agent', $tab);
    }
	
	public function updatePassword($id, $password)
	{
		$this->db->where('id', $id);
        return $this->db->update('agent', array('pass' => $password));
	}
	
	public function save_new($tab)
	{
		return $this->db->insert('agent', $tab);
	}
	
	public function delete($tab)
	{
		$this->db->where('id', $tab['id']);
		$this->db->delete('agent'); 

		$this->db->where('id_agent', $tab['id']);
		$this->db->delete('agent_vendeuse');
	}
	
	public function ZonesExternal()
	{
		$query = $this->db->query("SELECT secteur.id, secteur.name, secteur.price FROM secteur WHERE status='actif' ;");
		
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 	
	}
	
	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
}
?>
