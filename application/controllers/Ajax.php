<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function edit_zone()
	{
		$this->load->model('zone_model','',TRUE);
		$data['zone'] = $this->zone_model->getInfo($this->uri->segment('3'));
        $data['villes'] = $this->zone_model->getVilles();
		$this->load->view('ajax/edit_zone', $data);
	}
	
	public function edit_vendeuse()
	{
		$this->load->model('vendeuse_model','',TRUE);
		$this->load->model('zone_model','',TRUE);
		$data['vendeuse'] = $this->vendeuse_model->getInfo($this->uri->segment('3'));
		$data['zones'] = $this->zone_model->getList();
		$this->load->view('ajax/edit_vendeuse', $data);
	}
	
	public function edit_agent()
	{
		$this->load->model('agent_model','',TRUE);
		$data['agent'] = $this->agent_model->getInfo($this->uri->segment('3'));
		$this->load->view('ajax/edit_agent', $data);
	}
	
	public function attrib_agent()
	{
		$this->load->model('agent_model','',TRUE);
		$data['id'] = $this->uri->segment('3');
		$data['agents'] = $this->agent_model->getList();
		$this->load->view('ajax/attrib_agent', $data);
	}
	
	public function delete_zone()
	{
		$this->load->model('zone_model','',TRUE);
		$data = $this->zone_model->delete(array('id' => $this->uri->segment('3')));
	}
	
	public function save_zone()
	{
		$this->load->model('zone_model','',TRUE);
		$this->zone_model->save($this->input->post());
	}
	
	public function save_vendeuse()
	{
		$this->load->model('vendeuse_model','',TRUE);
		$this->vendeuse_model->save($this->input->post());
	}
	
	public function save_agent()
	{
		$this->load->model('agent_model','',TRUE);
		$this->agent_model->save($this->input->post());
	}
	
	public function save_agent_vendeuse()
	{
		$this->load->model('agent_model','',TRUE);
		$this->agent_model->attrib_agent_vendeuse($this->input->post());
	}
	
	public function delete_vendeuse()
	{
		$this->load->model('vendeuse_model','',TRUE);
		$data = $this->vendeuse_model->delete(array('id' => $this->uri->segment('3')));
	}
	
	public function delete_agent()
	{
		$this->load->model('agent_model','',TRUE);
		$data = $this->agent_model->delete(array('id' => $this->uri->segment('3')));
	}
	
	public function get_secteurs()
	{
		$this->load->model('zone_model','',TRUE);
		$json = json_encode($this->zone_model->get_secteurs($this->uri->segment('3')));
		echo $json;
	}
	
	public function get_clients()
	{
		$this->load->model('vendeuse_model','',TRUE);
		$json = json_encode($this->vendeuse_model->get_client_secteur($this->uri->segment('3')));
		echo $json;
	}
	
	public function send_sms_mamie()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		$this->load->model('sms_model','',TRUE);
		$this->sms_model->sendToMamie($this->input->post());
	}
	
	public function get_mamies()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		$this->load->model('vendeuse_model','',TRUE);
		$json = json_encode($this->vendeuse_model->getVendeuseWithQuotaOfAgent($this->uri->segment('3')));
		echo $json;
	}
	
	public function pass_agent()
	{
		$this->load->model('agent_model','',TRUE);
		$password = $this->agent_model->randomPassword();
		$this->agent_model->updatePassword($this->uri->segment('3'), $password);
		$message = '';
		//$this->sendSMS($this->getNumeroAgentById($this->uri->segment('3')), $message);
		//echo $password;
		$msg = "Cher agent, votre mot de passe au programme de fidélité est $password, et votre identifiant est votre numéro de téléphone. Gardez le précieusement.";
		//$this->load->view('ajax/edit_agent', $data);
		$this->load->model('sms_model','',TRUE);
		$this->sms_model->sendSMS($this->agent_model->getNumeroAgentById($this->uri->segment('3')), $msg);
		
	}
}
