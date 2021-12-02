<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parrain_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');	
		$this->load->model('Pays_Model','pays');		
		$this->load->model('Partenaires_Model','model');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Adherents_Model','adherent');	

    }

	public function parrains(){
		$config = array();
		$config["base_url"] = site_url() . "/Parrain_Controller/parrains";
		$config["total_rows"] = $this->model->compterPartenaire();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"]  / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['liste']  = $this->model->listeParrainsLimite($config["per_page"],$page);	
		$data['parrains'] = $this->model->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();

		$this->load->view('pages/parrains',$data);
	}

	public function parrain_bo(){
		$config = array();
		$config['base_url'] = site_url()."/Parrain_Controller/parrain_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterParrain();
		$config['per_page'] = 5;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right;">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['message'] = '';
		$data['erreur'] = '';
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$data['links'] = $this->pagination->create_links();
		$data['liste'] = $this->model->listeParrainsLimite($config['per_page'],$page);
		$this->load->view('backoffice/pages/parrains',$data);
	}

	public function partenaire_bo(){
		$config = array();
		$config['base_url'] = site_url()."/Parrain_Controller/partenaire_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterPartenaire();
		$config['per_page'] = 5;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right;">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['message'] = '';
		$data['erreur'] = '';
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$data['links'] = $this->pagination->create_links();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['liste'] = $this->model->listePartenaires($config['per_page'],$page);
		$this->load->view('backoffice/pages/partenaires',$data);
	}
	
	public function createParrain(){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 0;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;

		$config2 = array();
		$config2['base_url'] = site_url()."/Parrain_Controller/parrain_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterParrain();
		$config2['per_page'] = 5;
		$config2['num_tag_open'] = '<button>';
		$config2['num_tag_close'] = '</button>';
		$config2['next_link'] = 'Suivant';
		$config2['prev_link'] = 'Précédent';
		$config2['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right;">';
		$config2['next_tag_close'] = '</button>';
		$config2['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config2['prev_tag_close'] = '</button>';
		$config2['display_pages'] = FALSE;
		$config2['last_link'] = FALSE;
		$config2['first_link'] = FALSE;

		$this->load->library('upload',$config);
		if(isset($this->session->userdata['admin'])){
			$initialize = $this->upload->initialize($config);
			$image = 'no_img.jpg';
			$this->upload->do_upload('image');
			$data = $this->upload->data();
			$image = $data['file_name'];
			$nom = $this->input->post('nomparrain');
			$introduction = $this->input->post('introduction');
			$description = $this->input->post('description');
			$idpays = 0;
			$type = 'International';
			$erreur = $this->model->gestionErreurParrain($image,$idpays,$nom,$introduction,$description,$type);
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdPays($idpays);
				$this->model->setImage($image);
				$this->model->setNom($nom);
				$this->model->setIntroduction($introduction);
				$this->model->setTypePartenaire($type);
				$this->model->setDescription($description);
				$this->model->createPartenaire();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listeParrainsLimite($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/parrains',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listeParrainsLimite($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/parrains',$data);
			}
		}
		else{
			redirect('Login_Controller/logout');
		}
	}

	public function updateParrain($idparrain){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$this->load->library('upload',$config);
		$initialize = $this->upload->initialize($config);
		$image = 'no_img.jpg';
		$nom = $this->input->post('nomparrain');
		$introduction = $this->input->post('introduction');
		$description = $this->input->post('description');
		if($this->upload->do_upload('image')){
			$data = $this->upload->data();
			$image = $data['file_name'];
			$this->model->setImage($image);
			$this->model->setNom($nom);
			$this->model->setIntroduction($introduction);
			$this->model->setDescription($description);
			$this->model->updatePartenaire($idparrain);
			redirect('Parrain_Controller/parrain_bo','refresh');
		}
		if(!$this->upload->do_upload('image')){
			$img = $this->input->post('img');
			$this->model->setImage($img);
			$this->model->setNom($nom);
			$this->model->setIntroduction($introduction);
			$this->model->setDescription($description);
			$this->model->updatePartenaire($idparrain); 
			redirect('Parrain_Controller/parrain_bo','refresh');
		}
	}

	public function createPartenaire(){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 0;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;

		$config2 = array();
		$config2['base_url'] = site_url()."/Parrain_Controller/partenaire_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterPartenaire();
		$config2['per_page'] = 5;
		$config2['num_tag_open'] = '<button>';
		$config2['num_tag_close'] = '</button>';
		$config2['next_link'] = 'Suivant';
		$config2['prev_link'] = 'Précédent';
		$config2['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right;">';
		$config2['next_tag_close'] = '</button>';
		$config2['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config2['prev_tag_close'] = '</button>';
		$config2['display_pages'] = FALSE;
		$config2['last_link'] = FALSE;
		$config2['first_link'] = FALSE;

		$this->load->library('upload',$config);
		if(isset($this->session->userdata['admin'])){
			$initialize = $this->upload->initialize($config);
			$image = 'no_img.jpg';
			$this->upload->do_upload('image');
			$data = $this->upload->data();
			$image = $data['file_name'];
			$nom = $this->input->post('nompartenaire');
			$introduction = $this->input->post('introduction');
			$description = $this->input->post('description');
			$nompays = $this->input->post('nompays');
			($nompays !=null || !empty($nompays)) ? $idpays = $this->pays->findIdByName($nompays) : $idpays = 0;
			$type = 'National';
			$erreur = $this->model->gestionErreurPartenaire($image,$idpays,$nom,$introduction,$description,$type);
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdPays($idpays);
				$this->model->setImage($image);
				$this->model->setNom($nom);
				$this->model->setIntroduction($introduction);
				$this->model->setTypePartenaire($type);
				$this->model->setDescription($description);
				$this->model->createPartenaire();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listePartenaires($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listepaysnom'] = $this->pays->getListeNom();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/partenaires',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listePartenaires($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listepaysnom'] = $this->pays->getListeNom();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/partenaires',$data);
			}
		}
		else{
			redirect('Login_Controller/logout');
		}
	}

	public function updatePartenaire($idpartenaire){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$this->load->library('upload',$config);
		$initialize = $this->upload->initialize($config);
		$image = 'no_img.jpg';
		$nom = $this->input->post('nompartenaire');
		$introduction = $this->input->post('introduction');
		$description = $this->input->post('description');
		$pays = $this->input->post('nompays');
		$idpays = $this->pays->findIdByName($pays);
		if($this->upload->do_upload('image')){
			$data = $this->upload->data();
			$image = $data['file_name'];
			$this->model->setImage($image);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setIntroduction($introduction);
			$this->model->setDescription($description);
			$this->model->updatePartenaire($idpartenaire);
			redirect('Parrain_Controller/partenaire_bo','refresh');
		}
		if(!$this->upload->do_upload('image')){
			$img = $this->input->post('img');
			$this->model->setImage($img);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setIntroduction($introduction);
			$this->model->setDescription($description);
			$this->model->updatePartenaire($idpartenaire);
			redirect('Parrain_Controller/partenaire_bo','refresh');
		}
	}

	public function readParrain($id){
		$data['single'] = $this->model->singlePartenaire($id);
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/ficheparrain',$data);
	}

	public function readPartenaire($id){
		$data['single'] = $this->model->singlePartenaire($id);
		$idpays = $this->model->findIdPays($id);
		$pays = $this->pays->getNomById($idpays);
		$data['nompays'] = $pays;
		$data['listepaysnom'] = $this->pays->getListeNom();
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/fichepartenaire',$data);
	}

	public function deleteParrain($id){
		$this->model->deletePartenaire($id);
		redirect('Parrain_Controller/parrain_bo','refresh');
	}

	public function deletePartenaire($id){
		$this->model->deletePartenaire($id);
		redirect('Parrain_Controller/partenaire_bo','refresh');
	}
	

	public function sponsor(){
		$config = array();
		$config["base_url"] = site_url() . "/Parrain_Controller/sponsor";
		$config["total_rows"] = $this->nouveaute->compterPubs();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-personnalized" id="positionpaginationsuivant">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-personnalized" id="positionpaginationprecedent">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
		$data['parrains'] = $this->model->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/sponsor',$data);
	}
	
	public function international(){	
		$data['parrains'] = $this->model->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/international',$data);
    }

	public function partenaire($idpartenaire){	
		$data['single'] = $this->model->singlePartenaire($idpartenaire);
		$data['parrains'] = $this->model->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/detailpartenaire',$data); 
	}
}
