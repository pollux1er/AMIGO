<?php
Class User extends CI_Model
{
	public function login($username, $password)
	{
		$this -> db -> select('id, login, pass, type');
		$this -> db -> from('login');
		$this -> db -> where('login', $username);
		$this -> db -> where('pass', MD5($password));
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	public function getTotal()
	{
		return $this->db->count_all('user_info');
	}
	
	public function getInfo($id)
	{
		$query = $this->db->query("SELECT * FROM user_info WHERE id_user = '$id' LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT user_info.id_user, user_info.lastname, user_info.firstname, user_info.status, user_info.email, user_info.created, user_info.deleted, user_account.PIN FROM user_info LEFT JOIN user_account ON user_info.id_user = user_account.id_user WHERE user_info.deleted IS NULL '.$clause.';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
    public function getUserByEmail($email)
	{
		$query = $this->db->query("SELECT * FROM user_info WHERE email = '".$email."' and deleted IS NULL  LIMIT 1;");
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}
    public function newUser($tab)
	{
		return $this->db->insert('user_info', $tab);
	}
    
    function updateUser($tab){
        $this->load->database();
        $this->db->where('id_user', $tab['id_user']);
        return $this->db->update('user_info', $tab);
    }
	
	public function hasEaten($pin)
	{
		$iduser = $this->getIdUserFromPin($pin);
		
		if($this->logs->hasEatenToday($iduser))
			return true;
		return false;
	}
	
	public function alreadyLogged($pin)
	{
		$query = $this->db->query("SELECT `pin` FROM `log_check_day` WHERE `pin` = '".$pin."' LIMIT 1");
		$row = $query->result();
		if (!empty($row))
			return true;
		return false;
	}
	
	public function log($pin)
	{
		return $this->db->insert('log_check_day', array('pin'=>$pin));
	}
	
	public function getIdUserFromPin($pin)
	{
		$query = $this->db->query("SELECT id_user FROM `user_account` WHERE `pin` = '".$pin."' AND blocked = '0' LIMIT 1");
		//var_dump("SELECT id_user FROM `user_account` WHERE `pin` = '".$pin."' AND blocked = '0' LIMIT 1"); die;
		$row = $query->result();
		//var_dump($row); die;
		if (isset($row))
		{
			return $row[0]->id_user;
		}
		return false;
	}
}
?>
