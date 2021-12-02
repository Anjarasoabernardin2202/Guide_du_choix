<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apropos_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();	
		$this->load->model('Partenaires_Model','parrains');		
		$this->load->model('Pays_Model','pays');		
		$this->load->model('About_Model','model');
		$this->load->model('Adherents_Model','adherent');
    }

	public function about($idpage){
		$data['idpage'] = $this->uri->segment(3);
		$data['liste']  = $this->model->listeAbout();
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/apropos',$data);
	}

}
