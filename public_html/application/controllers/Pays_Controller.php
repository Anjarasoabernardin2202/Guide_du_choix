<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pays_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Nouveaute_Model','nouveaute');	
		$this->load->model('Partenaires_Model','partenaire');		
		$this->load->model('Rubrique_Model','rubrique');
		$this->load->model('Pays_Model','model');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Adherents_Model','adherent');	

    }

	public function pays(){
		$config = array();
		$config["base_url"] = site_url() . "/Pays_Controller/pays";
		$config["total_rows"] = $this->model->compterPays();
		$config["per_page"] = 1;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<span>';
		$config['num_tag_close'] = '</span>';
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['next_tag_open'] = '<span style="float:right;margin-top:20%;">';
		$config['next_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span style="float:left;margin-top:20%;">';
		$config['prev_tag_close'] = '</span>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['liste']  = $this->model->listePays($config["per_page"],$page);
		$data['links'] = $this->pagination->create_links();
		if($this->session->userdata('pays')){
			$this->session->sess_destroy();
		}
		$data['nbsponsor'] = $this->nouveaute->compterInternational();
		$data['listesponsor'] = $this->nouveaute->listeInternational();
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['listepaysnom'] = $this->model->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$data['partenaires'] = $this->partenaire->listePartenairesParPays2(1);
//		$data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,1);

		$this->load->view('pages/choixpays',$data);
	}
	public function singlesponsor($id){
		if($this->session->userdata('pays')){
			$idpays = $this->session->userdata['pays'];	
			$data['idpays'] = $idpays;
			$data['singlepays'] = $this->model->singlePays($idpays);
			$data['nompays'] = $this->model->getNomById($idpays);
		}
		else{
			$data['idpays'] = null;
		}	
		$data['single'] = $this->nouveaute->singlePub($id);
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['listepaysnom'] = $this->model->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();

		$this->load->view('pages/sponsor',$data);
	}
	public function pays_bo(){
		$config = array();
		$config["base_url"] = site_url() . "/Pays_Controller/pays_bo";
		$config["total_rows"] = $this->model->compterPays();
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
		$data['suppression'] = '';
		$data['listepays'] = $this->model->listePays($config["per_page"],$page);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/pays',$data);
	}

	public function create(){
		$config2 = array();
		$config2["base_url"] = site_url() . "/Pays_Controller/pays_bo";
		$config2["total_rows"] = $this->model->compterPays();
		$config2["per_page"] = 5;
		$config2["uri_segment"] = 3;
		$config2['num_tag_open'] = '<button>';
		$config2['num_tag_close'] = '</button>';
		$config2['next_link'] = 'Suivant';
		$config2['prev_link'] = 'Précédent';
		$config2['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right">';
		$config2['next_tag_close'] = '</button>';
		$config2['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config2['prev_tag_close'] = '</button>';
		$config2['display_pages'] = FALSE;
		$config2['last_link'] = FALSE;
		$config2['first_link'] = FALSE;
		
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$config['overwrite'] = FALSE;
		$this->load->library('upload',$config);
		$files = $_FILES;
		$compter = count($_FILES['image']['name']);
		$drapeau = 'no_img.jpg';
		$carte = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$drapeau = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$carte = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
		} 
		$nom = $this->input->post('nompays');
		$acronyme = $this->input->post('acronyme');
		$introduction = $this->input->post('introduction');
		$smartphone = $this->input->post('introductionsmart');
		$erreur = $this->model->gestionErreur($nom,$acronyme,$introduction,$smartphone,$drapeau,$carte);
		if(!isset($erreur) || empty($erreur) || $erreur==null){
			$this->model->setDrapeau($drapeau);
			$this->model->setCarte($carte);
			$this->model->setNom($nom);
			$this->model->setAcronyme($acronyme);
			$smartphone == null || empty($smartphone) ? $this->model->setIntroductionSmartphone($introduction) : $this->model->setIntroductionSmartphone($smartphone);
			$this->model->setIntroduction($introduction);
			$this->model->createPays();
			$this->pagination->initialize($config2);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['message'] = 'Insertion reussie';
			$data['suppression'] = '';
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['erreur'] = '';
			$data['listepays'] = $this->model->listePays($config2["per_page"],$page);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/pays',$data);
		}
		else{
			$this->pagination->initialize($config2);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['message'] = '';
			$data['suppression'] = '';
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['listepays'] = $this->model->listePays($config2["per_page"],$page);
			$data['links'] = $this->pagination->create_links();
			$data['erreur'] = $erreur;
			$this->load->view('backoffice/pages/pays',$data);
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
		$data['single'] = $this->model->singlePays($id);
		$this->load->view('backoffice/pages/fichepays',$data);
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
		$drapeau = 'no_img.jpg';
		$drapeau1 = $this->input->post('drapeau');
		$carte1 = $this->input->post('carte');
		$carte = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$drapeau = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$carte = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
				$this->model->setDrapeau($drapeau);
				$this->model->setCarte($carte);
			if(!$this->upload->do_upload()){
				if($drapeau == null || empty($drapeau)) $this->model->setDrapeau($drapeau1);
				if($carte == null || empty($carte)) $this->model->setCarte($carte1);
			}
		} 
		$nom = $this->input->post('nompays');
		$acronyme = $this->input->post('acronyme');
		$introduction = $this->input->post('introduction');
		$smartphone = $this->input->post('introductionsmart');
		$this->model->setNom($nom);
		$this->model->setAcronyme($acronyme);
		$this->model->setIntroduction($introduction);
		$this->model->setIntroductionSmartphone($smartphone);
		$this->model->updatePays($id);
		redirect('Pays_Controller/pays_bo','refresh');
	}

	public function delete($id){
		$config = array();
		$config["base_url"] = site_url() . "/Pays_Controller/pays_bo";
		$config["total_rows"] = $this->model->compterPays();
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

		$rubriques = $this->rubrique->findByIdPays($id);
		$partenaires = $this->partenaire->findPByIdPays($id);
		if($rubriques != null && $partenaires != null){
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['message'] = '';
			$data['suppression'] = 'Suppression non validée. Données rattachés au pays detectés.';
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
			$data['erreur'] = '';
			$data['listepays'] = $this->model->listePays($config["per_page"],$page);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/pays',$data);
		}
		else{
			$this->model->deletePays($id);
			redirect('Pays_Controller/pays_bo','refresh');
		}

	}
}
