<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Equipe_Model','model');
		$this->load->model('Pays_Model','pays');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Adherents_Model','adherent');	
    }

	public function equipe_bo(){
		$config = array();
		$config["base_url"] = site_url() . "/Equipe_Controller/equipe_bo";
		$config["total_rows"] = $this->model->compterEquipe();
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
		$data['liste'] = $this->model->listeEquipe($config["per_page"],$page);
		$data['links'] = $this->pagination->create_links();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$this->load->view('backoffice/pages/equipe',$data);
	}

	public function create(){
		$config = array();
		$config["base_url"] = site_url() . "/Equipe_Controller/equipe_bo";
		$config["total_rows"] = $this->model->compterEquipe();
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
		$this->load->library('upload',$config2);
		$initialize = $this->upload->initialize($config2);
		$image = 'no_img.jpg';
		$this->upload->do_upload('image');
		$data = $this->upload->data();
		$image = $data['file_name'];
		$nom = $this->input->post('nommembre');
		$pays = $this->input->post('nompays');
		if($pays == NULL){
			$idpays = null;
		}
		else{
			$idpays = $this->pays->findIdByName($pays);			
		}
		$type = $this->input->post('typemembre');
		$poste = $this->input->post('poste');
		$erreur = $this->model->gestionErreur($idpays,$type,$nom,$image,$poste);
		if($erreur == null || empty($erreur) || !isset($erreur)){
			$this->model->setProfil($image);
			$this->model->setNom($nom);
			$this->model->setPoste($poste);
			$this->model->setIdPays($idpays);
			$this->model->setType($type);
			$this->model->createEquipe();
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['erreur'] = '';
			$data['message'] = 'Insertion reussie';
			$data['liste'] = $this->model->listeEquipe($config["per_page"],$page);
			$data['links'] = $this->pagination->create_links();
			$data['listepaysnom'] = $this->pays->getListeNom();
			$this->load->view('backoffice/pages/equipe',$data);
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
			$data['liste'] = $this->model->listeEquipe($config["per_page"],$page);
			$data['links'] = $this->pagination->create_links();
			$data['listepaysnom'] = $this->pays->getListeNom();
			$this->load->view('backoffice/pages/equipe',$data);
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
		$data['single'] = $this->model->singleEquipe($id);
		$idpays = $this->model->findIdPays($id);
		if($idpays == null){
			$data['pays'] = "Pas de pays";
		}
		else{
			$pays = $this->pays->getNomById($idpays);
			$data['pays'] = $pays;
		}
		$data['listepaysnom'] = $this->pays->getListeNom();
		$this->load->view('backoffice/pages/ficheequipe',$data);
	}

	public function update($id){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$this->load->library('upload',$config);
		$initialize = $this->upload->initialize($config);
		$image = 'no_img.jpg';
		$pays = $this->input->post('nompays');
		if($pays == null){
			$idpays = null;
		}
		else{
			$idpays = $this->pays->findIdByName($pays);

		}
		$nom = $this->input->post('nommembre');
		$type = $this->input->post('typemembre');
        $poste = $this->input->post('poste');
		if($this->upload->do_upload('image')){
			$data = $this->upload->data();
			$image = $data['file_name'];
			$this->model->setProfil($image);
			$this->model->setNom($nom);
			$this->model->setPoste($poste);
			$this->model->setIdPays($idpays);
			$this->model->setType($type);
			$this->model->updateEquipe($id);
			redirect('Equipe_Controller/equipe_bo','refresh');
		}
		if(!$this->upload->do_upload('image')){
			$img = $this->input->post('img');
			$this->model->setProfil($img);
			$this->model->setNom($nom);
			$this->model->setPoste($poste);
			$this->model->setIdPays($idpays);
			$this->model->setType($type);
			$this->model->updateEquipe($id);
			redirect('Equipe_Controller/equipe_bo','refresh');
		}
	}

	public function delete($id){
		$this->model->deleteEquipe($id);
		redirect('Equipe_Controller/equipe_bo','refresh');
	}

}
