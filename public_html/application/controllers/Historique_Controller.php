<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historique_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();	
      $this->load->model('Admin_Model','admin');
      
    }

	public function historique(){
		$email = $this->session->userdata['admin'];
		$data['admin'] = $this->admin->getProfil($email);
		$this->load->view('backoffice/pages/historique',$data);
	}


	
	
}
