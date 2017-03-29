<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Zone extends CI_Controller{
	public $nbrec;
	function __construct()
	{
		parent::__construct();
		$this->load->model('zone_model','',TRUE);
		$this->load->model('user','', TRUE);
		$this->load->model('agent_model','agents');
		$this->nbrec = $this->agents->getNbRecords();
	}
	
	public function index()
	{	
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Liste des zones";
            $data['liste'] = $this->zone_model->getList();
			$data['nbrec'] = $this->nbrec;
			//var_dump($data); die;
			$this->load->view('zone_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function zone_add()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter un secteur";
			$data['nbrec'] = $this->nbrec;
            //$data['liste'] = $this->zone_model->getList();
			//var_dump($data); die;
			$this->load->view('zone_add', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}