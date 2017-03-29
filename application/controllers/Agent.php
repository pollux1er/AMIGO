<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Agent extends CI_Controller{
	public $nbrec;
	function __construct()
	{
		parent::__construct();
		$this->load->model('agent_model','',TRUE);
		$this->load->model('user','', TRUE);
		$this->nbrec = $this->agent_model->getNbRecords();
	}
	
	public function index()
	{	
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Liste des agents";
            $data['liste'] = $this->agent_model->getListWithClientNumber();
			$data['nbrec'] = $this->nbrec;
			
			$this->load->view('agent_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function list_client()
	{	
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('vendeuse_model','',TRUE);
			$this->load->model('zone_model','',TRUE);
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Liste des client de l'agent";
            $data['liste'] = $this->agent_model->getListOfClients($this->uri->segment('3'));
			$data['nbrec'] = $this->nbrec;
			//var_dump($data); die;
			$this->load->view('client_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function agent_add()
	{
		if($this->session->userdata('logged_in'))
		{
			//$this->load->model('zone_model','',TRUE);
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter un agent";
            //$data['zones'] = $this->zone_model->getList();
			//var_dump($data); die;
			$data['nbrec'] = $this->nbrec;
			$this->load->view('agent_add', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function updateuser($id)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Modification d'un utilisateur";
            $data['current'] = $this->user->getInfo($id);
			$this->load->view('user_new', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
    public function deleteuser()
	{
		if($this->session->userdata('logged_in'))
		{
         if(!($this->input->post('id_user'))) echo 'Id inexistant';
         else {
             $save=array();
             $save['id_user']=$this->input->post('id_user');
             $save['deleted']=date('Y-m-d h:i:s');
             $s=$this->user->updateUser($save);
             $this->accounts->blockAccount($save['id_user']); // bloquer un compte aussitôt que l'utilisateur est supprimé
             if($s) echo 'true';
             else echo 'Problème lors de l\'enregistrement';
         }
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	
}