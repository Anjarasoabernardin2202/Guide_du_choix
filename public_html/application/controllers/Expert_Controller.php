<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Pays_Model','pays');		
		$this->load->model('Rubrique_Model','rubrique');
		$this->load->model('Partenaires_Model','partenaire');	
		$this->load->model('Expert_Model','model');
		$this->load->model('Guide_Model','guide');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Adherents_Model','adherent');	

    }

	public function profilexpert($idexpert){
		$data['single'] = $this->model->singleExpert($idexpert);
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/expert',$data);
	}
	
	public function expert_bo(){
		$config = array();
		$config["base_url"] = site_url() . "/Expert_Controller/expert_bo";
		$config["total_rows"] = $this->model->compterExpert();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$data['erreur'] = '';
		$data['message'] = '';
		$data['liste'] = $this->model->listeExperts($config["per_page"],$page);
		$data['listeguidenom'] = $this->guide->getListe();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/expert',$data);
	}

	public function create(){
		$config = array();
		$config["base_url"] = site_url() . "/Expert_Controller/expert_bo";
		$config["total_rows"] = $this->model->compterExpert();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$config2['upload_path'] = './assets/image';
		$config2['allowed_types'] = 'gif|jpg|png';
		$config2['max_size'] = 200;
		$config2['max_width'] = 1000;
		$config2['max_height'] = 1000;
		$config2['overwrite'] = FALSE;
		$this->load->library('upload',$config2);
		$files = $_FILES;
		$compter = count($_FILES['image']['name']);
		$logo = 'no_img.jpg';
		$profil = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$profil = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$logo = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
		} 
		$pays = $this->input->post('nompays');
		$idpays = $this->pays->findIdByName($pays);
		$guide = $this->input->post('nomguide');
		$idguide = $this->guide->findIdByName($guide);
		$nom = $this->input->post('nomexpert');
		$mail = $this->input->post('mail');
		$devis = $this->input->post('devis');
		$information = $this->input->post('information');
		$coordonnees = $this->input->post('coordonnees');
		$slogan = $this->input->post('slogan');
		$lien = $this->input->post('lien');
		$erreur = $this->model->gestionErreur($idguide,$idpays,$profil,$nom,$logo,$lien,$slogan,$mail,$information,$coordonnees,$devis);
		if($erreur == null || empty($erreur) || !isset($erreur)){
			$this->model->setImage($profil);
			$this->model->setLogo($logo);
			$this->model->setLien($lien);
			$this->model->setSlogan($slogan);
			$this->model->setIdGuide($idguide);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setMail($mail);
			$this->model->setCoordonnees($coordonnees);
			$this->model->setDevis($devis);
			$this->model->setInformation($information);
			$this->model->createExpert();
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['erreur'] = '';
			$data['message'] = 'Insertion reussie';
			$data['liste'] = $this->model->listeExperts($config["per_page"],$page);
			$data['listeguidenom'] = $this->guide->getListe();
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/expert',$data);
		}
		else{
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['erreur'] = $erreur;
			$data['message'] = '';
			$data['liste'] = $this->model->listeExperts($config["per_page"],$page);
			$data['listeguidenom'] = $this->guide->getListe();
			$data['listepaysnom'] = $this->pays->getListeNom();
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/expert',$data);
		}
	
	}

	public function read($id){
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$data['single'] = $this->model->singleExpert($id);
		$idguide = $this->model->findGuideById($id);
		$guide = $this->guide->findNameById($idguide);
		$idpays = $this->model->findIdPays($id);
		$pays = $this->pays->getNomById($idpays);
		$data['nomguide'] = $guide;
		$data['pays'] = $pays;
		$data['listeguidenom'] = $this->guide->getListe();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$this->load->view('backoffice/pages/ficheexpert',$data);
	}

	public function update($id){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$config['overwrite'] = FALSE;
		$this->load->library('upload',$config);
		$files = $_FILES;
		$compter = count($_FILES['image']['name']);
		$expert = 'no_img.jpg';
		$expert1 = $this->input->post('expert');
		$logo1 = $this->input->post('logo');
		$logo = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$expert = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$logo = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
			$this->model->setImage($expert);
			$this->model->setLogo($logo);
			if(!$this->upload->do_upload()){
				if($expert == null || empty($expert)) $this->model->setImage($expert1);
				if($logo == null || empty($logo)) $this->model->setLogo($logo1);
			}
		} 
		$guide = $this->input->post('nomguide');
		$idguide = $this->guide->findIdByName($guide);
		$pays = $this->input->post('nompays');
		$idpays = $this->pays->findIdByName($pays);
		$lien = $this->input->post('lien');
		$slogan = $this->input->post('slogan');
		$nom = $this->input->post('nomexpert');
		$mail = $this->input->post('mail');
		$devis = $this->input->post('devis');
		$information = $this->input->post('information');
		$coordonnees = $this->input->post('coordonnees');
		$this->model->setIdGuide($idguide);
		$this->model->setIdPays($idpays);
		$this->model->setSlogan($slogan);
		$this->model->setNom($nom);
		$this->model->setMail($mail);
		$this->model->setLien($lien);
		$this->model->setCoordonnees($coordonnees);
		$this->model->setDevis($devis);
		$this->model->setInformation($information);
		$this->model->updateExpert($id);
		redirect('Expert_Controller/expert_bo','refresh');
	}

	public function delete($id){
		$this->model->deleteExpert($id);
		redirect('Expert_Controller/expert_bo','refresh');
	}

}
