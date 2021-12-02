<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citemetiers_Controller extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('pagination');
      $this->load->library('session');
      $this->load->model('Partenaires_Model','parrains');       
      $this->load->model('Citemetiers_Model','citemetiers');
      $this->load->model('Rubrique_Model','rubrique');
      $this->load->model('Pays_Model','pays');      
      $this->load->model('Admin_Model','admin');
      $this->load->model('Adherents_Model','adherent'); 
    }
	
	public function detail($idcommune){
        $idpays = $this->uri->segment(4);

        $data['nbadherents'] = $this->adherent->compterAdherents();
        $data['single'] = $this->citemetiers->getSingle($idcommune);
        $data['nbadherents'] = $this->adherent->compterAdherents();
        $this->load->view('pages/detailmetiers',$data);
	}

	public function liste(){
        $data['nbadherents'] = $this->adherent->compterAdherents();
		
		$this->load->view('pages/citemetiers',$data);
	}
   
    
    public function listemetiers($idmetier){
        
        // var_dump($idmetier);
        $data['idmetier'] = $idmetier;
        $data['nbadherents'] = $this->adherent->compterAdherents();
        $this->load->view('pages/listemetiers',$data);
    }

    public function detail1($iddetail){
        $data['iddetail'] = $iddetail;
        $data['nbadherents'] = $this->adherent->compterAdherents();
        $this->load->view('pages/detailmetiers',$data);
    }

    
}
