<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rubrique_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('Pays_Model','pays');
		$this->load->model('Rubrique_Model','model');
		$this->load->model('Nouveaute_Model','nouveaute');	
		$this->load->model('Partenaires_Model','partenaire');		
		$this->load->model('Guide_Model','guide');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Adherents_Model','adherent');	
    }

	// public function listerubriques($idpays){
	// 	$data['idpays'] = $idpays;
	// 	$data['singlepays'] = $this->pays->singlePays($idpays);
	// 	$data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
	// 	$data['listepaysnom'] = $this->pays->getListeNom();
	// 	$data['nbadherents'] = $this->adherent->compterAdherents();
	// 	$data['nbsponsor'] = $this->nouveaute->compterNational($idpays);
	// 	$data['listesponsor'] = $this->nouveaute->listeNational($idpays);
	// 	$data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
	// 	$this->load->view('pages/listerubriques',$data);
	// }

	public function detail($idrubrique){
		$data['single'] = $this->model->singleRubrique($idrubrique);
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays(1);
		$data['liens']  = $this->model->listeRubriques(2,0);
		$config = array();
		$config["base_url"] = site_url() . "/Rubrique_Controller/detail";
		$config["total_rows"] = $this->guide->compterGuide();
		$config["per_page"] = 1;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<span>';
		$config['num_tag_close'] = '</span>';
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['next_tag_open'] = '<span id="position-chevron-right-guide">';
		$config['next_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span id="position-chevron-left-guide">';
		$config['prev_tag_close'] = '</span>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['listeguides'] = $this->guide->listeGuides($idrubrique);
		$data['liste']  = $this->guide->listeGuidesLimit($config["per_page"],$page,$idrubrique);
		$data['links'] = $this->pagination->create_links();
		
		// $data['listeguides'] = $this->model->listeGuides($idrubrique);
		$data['listeguides2'] = $this->guide->listeGuides2($idrubrique);
		$data['categorie'] = $this->guide->categorieguide($idrubrique);
		// $data['singlepays'] = $this->pays->singlePays(1);
		// $data['partenaires'] = $this->partenaire->listePartenairesParPays2(1);
		 $data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		//var_dump($data['partenaire']);
		$this->load->view('pages/detailrubrique',$data);
	}

	public function rubrique_bo(){
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$config = array();
		$config["base_url"] = site_url() . "/Rubrique_Controller/rubrique_bo";
		$config["total_rows"] = $this->model->compterRubrique();
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
		$data['suppression'] = '';
		$data['erreur'] = '';
		$data['message'] = '';
		$data['liste']  = $this->model->liste($config["per_page"],$page);
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/rubriques',$data);
	}

	public function create(){
		$config = array();
		$config["base_url"] = site_url() . "/Rubrique_Controller/rubrique_bo";
		$config["total_rows"] = $this->model->compterRubrique();
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

		$pays = $this->input->post('nompays');
		$idpays = $this->pays->findIdByName($pays);
		$nom = $this->input->post('nomrubrique');
		$description = $this->input->post('description');
		$smartphone = $this->input->post('descriptionsmart');
		$maurice = $this->input->post('maurice');
		$comores = $this->input->post('comores');
		$cameroun = $this->input->post('cameroun');
		$maroc = $this->input->post('maroc');
		$mayotte = $this->input->post('mayotte');
		$erreur = $this->model->gestionErreur($image,$idpays,$nom,$description,$smartphone);
		if(!isset($erreur) || empty($erreur) || $erreur==null){
			$this->model->setImage($image);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setDescription($description);
			$smartphone==null || empty($smartphone) ? $this->model->setDescriptionSmartphone($description) : $this->model->setDescriptionSmartphone($smartphone);
			$this->model->setMaurice($maurice);
			$this->model->setComores($comores);
			$this->model->setCameroun($cameroun);
			$this->model->setMaroc($maroc);
			$this->model->setMayotte($mayotte);
			$this->model->createRubrique();
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['suppression'] = '';
			$data['message'] = 'Insertion réussie';
			$data['erreur'] = '';
			$data['liste']  = $this->model->liste($config["per_page"],$page);
			$data['listepaysnom'] = $this->pays->getListeNom();
			$data['links'] = $this->pagination->create_links();
			$this->load->view("backoffice/pages/rubriques",$data);
		}
		else{
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['suppression'] = '';
			$data['erreur'] = $erreur;
			$data['message'] = '';
			$data['liste']  = $this->model->liste($config["per_page"],$page);
			$data['listepaysnom'] = $this->pays->getListeNom();
			$data['links'] = $this->pagination->create_links();
			$this->load->view("backoffice/pages/rubriques",$data);
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
		$idpays = $this->model->findIdPays($id);
		$pays = $this->pays->getNomById($idpays);
		$data['nompays'] = $pays;
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['single'] = $this->model->singleRubrique($id);
		$this->load->view('backoffice/pages/ficherubrique',$data);
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
		$idpays = $this->pays->findIdByName($pays);
		$nom = $this->input->post('nomrubrique');
		$description = $this->input->post('description');
		$smartphone = $this->input->post('descriptionsmart');
		$maurice = $this->input->post('maurice');
		$comores = $this->input->post('comores');
		$cameroun = $this->input->post('cameroun');
		$maroc = $this->input->post('maroc');
		$mayotte = $this->input->post('mayotte');
		if($this->upload->do_upload('image')){
			$data = $this->upload->data();
			$image = $data['file_name'];
			$this->model->setImage($image);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setDescription($description);
			$this->model->setDescriptionSmartphone($smartphone);
			$this->model->setMaurice($maurice);
			$this->model->setComores($comores);
			$this->model->setCameroun($cameroun);
			$this->model->setMaroc($maroc);
			$this->model->setMayotte($mayotte);
			$this->model->updateRubrique($id);
			redirect('Rubrique_Controller/rubrique_bo','refresh');
		}
		if(!$this->upload->do_upload('image')){
			$img = $this->input->post('img');
			$this->model->setImage($img);
			$this->model->setIdPays($idpays);
			$this->model->setNom($nom);
			$this->model->setDescription($description);
			$this->model->setDescriptionSmartphone($smartphone);
			$this->model->setMaurice($maurice);
			$this->model->setComores($comores);
			$this->model->setCameroun($cameroun);
			$this->model->setMaroc($maroc);
			$this->model->setMayotte($mayotte);
			$this->model->updateRubrique($id);
			redirect('Rubrique_Controller/rubrique_bo','refresh');
		}
	}

	public function delete($id){
		$config = array();
		$config["base_url"] = site_url() . "/Rubrique_Controller/rubrique_bo";
		$config["total_rows"] = $this->model->compterRubrique();
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

		$guide = $this->guide->findByIdRubrique($id);
		if($guide != null){
			$email = $this->session->userdata['admin'];
			$data['message'] = '';
			$data['erreur'] = '';
			$data['suppression'] = 'Suppression non validée. Données rattachés à la rubrique detectés.';
			$data['admin'] = $this->admin->getProfil($email);
			$data['liste']  = $this->model->liste($config["per_page"],$page);
			$data['listepaysnom'] = $this->pays->getListeNom();
			$data['links'] = $this->pagination->create_links();
			$this->load->view("backoffice/pages/rubriques",$data);
		}
		else{
			$this->model->deleteRubrique($id);
			redirect('Rubrique_Controller/rubrique_bo','refresh');
		}
		
	}
	

}
