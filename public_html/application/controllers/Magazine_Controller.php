<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');	
		$this->load->library('session');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Magazine_Model','model');
		$this->load->model('Guide_Model','guide');
    }



	public function magazine_bo(){
		$config = array();
		$config['base_url'] = site_url()."/Magazine_Controller/magazine_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterMiniguide();
		$config['per_page'] = 300;
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
		$data['liste'] = $this->model->listeMiniguide($config['per_page'],$page);
		$data['liste2'] = $this->model->listeMiniguide2();
		$this->load->view('backoffice/pages/magazine',$data);
	}

	
	public function create(){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 0;
		$config['max_width'] = 5;
		$config['max_height'] = 1000;

		$config2 = array();
		$config2['base_url'] = site_url()."/Magazine_Controller/magazine_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterMiniguide();
		$config2['per_page'] = 1000;
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
			$nom = $this->input->post('nomguide');
			$guide2 = $this->input->post('guide');
			$contenu = $this->input->post('contenu');
			$smartphone = $this->input->post('smartphone');
			$titre = $this->input->post('titreguide');
			$texte = $this->input->post('texteguide');
			$erreur = $this->model->gestionErreur($nom,$titre,$texte,$image,$contenu,$smartphone);
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdGuide(14);
				$this->model->setNom($nom);
				$this->model->setBande($image);
				$this->model->setTitre($titre);
				$this->model->setTexte($texte);
				$this->model->setContenu($contenu);
				$this->model->setSmartphone($smartphone);
				($guide2 != null) ? $this->model->setId2($guide2) : $guide2 = 0;
				$this->model->createMiniguide();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listeMiniguide($config2['per_page'],$page);
				$data['liste2'] = $this->model->listeMiniguide2();
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/magazine',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->listeMiniGuide($config2['per_page'],$page);
				$data['liste2'] = $this->model->listeMiniguide2();
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/magazine',$data);
			}
		}
		else{
			redirect('Login_Controller/logout');
		}
	}

	public function update($id){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$this->load->library('upload',$config);
		$initialize = $this->upload->initialize($config);
		$data['liste'] = $this->model->listeMiniguide2();
		$image = 'no_img.jpg';
		$titre = $this->input->post('titreguide');
		$nom = $this->input->post('nomguide');
		$contenu = $this->input->post('contenu');
		$smartphone = $this->input->post('smartphone');
		$guide2 = $this->input->post('guide');
		$texte = $this->input->post('texteguide');
		if($this->upload->do_upload('image')){
			$data = $this->upload->data();
			$image = $data['file_name'];
			$this->model->setTexte($texte);
			$this->model->setBande($image);
			$this->model->setTitre($titre);
			$this->model->setNom($nom);
			$this->model->setContenu($contenu);
			$this->model->setSmartphone($smartphone);
			($guide2 != null) ? $this->model->setId2($guide2) : $guide2 = 0;
			$this->model->updateMiniguide($id);
			redirect('Magazine_Controller/magazine_bo','refresh');
		}
		if(!$this->upload->do_upload('image')){
			$img = $this->input->post('img');
			$this->model->setTexte($texte);
			$this->model->setBande($img);
			$this->model->setTitre($titre);
			$this->model->setNom($nom);
			$this->model->setContenu($contenu);
			$this->model->setSmartphone($smartphone);
			($guide2 != null) ? $this->model->setId2($guide2) : $guide2 = 0;
			$this->model->updateMiniguide($id);
			redirect('Magazine_Controller/magazine_bo','refresh');
		}
	}

	

	public function read($id){
		$data['single'] = $this->model->singleMiniguide($id);
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$data['liste'] = $this->model->listeMiniguide2();
		$this->load->view('backoffice/pages/fichemagazine',$data);
	}

	
	public function delete($id){
		$this->model->deleteMiniguide($id);
		redirect('Magazine_Controller/magazine_bo','refresh');
	}

	
	

}
