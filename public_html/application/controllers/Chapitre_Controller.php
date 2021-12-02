<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chapitre_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Chapitre_Model','model');
		$this->load->model('Article_Model','article');
		$this->load->model('Guide_Model','guide');
		$this->load->model('Admin_Model','admin');
    }

	public function chapitre_bo(){
        $config = array();
		$config['base_url'] = site_url()."/Chapitre_Controller/chapitre_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterChapitre();
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

		$data['liste'] = $this->model->getChapter($config['per_page'],$page);
		$data['listeguide'] = $this->guide->getListe();
		$data['links'] = $this->pagination->create_links();
	
		$this->load->view('backoffice/pages/chapitres',$data);
	}

	public function createChapitre(){
		$config2 = array();
		$config2['base_url'] = site_url()."/Chapitre_Controller/chapitre_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterChapitre();
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
		if(isset($this->session->userdata['admin'])){
			$image = null;
			$image2 = null;
			$idguide = $this->input->post('nomguide');
			$nomchapitre = $this->input->post('nomchapitre');
			$idparent = null;
			$numero = $this->input->post('numerochapitre');
			$description = $this->input->post('descriptionchapitre');
			$smartphone = $this->input->post('descriptionchapitresmart');
			$type = $this->input->post('typechapitre');
			$erreur = $this->model->gestionErreurChapitre($idparent,$idguide,$image,$image2,$nomchapitre,$type,$numero,$description,$smartphone);
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdGuide($idguide);
				$this->model->setImage($image);
				$this->model->setImage2($image2);
				$this->model->setIdChapitre($idparent);
				$this->model->setNumero($numero);
				$this->model->setNom($nomchapitre);
				$this->model->setType($type);
				$this->model->setIntroduction($description);
				$smartphone == null || empty($smartphone) ? $this->model->setIntroductionSmartphone($description) : $this->model->setIntroductionSmartphone($smartphone);
				$this->model->createChapitre();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->getChapter($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listeguide'] = $this->guide->getListe();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/chapitres',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->getChapter($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listeguide'] = $this->guide->getListe();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/chapitres',$data);
			}
		}
		else{
				redirect('Login_Controller/logout');
		}
	}

	public function readChapitre($id){
		$data['single'] = $this->model->singleChapitre($id);
		$idguide = $this->model->getGuideById($id);
		$guide = $this->guide->findNameById($idguide);
		$data['nomguide'] = $guide;
		$data['listeguidenom'] = $this->guide->getListe();
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/fichechapitre',$data);
	}

	public function updateChapitre($id){
		$numero = $this->input->post('numerochapitre');
		$nomguide = $this->input->post('nomguide');
		$idguide = $this->guide->findIdByName($nomguide);
		$nomchapitre = $this->input->post('nomchapitre');
		$type = $this->input->post('typechapitre');
		$idparent = null;
		$description = $this->input->post('descriptionchapitre');
		$smartphone = $this->input->post('descriptionchapitresmart');
		$image = null;
		$image2 = null;
		$this->model->setIdGuide($idguide);
		$this->model->setNumero($numero);
		$this->model->setIdChapitre($idparent);
		$this->model->setNom($nomchapitre);
		$this->model->setImage($image);
		$this->model->setImage2($image2);
		$this->model->setType($type);
		$this->model->setIntroduction($description);
		$this->model->setIntroductionSmartphone($smartphone);
		$this->model->updateChapitre($id);
		redirect('Chapitre_Controller/chapitre_bo','refresh');
		
	}

	public function deleteChapitre($id){
		$idschapitre = $this->model->getSousChapitreById($id);
		if($idschapitre != null){
			redirect('Chapitre_Controller/chapitre_bo','refresh');
		}
		else{
			$this->model->deleteChapitre($id);
			redirect('Chapitre_Controller/chapitre_bo','refresh');
		}
	}

	
	public function schapitre_bo(){
        $config = array();
		$config['base_url'] = site_url()."/Chapitre_Controller/schapitre_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterSChapitre();
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
		$data['listechapitres'] = $this->model->getListeChapitre();
		$data['liste'] = $this->model->getSubChapter($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/souschapitres',$data);
	}

	public function createSChapitre(){
		$config2 = array();
		$config2['base_url'] = site_url()."/Chapitre_Controller/schapitre_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterSChapitre();
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

		if(isset($this->session->userdata['admin'])){
			$image = null;
			$image2 = null;
			$idchapitre = $this->input->post('nomchapitre');
			$nomschapitre = $this->input->post('nomschapitre');
			(!empty($idchapitre) || $idchapitre != null) ? $idguide = $this->model->findGuideById($idchapitre) : $idguide = 0;
			$numero = $this->input->post('numerochapitre');
			$smartphone = $this->input->post('descriptionchapitresmart');
			$description = $this->input->post('descriptionchapitre');
			(!empty($idchapitre) || $idchapitre != null) ? $type = $this->model->getTypeByChapitre($idchapitre) : $type="";
			$erreur = $this->model->gestionErreurSousChapitre($idchapitre,$idguide,$image,$image2,$nomschapitre,$type,$numero,$description,$smartphone);
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdGuide($idguide);
				$this->model->setImage($image);
				$this->model->setImage2($image2);
				$this->model->setIdChapitre($idchapitre);
				$this->model->setNumero($numero);
				$this->model->setNom($nomschapitre);
				$this->model->setIntroduction($description);
				$this->model->setType($type);
				$smartphone == null || empty($smartphone) ? $this->model->setIntroductionSmartphone($description) : $this->model->setIntroductionSmartphone($smartphone);
				$this->model->createChapitre();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->getSubChapter($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listechapitres'] = $this->model->getListeChapitre();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/souschapitres',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['liste'] = $this->model->getSubChapter($config2['per_page'],$page);
				$email = $this->session->userdata['admin'];
				$data['listechapitres'] = $this->model->getListeChapitre();
				$data['admin'] = $this->admin->getProfil($email);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/souschapitres',$data);
			}
		}
		else{
		
				redirect('Login_Controller/logout');
			
		}
	}

	public function readSChapitre($id){
		$data['single'] = $this->model->singleChapitre($id);
		$data['listechapitres'] = $this->model->getListeChapitre();
		$idchapitre = $this->model->getChapitreBySChapitre($id);
		$nomchapitre = $this->model->getNomChapitreById($idchapitre);
		$data['chapter'] = $nomchapitre;
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/ficheschapitre',$data);
	}

	public function updateSChapitre($id){
		$image = null;
		$image2 = null;
		$nomchapitre = $this->input->post('nomchapitre');
		$nomschapitre = $this->input->post('nomschapitre');
		$idchapitre = $this->model->findIdByName($nomchapitre);
		$idparent = $this->model->getChapitreBySChapitre($id);
		$idguide = $this->model->getGuideById($idchapitre);
		$numero = $this->input->post('numerochapitre');
		$description = $this->input->post('descriptionchapitre');
		$type = $this->model->getTypeByChapitre($idchapitre);
		$smartphone = $this->input->post('descriptionchapitresmart');
		$this->model->setIdGuide($idguide);
		$this->model->setImage($image);
		$this->model->setImage2($image2);
		$this->model->setIdChapitre($idparent);
		$this->model->setNumero($numero);
		$this->model->setNom($nomschapitre);
		$this->model->setIntroduction($description);
		$this->model->setIntroductionSmartphone($smartphone);
		$this->model->setType($type);
		$this->model->updateChapitre($id);
		redirect('Chapitre_Controller/schapitre_bo','refresh');
	}

	public function deleteSChapitre($id){
		$idschapitre = $this->model->findSChapitreById($id);
		if($idschapitre == null || empty($idschapitre)){
			$this->model->deleteChapitre($id);
			redirect('Chapitre_Controller/schapitre_bo','refresh');
		}
		else{
			redirect('Chapitre_Controller/schapitre_bo','refresh');
		}
	}

	public function createParagraphe(){
		$config2 = array();
		$config2['base_url'] = site_url()."/Chapitre_Controller/paragraphe_bo/";
		$config2['uri_segment'] = 3;
		$config2['total_rows'] = $this->model->compterParagraphe();
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

		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$config['overwrite'] = FALSE;
		$this->load->library('upload',$config);
		$files = $_FILES;
		$compter = count($_FILES['image']['name']);
		$image = 'no_img.jpg';
		$image1 = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$image = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$image1 = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
		} 
			$nomparagraphe = $this->input->post('nomparagraphe');
			$idchapitre = $this->input->post('nomschapitre');
			($idchapitre !=null || !empty($idchapitre)) ? $type = $this->model->getTypeByChapitre($idchapitre) : $type = "";
			($idchapitre !=null || !empty($idchapitre)) ? $idguide = $this->model->findGuideById($idchapitre) : $idguide = 0;
			$description = $this->input->post('description');
			$smartphone = $this->input->post('descriptionsmart');
			$numero = $this->input->post('numero');
			$erreur = $this->model->gestionErreurParagraphe($idchapitre,$idguide,$image,$image1,$nomparagraphe,$type,$numero,$description,$smartphone);			
			if(!isset($erreur) || empty($erreur) || $erreur==null){
				$this->model->setIdGuide($idguide);
				(empty($image) || $image == null) ? $this->model->setImage('no-img.jpg'):$this->model->setImage($image);
				(empty($image2) || $image2 == null) ? $this->model->setImage2('no-img.jpg'):$this->model->setImage2($image2);
				$this->model->setType($type);
				$this->model->setIdChapitre($idchapitre);
				$this->model->setNumero($numero);
				$this->model->setNom($nomparagraphe);
				$this->model->setIntroduction($description);
				$smartphone == null || empty($smartphone) ? $this->model->setIntroductionSmartphone($description) : $this->model->setIntroductionSmartphone($smartphone);
				$this->model->createChapitre();
				$data['message'] = "Insertion réussie";
				$data['erreur'] = '';
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				if($this->session->userdata('admin')){
					$email = $this->session->userdata['admin'];
					$data['admin'] = $this->admin->getProfil($email);
				}
				else{
					redirect('Login_Controller/logout');
				}
				$data['listeschapitre'] = $this->model->getListeSubChapter();
				$data['liste'] = $this->model->getParagraphes($config2['per_page'],$page);
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/paragraphes',$data);
			}
			else{
				$data['message'] = "";
				$data['erreur'] = $erreur;
				$this->pagination->initialize($config2);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['listeschapitre'] = $this->model->getListeSubChapter();
				$data['liste'] = $this->model->getParagraphes($config2['per_page'],$page);
				if($this->session->userdata('admin')){
					$email = $this->session->userdata['admin'];
					$data['admin'] = $this->admin->getProfil($email);
				}
				else{
					redirect('Login_Controller/logout');
				}
				$data['links'] = $this->pagination->create_links();
				$this->load->view('backoffice/pages/paragraphes',$data);
			}
		
	}

	public function readParagraphe($id){
		$data['single'] = $this->model->singleChapitre($id);
		$data['listechapitres'] = $this->model->getListeSubChapter();
		$idchapitre = $this->model->getChapitreBySChapitre($id);
		$nomchapitre = $this->model->getNomChapitreById($idchapitre);
		$data['chapter'] = $nomchapitre;
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$this->load->view('backoffice/pages/ficheparagraphe',$data);
	}

	public function updateParagraphe($id){
		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 200;
		$config['max_width'] = 1000;
		$config['max_height'] = 1000;
		$config['overwrite'] = FALSE;
		$this->load->library('upload',$config);
		$files = $_FILES;
		$compter = count($_FILES['image']['name']);
		$image = 'no_img.jpg';
		$img = $this->input->post('img');
		$img2 = $this->input->post('img2');
		$image2 = 'no_img.jpg';
		$data['erreur'] = '';
		for($i = 0;$i < $compter;$i++){
			if($i == 0){
				$image = $files['image']['name'][$i];
			} 
			else if($i == 1){
				$image2 = $files['image']['name'][$i];
			} 
			$_FILES['image']['name'] = $files['image']['name'][$i];
			$_FILES['image']['type'] = $files['image']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['image']['error'][$i];
			$_FILES['image']['size'] = $files['image']['size'][$i];
			$initialize = $this->upload->initialize($config);
			$this->upload->do_upload();
				$this->model->setImage($image);
				$this->model->setImage2($image2);
			if(!$this->upload->do_upload()){
				if($image == null || empty($image)) $this->model->setImage($img);
				if($image2 == null || empty($image2)) $this->model->setImage2($img2);
			}
		} 
		$nomschapitre = $this->input->post('nomschapitre');
		$nomchapitre = $this->input->post('nomchapitre');
		$idparent = $this->model->findIdByName($nomchapitre);
		$type = $this->model->getTypeByChapitre($idparent);
		$idguide = $this->model->findGuideById($idparent);
		$numero = $this->input->post('numerochapitre');
		$description = $this->input->post('descriptionchapitre');
		$smartphone = $this->input->post('descriptionchapitresmart');
		$this->model->setIdGuide($idguide);
		$this->model->setIdChapitre($idparent);
		$this->model->setNumero($numero);
		$this->model->setNom($nomschapitre);
		$this->model->setType($type);
		$this->model->setIntroduction($description);
		$this->model->setIntroductionSmartphone($smartphone);
		$this->model->updateChapitre($id);
		redirect('Chapitre_Controller/paragraphe_bo','refresh');
		

	}

	public function deleteParagraphe($id){
		// $etape = $this->etape->getEtapeByChapitre($id);
		// $tableau = $this->tableau->getTableauByChapitre($id);
		// $article = $this->article->getArticleByChapitre($id);

		// if($etape == null  || $tableau == null  || $article == null ){
		// 	redirect('Chapitre_Controller/paragraphe_bo','refresh');
		// }
		// else{
			$this->model->deleteChapitre($id);
			redirect('Chapitre_Controller/paragraphe_bo','refresh');
		// }
	}

	public function paragraphe_bo(){
        $config = array();
		$config['base_url'] = site_url()."/Chapitre_Controller/paragraphe_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->model->compterParagraphe();
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
		$data['listeschapitre'] = $this->model->getListeSubChapter();
		$data['liste'] = $this->model->getParagraphes($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/paragraphes',$data);
	}

}
