<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recherche_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination');	
		$this->load->model('Pays_Model','pays');
		$this->load->model('Rubrique_Model','rubrique');
		$this->load->model('Guide_Model','guide');		
		$this->load->model('Chapitre_Model','chapitre');		
		$this->load->model('Recherche_Model','model');
		$this->load->model('Adherents_Model','adherent');	

    }

	public function recherche()
	{	
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$mot = $this->input->get('mot');
		$data['mot'] = $mot;
		$nbguide = $this->guide->compterResultatRecherche($mot);
		$nbrubrique = $this->rubrique->compterResultatRecherche($mot);
		// $nbpays = $this->pays->compterResultatRecherche($mot);
		$data['listerecherche'] = $this->model->recherche($mot);
		$data['somme'] = $nbguide+$nbrubrique;
		$data['nbadherents'] = $this->adherent->compterAdherents();		
		$this->load->view('pages/recherche',$data);
	}

	
}
