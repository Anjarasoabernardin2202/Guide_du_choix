<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('Pays_Model','pays');		
		$this->load->model('Rubrique_Model','rubrique');
		$this->load->model('Chapitre_Model','chapitre');
		$this->load->model('Partenaires_Model','partenaire');	
		$this->load->model('Article_Model','article');
		$this->load->model('Expert_Model','expert');
		$this->load->model('Guide_Model','model');
		$this->load->model('Admin_Model','admin');
		$this->load->model('Magazine_Model','magazine');
		$this->load->model('Adherents_Model','adherent');	
    }

	public function detailguide($idguide){
		$data['idsouschapitre'] = $this->chapitre->getIdChapitreSousChapitre($idguide);
		$data['idchapitre'] = $this->chapitre->getIdChapitreChapitre($idguide);
		$data['hassubchapter'] = $this->chapitre->hasSubChapter($data['idchapitre']);
		$data['idrubrique'] = $this->model->getIdRubriqueByGuide($idguide);
		$data['single'] = $this->model->singleGuide($idguide);
		$data['image'] = $this->model->getImageGuide($idguide);
		$idrubrique = $this->model->getRubrique($idguide);
		$data['listeminiguide'] = $this->magazine->getMagazine($idguide);
		$data['idguide_miniguide'] = $this->magazine->getGuide($idguide);
		$data['listeguides'] = $this->model->listeGuides($idrubrique);
		$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/detailguide',$data);
	}

	public function guide($idguide){
		$data['single'] = $this->model->singleGuide($idguide);
		$idrubrique = $this->model->getRubrique($idguide);
		$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
		$data['listechapitres'] = $this->chapitre->getChapitre($idguide);
		$nomchapitre = $this->chapitre->getNOMCHAPITRE($idguide,$this->uri->segment(4),$this->uri->segment(5));
		$contenus = $this->chapitre->getQuestions($nomchapitre);
		$data['listecontenus'] = $contenus;
		$data['links'] = $this->pagination->create_links();
		$data['singlechapitre'] = $this->chapitre->getSingle($idguide,$this->uri->segment(4),$this->uri->segment(5));
		$data['liste']  = $this->model->getListeNom($idrubrique);
		$data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/guide',$data);
	}
	
	public function sommaire($idguide){
		$data['single'] = $this->model->singleGuide($idguide);
		$idrubrique = $this->model->getRubrique($idguide);
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
		$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
		// $data['singlepays'] = $this->pays->singlePays($idpays);
		$data['listechapitres'] = $this->chapitre->getChapitre($idguide);
		$data['listearticles'] = $this->chapitre->getArticle($idguide);
		$data['points'] = $this->chapitre->getPoints($idguide);
		$nomschapitre = $this->chapitre->getNOMSOUSCHAPITRE($idguide,$this->uri->segment(4),$this->uri->segment(5));
		$data['singlechapitre'] = $this->chapitre->getSingle($idguide,$this->uri->segment(4),$this->uri->segment(5));
		$data['liste']  = $this->model->getListeNom($idrubrique);
		$data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		$data['parrains'] = $this->partenaire->listeParrains();
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/sommaire',$data);
	}

	public function page_sponsor(){
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
		// $data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		$data['parrains'] = $this->partenaire->listeParrains();
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/page_sponsor',$data);
	}

	public function miniguide($idguide){
		$data['single'] = $this->model->singleGuide($idguide);
		$idrubrique = $this->model->getRubrique($idguide);
		$data['idguide'] = $idguide;
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
		$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
		// $data['singlepays'] = $this->pays->singlePays($idpays);
		$data['liste']  = $this->model->getListeNom($idrubrique);
		// $data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$data['listeminiguide'] = $this->magazine->getMagazine($idguide);
		$data['singleexpert'] = $this->expert->getExpertGuide($idguide,1);
		$this->load->view('pages/miniguide',$data);
	}

	public function sousguide($idchapitre){
		$idparent = $this->chapitre->getParent($idchapitre);
		if($idparent == null){
			$idguide = $this->chapitre->getGuide($idchapitre);
			$data['nbguide'] = $this->chapitre->compterChapitreByGuide($idguide);
			$data['nb'] = 0;
			$data['url'] = $this->uri->segment(3);
			$idguide = $this->chapitre->getGuide($idchapitre);
			$data['hassubchapter'] = $this->chapitre->hasSubChapter($idchapitre);
			$data['chapitres'] = $this->chapitre->getSingleByChapitre1($idchapitre);
			$data['idguide'] = $idguide;
			$data['single'] = $this->model->singleGuide($idguide);
			$idrubrique = $this->model->getRubrique($idguide);
			// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
			$data['singleexpert'] = $this->expert->getExpertGuide($idguide,1);
			$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
			// $data['singlepays'] = $this->pays->singlePays($idpays);
			$data['liste']  = $this->model->getListeNom($idrubrique);
			// $data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
			$data['nbadherents'] = $this->adherent->compterAdherents();
		}
		else{
			$data['nb'] = $this->chapitre->compterSousGuide($idparent);
			$data['nbguide'] = '';
			$data['url'] = $this->uri->segment(3);
			$idguide = $this->chapitre->getGuide($idchapitre);
			$data['hassubchapter'] = $this->chapitre->hasSubChapter($idchapitre);
			$data['chapitres'] = $this->chapitre->getSingleByChapitre1($idchapitre);
			$data['idguide'] = $idguide;
			$data['single'] = $this->model->singleGuide($idguide);
			$idrubrique = $this->model->getRubrique($idguide);
			// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
			$data['singleexpert'] = $this->expert->getExpertGuide($idguide,1);
			$data['singlerubrique'] = $this->rubrique->singleRubrique($idrubrique);
			// $data['singlepays'] = $this->pays->singlePays($idpays);
			$data['liste']  = $this->model->getListeNom($idrubrique);
			$data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
			$data['nbadherents'] = $this->adherent->compterAdherents();

		}
		$data['parrains'] = $this->partenaire->listeParrains();
		$data['listeexperts'] = $this->expert->listeExperts(1,0);
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$this->load->view('pages/sousguide',$data);
	}
	
	public function listeguide($idrubrique){
		$data['single'] = $this->rubrique->singleRubrique($idrubrique);
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
		// $data['liens']  = $this->rubrique->listeRubriques(2,0,$idpays);
		$data['listeguides'] = $this->model->listeGuides($idrubrique);
		$data['listeguides2'] = $this->model->listeGuides2($idrubrique);
		$data['categorie'] = $this->model->categorieguide($idrubrique);
		// $data['singlepays'] = $this->pays->singlePays($idpays);
		// $data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		// $data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/listeguide',$data);
	}

	public function listedetail($idrubrique){
		$data['single'] = $this->rubrique->singleRubrique($idrubrique);
		// $data['adherentparpays'] = $this->adherent->compterAdherentsParPays($idpays);
		// $data['liens']  = $this->rubrique->listeRubriques(2,0,$idpays);
		$data['listeguides'] = $this->model->listeGuides($idrubrique);
		// $data['singlepays'] = $this->pays->singlePays($idpays);
		// $data['partenaire'] = $this->partenaire->listePartenairesParPays(1,0,$idpays);
		$data['listepaysnom'] = $this->pays->getListeNom();
		$data['nbadherents'] = $this->adherent->compterAdherents();
		$this->load->view('pages/listeguide',$data);
	}

	public function guide_bo(){
		$config = array();
		$config['base_url'] = site_url()."/Guide_Controller/guide_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterGuide();
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
		$data['liste'] = $this->model->liste($config['per_page'],$page);
		$data['listerubriques'] = $this->rubrique->listeRub();
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/guides',$data);
	}

	public function create(){
		$config2 = array();
		$config2['base_url'] = site_url()."/Guide_Controller/guide_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterGuide();
		$config2['per_page'] = 5;
		$config2['num_tag_open'] = '<button>';
		$config2['num_tag_close'] = '</button>';
		$config2['next_link'] = 'Suivant';
		$config2['prev_link'] = 'Précédent';
		$config2['next_tag_open'] = '<button type="button" class="btn " style="float:right;">';
		$config2['next_tag_close'] = '</button>';
		$config2['prev_tag_open'] = '<button type="button" class="btn " style="float:left;">';
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
		$img = 'no_img.jpg';
		$symbole = 'no_img.jpg';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$img = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$symbole = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
		} 
		$nomrubrique = $this->input->post('nomrubrique');
		$nomguide = $this->input->post('nomguide');
		$description = $this->input->post('descriptionguide');
		$smartphone = $this->input->post('descriptionguidesmartphone');
		$idrubrique = $this->rubrique->findIdbyName($nomrubrique);
		$erreur = $this->model->gestionErreur($img,$symbole,$idrubrique,$nomguide,$description,$smartphone);
		if(!isset($erreur) || empty($erreur) || $erreur==null){
			$this->model->setIdRubrique($idrubrique);
			$this->model->setImage($img);
			$this->model->setSymbole($symbole);
			$this->model->setNom($nomguide);
			$this->model->setDescription($description);
			$smartphone == null || empty($smartphone) ? $this->model->setDescriptionSmart($description) : $this->model->setDescriptionSmart($smartphone);
			$this->model->createGuide();
			$data['message'] = "Insertion réussie";
			$data['erreur'] = '';
			$this->pagination->initialize($config2);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['liste'] = $this->model->liste($config2['per_page'],$page);
			$data['listerubriques'] = $this->rubrique->listeRub();
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/guides',$data);
		}
		else{
			$data['message'] = "";
			$data['erreur'] = $erreur;
			$this->pagination->initialize($config2);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['liste'] = $this->model->liste($config2['per_page'],$page);
			if($this->session->userdata('admin')){
				$email = $this->session->userdata['admin'];
				$data['admin'] = $this->admin->getProfil($email);
			}
			else{
				redirect('Login_Controller/logout');
			}
			$data['listerubriques'] = $this->rubrique->listeRub();
			$data['links'] = $this->pagination->create_links();
			$this->load->view('backoffice/pages/guides',$data);
		}
		
	}

	public function read($id){
		$data['single'] = $this->model->singleGuide($id);
		$idrubrique = $this->model->findIdRubrique($id);
		$nomrubrique = $this->rubrique->findNamebyId($idrubrique);
		$data['nomrubrique'] = $nomrubrique;
		$data['listerubriques'] = $this->rubrique->listeRub();
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/ficheguide',$data);
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
		//var_dump($_FILES);
		$compter = count($_FILES['image']['name']);
		$guide = 'no_img.jpg';
		$guide1 = $this->input->post('guide');
		$symbole1 = $this->input->post('symbole');
		$symbole = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$guide= $files['image']['name'][$i];
			} 
			else if($i == 1){
				$symbole = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
			$this->model->setImage($guide);
			$this->model->setSymbole($symbole);
			if(!$this->upload->do_upload()){
				$this->upload->display_errors();
				if($guide == null || empty($guide)) $this->model->setImage($guide1);
				if($symbole == null || empty($symbole)) $this->model->setSymbole($symbole1);
			}
		} 
		$nomrubrique = $this->input->post('nomrubrique');
		$nomguide = $this->input->post('nomguide');
		$description = $this->input->post('descriptionguide');
		$smartphone = $this->input->post('descriptionguidesmart');
		$idrubrique = $this->rubrique->findIdbyName($nomrubrique);
		$this->model->setIdRubrique($idrubrique);
		$this->model->setNom($nomguide);
		$this->model->setDescription($description);
		$this->model->setDescriptionSmart($smartphone);
		$this->model->updateGuide($id);
		redirect('Guide_Controller/guide_bo','refresh');
	}

	public function delete($id){
		$chapitre = $this->chapitre->findChapitreByGuide($id);
		$expert = $this->expert->findExpertByGuide($id);
		if($chapitre != null && $expert != null){
			redirect('Guide_Controller/guide_bo','refresh');
		}
		else{
			$this->model->deleteGuide($id);
			redirect('Guide_Controller/guide_bo','refresh');
		}
	}
}
