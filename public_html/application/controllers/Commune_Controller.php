<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commune_Controller extends CI_Controller {
	public function __construct() {
      parent::__construct();
      $this->load->library('pagination');
      $this->load->model('Partenaires_Model','parrains');		
      $this->load->model('Commune_Model','commune');
      $this->load->model('Pays_Model','pays');		
      $this->load->model('Admin_Model','admin');
		  $this->load->model('Adherents_Model','adherent');	
    }

	public function liste(){
		$data['nbadherents'] = $this->adherent->compterAdherents();
    $data['liste'] = $this->commune->getListe();
    $this->load->view('pages/commune',$data);

  }

  public function detail($idcommune){
    $idpays = $this->uri->segment(4);
    $data['nbadherents'] = $this->adherent->compterAdherents();
    $data['single'] = $this->commune->getSingle($idcommune);
    $this->load->view('pages/detailcommune',$data);
  }
  
}
