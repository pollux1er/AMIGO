<?php
Class Vendeuse_model extends CI_Model
{
	public function __construct()
	{
		 $this->load->database();
	}
	
	public function getTotal()
	{
		return $this->db->count_all('vendeuse');
	}
	
	public function getInfo($id)
	{
		$query = $this->db->query("SELECT * FROM vendeuse WHERE id = '$id' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
	
	public function getName($id)
	{
		$query = $this->db->query("SELECT nom FROM vendeuse WHERE id = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->nom;
		}
		return false;
	}
    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM vendeuse;');
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
    	
	public function getAgent($id)
	{
		$query = $this->db->query("SELECT CONCAT(a.nom, ' ', a.prenom) as nom FROM agent_vendeuse av LEFT JOIN agent a ON a.id = av.id_agent WHERE av.id_vendeuse = '".$id."' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row->nom;
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
        return $this->db->update('vendeuse', $tab);
    }
	
	public function save_new($tab)
	{
		return $this->db->insert('vendeuse', $tab);
	}
	
	public function delete($tab)
	{
		$this->db->where('id', $tab['id']);
        return $this->db->delete('vendeuse', $tab);
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
	
	public function insertCSV($data)
	{
		$this->db->insert('vendeuse', $data);
		return TRUE;
	}

    public function view_data()
	{
        $query = $this->db->query("SELECT v.*
                                 FROM vendeuse v 
                                 ORDER BY v.id DESC
                                 limit 100");
        return $query->result_array();
    }
	
	public function logs($id)
	{
		$query = $this->db->query("SELECT vs.date_ajout as date, a.nom, a.prenom, s.type, s.prix FROM vendeuse_sac vs 
									LEFT JOIN agent a ON a.id = vs.ajoute_par 
									LEFT JOIN sac s ON s.id = vs.id_sac  
									WHERE vs.id_vendeuse = '".$id."' ;");
		
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 
	}
	
	public function get_client_secteur($secteur)
	{
		$query = $this->db->query("SELECT id, nom FROM vendeuse WHERE id_secteur ='".$secteur."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getVendeuseOfVille($ville)
	{
		$query = $this->db->query("SELECT v.*, s.* FROM `vendeuse` v LEFT JOIN secteur s ON s.id = v.id_secteur WHERE s.ville ='".$ville."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getVendeuseOfSecteur($secteur)
	{
		$query = $this->db->query("SELECT id, nom, numero FROM vendeuse WHERE id_secteur ='".$secteur."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getVendeuseWithQuotaOfAgent($id_agent)
	{
		$query = $this->db->query("SELECT av.*, v.*, (SELECT COUNT(*) FROM `vendeuse_sac` WHERE id_vendeuse = v.id ) as quota FROM agent_vendeuse av LEFT JOIN vendeuse v ON v.id = av.id_vendeuse WHERE av.id_agent = '".$id_agent."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getVendeuseOfAgent($agent)
	{
		$query = $this->db->query("SELECT av.* FROM agent_vendeuse av LEFT JOIN vendeuse v ON v.id = av.id_vendeuse WHERE av.id_agent ='".$agent."';");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getLastClients()
	{
		
		$query = $this->db->query('SELECT a.* FROM `vendeuse` a ORDER BY a.id DESC LIMIT 3');
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 
	}
	
	public function getMamieRang()
	{
		
		$query = $this->db->query('SELECT COUNT(*) as quota, v.nom, s.nom as secteur FROM `vendeuse_sac` vs 
								LEFT JOIN vendeuse v ON v.id = vs.id_vendeuse LEFT JOIN secteur s ON s.id = v.id_secteur GROUP BY vs.`id_vendeuse` ORDER BY quota DESC LIMIT 3');
		if ($query->result())
		{
			
			return $query->result();
		
		} else
			return false; 
	}
}
?>
