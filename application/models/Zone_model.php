<?php
Class Zone_model extends CI_Model
{
	public function __construct()
	{
		 $this->load->database();
	}
	
	public function getTotal()
	{
		return $this->db->count_all('secteur');
	}
	
	public function getInfo($id)
	{
		$query = $this->db->query("SELECT * FROM secteur WHERE id = '$id' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
	public function getVilles()
	{
		$query = $this->db->query('SELECT distinct(ville) FROM secteur;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
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
	public function getListVille($clause=null)
	{
		$query = $this->db->query('SELECT distinct(ville) as ville FROM secteur;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function get_secteurs($ville)
	{
		$query = $this->db->query("SELECT id, nom FROM secteur WHERE ville ='".$ville."';");
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
	
    public function getZoneById($id)
	{
		$query = $this->db->query("SELECT * FROM secteur WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
	
	public function getSecteurNameById($id)
	{
		$query = $this->db->query("SELECT nom FROM secteur WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->nom;
		}
		return false;
	}
	
	public function getVilleNameById($id)
	{
		$query = $this->db->query("SELECT ville FROM secteur WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->ville;
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
   
    
	public function save($data)
	{
		if(isset($data['id']))
			return $this->update($data);
		
		return $this->save_new($data);
	}
	
    public function update($tab){
        $this->db->where('id', $tab['id']);
        return $this->db->update('secteur', $tab);
    }
	
	public function save_new($tab)
	{
		return $this->db->insert('secteur', $tab);
	}
	
	public function delete($tab)
	{
		$this->db->where('id', $tab['id']);
        return $this->db->delete('secteur', $tab);
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
	
}
?>
