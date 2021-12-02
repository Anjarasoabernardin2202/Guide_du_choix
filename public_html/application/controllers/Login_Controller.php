<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('Admin_Model','model');
		$this->load->model('Pays_Model','pays');

    }

	public function index(){
		$this->load->view('backoffice/pages/login');
	}

	public function admin_bo(){
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->model->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
		$config = array();
		$config["base_url"] = site_url() . "/Login_Controller/admin_bo";
		$config["total_rows"] = $this->model->compteradmin();
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
		$data['liste']  = $this->model->listeadmin($config["per_page"],$page);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('backoffice/pages/admin',$data);
	}

	public function inscription(){
		$nom = $this->input->post('nom');
		$age = $this->input->post('age');
		$poste = $this->input->post('poste');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$this->model->setNom($nom);
		$this->model->setAge($age);
		$this->model->setPoste($poste);
		$this->model->setMail($email);
		$this->model->setMdp($mdp);
		$this->model->insert_Admin($nom,$age,$poste,$email,$mdp);
	}

	public function update($idadmin){
		$nom = $this->input->post('nom');
		$age = $this->input->post('age');
		$poste = $this->input->post('poste');
		$email = $this->input->post('email');
		$this->model->setNom($nom);
		$this->model->setAge($age);
		$this->model->setPoste($poste);
		$this->model->setMail($email);
		$this->model->updateadmin($idadmin);
		redirect('Login_Controller/profil','refresh');
	}


	public function login(){
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$login = $this->model->login($email,$mdp);
		//var_dump($login);
		if($login == TRUE){
			$this->session->set_userdata('admin',$email);
			$data['admin'] = $this->model->getProfil($email);
			$poste = $this->model->getPosteAdmin($email);
			if($poste == 'Directeur' || $poste == 'Recteur'){
				redirect('Accueil_Controller/accueil_bo','refresh');
			}
			else if($poste == 'Administrateur' || $poste == 'Stagiaire' || $poste == 'Stagiaire en informatique'){
				redirect('Pays_Controller/pays_bo','refresh');
			}
		}
		else{
			$data = array('error_message' => 'Erreur! Email et/ou mot de passe incorrects');
			$this->load->view('backoffice/pages/login',$data);
		}
	}

	public function logout(){
		$this->session->unset_userdata['admin'];
		$this->load->view('backoffice/pages/login');
	}

	public function profil(){
		if(isset($this->session->userdata['admin'])){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->model->getProfil($email);
			$this->load->view('backoffice/pages/profil',$data);
		}
		else{
			redirect('Login_Controller/logout');
		}
	}

	public function updateprofil($idadmin){
		$nom = $this->input->post('nom');
		$age = $this->input->post('age');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$mdp2 = $this->input->post('mdp1');
		if($mdp == $mdp2){
			$this->model->setNom($nom);
			$this->model->setAge($age);
			$this->model->setMail($email);
			$this->model->setMdp($mdp);
			$update = $this->model->updateprofil($idadmin);
			var_dump($update);
		}
		else{
			$data['erreur'] = array('error_message' => 'Erreur! Les mots de passes ne correspondent pas');
			$this->load->view('backoffice/pages/profil',$data);
		}
	
		redirect('Login_Controller/profil','refresh');
	}
	
}
