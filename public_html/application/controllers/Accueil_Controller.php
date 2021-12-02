<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//les modeles 
		$this->load->model('Partenaires_Model','parrains');	
		$this->load->model('Pays_Model','pays');		
		$this->load->model('Admin_Model','admin');		
		$this->load->model('Adherents_Model','adherent');	
		$this->load->model('Equipe_Model','equipe');	
    }

	//page accueil du back office
	public function accueil_bo(){
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/accueil',$data);
	}

	//page accueil front office
	public function index(){
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/index',$data);
	}

	//page equipe front office
	public function equipe($type){
		$data['type'] = $this->uri->segment(3);
		$data['international'] = $this->equipe->getEquipeInternationale();
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/equipe',$data);
	}

	//page contact fo
	public function contact(){
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/contact',$data);
	}

	//page inscription fo
	public function inscription(){
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$data['erreur'] = '';
		$this->load->view('pages/inscription',$data);
	}

	//page recrutement fo
	public function recrute(){
		$data['parrains'] = $this->parrains->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$data['erreur'] = '';
		$this->load->view('pages/recrute',$data);
	}
	
	// public function connexion(){
	// 	$data['parrains'] = $this->parrains->listeParrains();
	// 	$data['listepaysnom'] = $this->pays->getListeNom();
	// 	$data['nbadherents'] = $this->adherent->compterAdherents();
	// 	$this->load->view('pages/connexion',$data);
	// }

	//page media non fini
	public function media(){
		$data['parrains'] = $this->parrains->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/media',$data);
	}


	
}
