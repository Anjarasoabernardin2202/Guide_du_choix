<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adherent_Controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Adherents_Model','model');	
		    $this->load->model('Pays_Model','pays');		
	    	$this->load->model('Partenaires_Model','parrains');	  
    }

    public function inscrire(){
      $email = $this->input->post('email');
      $entreprise = $this->input->post('entreprise');
      $activite = $this->input->post('activite');
      $adresse = $this->input->post('adresse');
      $nom = $this->input->post('nom');
      $telephone = $this->input->post('telephone');
      $whatsapp = $this->input->post('whatsapp');
      $pays = $this->input->post('idpays');
      $idpays2 = $this->input->post('idpays2');
      ($pays == null) ?  $idpays = 1: $idpays = $this->model->convertPays($pays);
      $etat = 0;
      $mdp = '';
      $erreur = $this->model->gestionErreur($etat,$email,$entreprise,$activite,$adresse,$nom,$telephone,$whatsapp,$idpays);
      //var_dump($erreur);
      if($erreur == null){
        $this->model->setIdPays($idpays);
       // var_dump($email);
        $this->model->setEmail($email);
        $this->model->setEntreprise($entreprise);
        $this->model->setActivite($activite);
        $this->model->setAdresse($adresse);
        $this->model->setNom($nom);
        $this->model->setTelephone($pays.$telephone);
        $this->model->setWhatsapp($idpays2.$whatsapp);
        $this->model->setEtat($etat);
        $this->model->setMdp($mdp);
        $this->model->createAdherents();
       redirect('Accueil_Controller/index','refresh');
      }
      else{
		    $data['nbadherents'] = $this->model->compterAdherents();
        $data['parrains'] = $this->parrains->listeParrains();
        $data['listepaysnom'] = $this->pays->getListeNom();
        $data['erreur'] = $erreur;
		    $data['nb'] = $this->model->compterAdherents();
        $this->load->view('pages/inscription',$data);
      }
    }
	
	
}
