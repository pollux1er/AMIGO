<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Carte extends CI_Controller{
	public $nbrec;
	function __construct()
	{
		parent::__construct();
		$this->load->model('carte_model','',TRUE);
		$this->load->model('user','', TRUE);
		$this->load->model('agent_model','agents');
		$this->nbrec = $this->agents->getNbRecords();
	}
	
	public function index(){
		if($this->session->userdata('logged_in'))
		{
			$data['nbrec'] = $this->nbrec;
			$this->load->view('generer_carte', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function sac(){
		if($this->session->userdata('logged_in'))
		{
			$data['nbrec'] = $this->nbrec;
			$this->load->view('generer_carte', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	
	
	public function imprimer()
	{
		$this->carte_model->generateBags($this->uri->segment('3'));
		$data['sacs'] = $this->carte_model->getList($this->uri->segment('3'));
		
		$this->load->library('ci_qr_code');
		$this->config->load('qr_code');
		$qr_code_config = array(); 
		$qr_code_config['cacheable'] 	= $this->config->item('cacheable');
		$qr_code_config['cachedir'] 	= $this->config->item('cachedir');
		$qr_code_config['imagedir'] 	= $this->config->item('imagedir');
		$qr_code_config['errorlog'] 	= $this->config->item('errorlog');
		$qr_code_config['ciqrcodelib'] 	= $this->config->item('ciqrcodelib');
		$qr_code_config['quality'] 		= $this->config->item('quality');
		$qr_code_config['size'] 		= $this->config->item('size');
		$qr_code_config['black'] 		= $this->config->item('black');
		$qr_code_config['white'] 		= $this->config->item('white');

		$this->ci_qr_code->initialize($qr_code_config);

		
		
		$params['level'] = ($this->input->post('level')) ? $this->input->post('level') : 'H';
		$params['size'] = ($this->input->post('size')) ? $this->input->post('size') : 3;
		
		$qrs = array();
		foreach($data['sacs'] as $sac) {
			$image_name = md5($sac->id).'.png';
			$params['data'] = "ID:".$sac->id;
			$params['savename'] = FCPATH.$qr_code_config['imagedir'].$image_name;
			$this->ci_qr_code->generate($params);
			$qrs[] = base_url().$qr_code_config['imagedir'].$image_name;
		}
		$data['qrs'] = $qrs;
		//var_dump($qrs);
		$data['nbrec'] = $this->nbrec;
		$this->load->view('imprimer_carte_sac', $data);
	}
		
	public function generate_to_pdf(){
		$this->pdf->load_view('example_to_pdf');
		$this->pdf->render();
		$this->pdf->stream("name-file.pdf");
	}
	
}