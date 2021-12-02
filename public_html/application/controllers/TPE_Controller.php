<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TPE_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();	
		$this->load->model('Pays_Model','pays');		
		$this->load->model('About_Model','model');
		$this->load->model('Adherents_Model','adherent');

    }

	public function detailrubriqueTPE (){
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/detailrubriqueTPE', $data);
	}

	public function guideTPE(){
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/guideTPE', $data);
	}
	

	

}
?>