<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adherents_Model extends CI_Model {
    private $IDADHERENTS;
    private $ID_PAYS;
    private $ETAT;
    private $EMAIL;
    private $MDP;
    private $ENTREPRISE;
    private $ACTIVITE;
    private $ADRESSE;
    private $NOMCOMPLET;
    private $TELEPHONE;
    private $WHATSAPP;

    public function setId($IDADHERENTS){
        $this->IDADHERENTS = $IDADHERENTS;
    }
    public function setEtat($ETAT){
        $this->ETAT = $ETAT;
    }
    public function setEmail($EMAIL){
        $this->EMAIL = $EMAIL;
    }
    public function setMdp($MDP){
        $this->MDP = $MDP;
    }
    public function setEntreprise($ENTREPRISE){
        $this->ENTREPRISE = $ENTREPRISE;
    }
    public function setActivite($ACTIVITE){
        $this->ACTIVITE = $ACTIVITE;
    }
    public function setAdresse($ADRESSE){
        $this->ADRESSE = $ADRESSE;
    }
    public function setNom($NOMCOMPLET){
        $this->NOMCOMPLET = $NOMCOMPLET;
    }
    public function setTelephone($TELEPHONE){
        $this->TELEPHONE = $TELEPHONE;
    }
    public function setWhatsapp($WHATSAPP){
        $this->WHATSAPP = $WHATSAPP;
    }
    public function setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    public function getId(){
        return $this->IDADHERENTS;
    }
    public function getEtat(){
        return $this->ETAT;
    }
    public function getEmail(){
        return $this->EMAIL;
    }
    public function getMdp(){
        return $this->MDP;
    }
    public function getEntreprise(){
        return $this->ENTREPRISE;
    }
    public function getActivite(){
        return $this->ACTIVITE;
    }
    public function getAdresse(){
        return $this->ADRESSE;
    }
    public function getNom(){
        return $this->NOMCOMPLET;
    }
    public function getTelephone(){
        return $this->TELEPHONE;
    }
    public function getWhatsapp(){
        return $this->WHATSAPP;
    }
    public function getIdPays(){
        return $this->ID_PAYS;
    }
    public function getDoublons($idpays,$email,$entreprise,$activite,$adresse,$nom,$telephone,$whatsapp){
        $this->db->select('IDADHERENTS');
        $this->db->from('ADHERENTS');
        $this->db->where('EMAIL',$email);
        $this->db->where('ENTREPRISE',$entreprise);
        $this->db->where('ACTIVITE',$activite);
        $this->db->where('ADRESSE',$adresse);
        $this->db->where('NOMCOMPLET',$nom);
        $this->db->where('TELEPHONE',$telephone);
        $this->db->where('WHATSAPP',$whatsapp);
        $this->db->where('ID_PAYS',$idpays);
        $doublon = $this->db->get();
        if($doublon->num_rows() == 0){
            return null;
        }
        else{
            return $doublon->row()->IDADHERENTS;
        }
    }

    public function createAdherents(){
        $data = array(
            'ETAT' => $this->getEtat(),
            'EMAIL' => $this->getEmail(),
            'MDP' => $this->getMdp(),
            'ENTREPRISE' => $this->getEntreprise(),
            'ACTIVITE' => $this->getActivite(),
            'ADRESSE' => $this->getAdresse(),
            'NOMCOMPLET' => $this->getNom(),
            'TELEPHONE' => $this->getTelephone(),
            'WHATSAPP' => $this->getWhatsapp(),
            'ID_PAYS' => $this->getIdPays()
        );
        $this->db->insert('ADHERENTS',$data);
        return $this->db->insert_id();
    }
    
    public function compterAdherents(){
        return $this->db->count_all('ADHERENTS');
    }

    public function convertPays($pays){
        if($pays == '+261'){
            return 1;
        }
        else if($pays== "+230"){
            return 2;
        }
        else if($pays== "+269"){
            return 3;
        }
        else if($pays== "+262"){
            return 4;
        }
        else if($pays== "+237"){
            return 5;
        }
        else if($pays== "+212"){
            return 6;
        }
    }
    
    public function compterAdherentsParPays($idpays){
        $sql = "SELECT count(IDADHERENTS) as nb FROM ADHERENTS WHERE ID_PAYS = ".$idpays;
        $query = $this->db->query($sql);
        return $query->row()->nb;
    }

    public function getDoublon($etat,$email,$entreprise,$activite,$adresse,$nomcomplet,$telephone,$whatsapp,$idpays){
        $this->db->select('IDADHERENTS');
        $this->db->from('ADHERENTS');
        $this->db->where('ETAT',$etat);
        $this->db->where('EMAIL',$email);
        $this->db->where('ENTREPRISE',$entreprise);
        $this->db->where('ACTIVITE',$activite);
        $this->db->where('ADRESSE',$adresse);
        $this->db->where('NOMCOMPLET',$nomcomplet);
        $this->db->where('TELEPHONE',$telephone);
        $this->db->where('WHATSAPP',$whatsapp);
        $this->db->where('ID_PAYS',$idpays);
        $single= $this->db->get();
        return $single->result();
    }

    public function checkEmail($email){
        $this->db->select('IDADHERENTS');
        $this->db->from('ADHERENTS');
        $this->db->where('EMAIL',$email);
        $single= $this->db->get();
        return $single->result();
    }

    public function gestionErreur($etat,$email,$entreprise,$activite,$adresse,$nomcomplet,$telephone,$whatsapp,$idpays){
        $erreurs = array();
        $email_check = $this->checkEmail($email);
        $doublon = $this->getDoublon($etat,$email,$entreprise,$activite,$adresse,$nomcomplet,$telephone,$whatsapp,$idpays);
        if(!isset($email) || empty($email) || $email==null || $email == ''){
            $erreurs[0] = 'Email non saisi';
        }
        if($doublon != null){
            $erreurs[1] = 'Les informations que vous venez de remplir existent déjà';
        }
        if($email_check != null){
            $erreurs[2] = 'Un adhérent est déjà associé à cet email';
        }
        return $erreurs;
    }
}
