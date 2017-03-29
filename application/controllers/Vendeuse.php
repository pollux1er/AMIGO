<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vendeuse extends CI_Controller{
	
	private $_controller_url 		= 'qr_code_generate/';
	private $_method_url 			= '';
	private $_form_attributes 		= array();
 
	public  $data 					= array();
	
	public $nbrec;
	
	function __construct()
	{
		parent::__construct();
		//$this->load->model('vendeuse_model','',TRUE);
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
			$data['title'] = "Liste des vendeuses";
			$this->load->model('vendeuse_model');
            $data['liste'] = $this->vendeuse_model->getList();
			$data['nbrec'] = $this->nbrec;
			//var_dump($data); die;
			$this->load->view('vendeuse_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function vendeuse_add()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('zone_model','',TRUE);
			$session_data = $this->session->userdata('logged_in');
			//$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter une vendeuse";
            $data['zones'] = $this->zone_model->getList();
			$data['nbrec'] = $this->nbrec;
			//var_dump($data); die;
			$this->load->view('vendeuse_add', $data);
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
	
	public function load_data()
	{
		$this->data['view_data']= $this->vendeuse_model->view_data();
		$this->data['nbrec'] = $this->nbrec;
		$this->load->view('excelimport', $this->data, FALSE);
	}
	
	public function import_csv()
	{
		$data['nbrec'] = $this->nbrec;
		$this->load->view('excelimport', $data);
	}
	
	public function import(){
		if(isset($_POST["import"]))
		{ 
			$filename = $_FILES["donnees"]["tmp_name"];
			if($_FILES["donnees"]["size"] > 0)
				{ 
					$file = fopen($filename, "r");
					while (($importdata = fgetcsv($file, 10000, ";")) !== FALSE)
					{
						$data = array(
						  'nom' => $importdata[0],
						  'numero' =>$importdata[1],
						  );
						$insert = $this->vendeuse_model->insertCSV($data);
					}                    
					fclose($file);
					$this->session->set_flashdata('message', 'Data are imported successfully..');
					redirect('vendeuse/load_data');
				}else{
					$this->session->set_flashdata('message', 'Something went wrong..');
					redirect('vendeuse/load_data');
				}
		}
	}
	
	public function voir_carte()
	{
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
		$this->load->model('vendeuse_model');
		$this->data['vendeuse'] = $vendeuse = $this->vendeuse_model->getInfo($this->uri->segment('3'));
		
		$image_name = 'qr_code_client'.$vendeuse->id.'.png';
		
		$params['data'] = "Nom:".$vendeuse->nom.",Numero:".$vendeuse->numero.",Secteur:".$vendeuse->id_secteur.",ID:".$vendeuse->id."";
		//var_dump($params); die;
		
		$params['level'] = ($this->input->post('level')) ? $this->input->post('level') : 'H';
		
		$params['size'] = ($this->input->post('size')) ? $this->input->post('size') : 5;
		
		$this->data['logs'] = $this->vendeuse_model->logs($this->uri->segment('3'));
		
		$params['savename'] = FCPATH.$qr_code_config['imagedir'].$image_name;
		
		$this->ci_qr_code->generate($params); 
		
		//var_dump($params); die;
		
		$this->data['qr_code_image_url'] = base_url().$qr_code_config['imagedir'].$image_name;
		$this->data['nbrec'] = $this->nbrec;
		$this->load->view('vendeuse_carte', $this->data);
	}
	
	public function telecharge_carte()
	{
		$lien_image = "assets/images/carte_new".$this->uri->segment('3').".png";
		//var_dump($lien_image); die;
		// $ch = curl_init($lien_image);
		// $fp = fopen('carte.png', 'wb');
		// curl_setopt($ch, CURLOPT_FILE, $fp);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_exec($ch);
		// curl_close($ch);
		// fclose($fp);
		
		//$basename = basename($_GET['img']);
		$filename = BASEPATH . '/' . $lien_image; // don't accept other directories

		$mime = ($mime = getimagesize($filename)) ? $mime['mime'] : $mime;
		$size = filesize($filename);
		$fp   = fopen($filename, "rb");
		if (!($mime && $size && $fp)) {
		  // Error.
		  return;
		}

		header("Content-type: " . $mime);
		header("Content-Length: " . $size);
		// NOTE: Possible header injection via $basename
		header("Content-Disposition: attachment; filename=" . $lien_image);
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		fpassthru($fp);
	}
	
}