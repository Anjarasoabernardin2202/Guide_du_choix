<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pays_Model extends CI_Model {
    private $ID_PAYS;
    private $IMAGE_DRAPEAU ;
    private $NOM_PAYS;
    private $ACRONYME_PAYS;
    private $INTRODUCTION_PAYS;
    private $INTRODUCTION_PAYS_SMARTPHONE;
    private $IMAGE_PAYS;

    public function  setId($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    public function setDrapeau($IMAGE_DRAPEAU){
        $this->IMAGE_DRAPEAU = $IMAGE_DRAPEAU;
    }
    public function setNom($NOM_PAYS){
        $this->NOM_PAYS = $NOM_PAYS;
    }
    public function setAcronyme($ACRONYME_PAYS){
        $this->ACRONYME_PAYS = $ACRONYME_PAYS;
    }
    public function setIntroduction($INTRODUCTION_PAYS){
        $this->INTRODUCTION_PAYS = $INTRODUCTION_PAYS;
    }
    public function setIntroductionSmartphone($INTRODUCTION_PAYS_SMARTPHONE){
        $this->INTRODUCTION_PAYS_SMARTPHONE = $INTRODUCTION_PAYS_SMARTPHONE;
    }
    public function setCarte($IMAGE_PAYS){
        $this->IMAGE_PAYS = $IMAGE_PAYS;
    }

    public function getId(){
        return $this->ID_PAYS;
    }
    public function getDrapeau(){
        return $this->IMAGE_DRAPEAU ;
    }
    public function getNom(){
        return $this->NOM_PAYS;
    }
    public function getAcronyme(){
        return $this->ACRONYME_PAYS;
    }
    public function getIntroduction(){
        return $this->INTRODUCTION_PAYS;
    }
    public function getIntroductionSmartphone(){
        return $this->INTRODUCTION_PAYS_SMARTPHONE;
    }
    public function getCarte(){
        return $this->IMAGE_PAYS;
    }

    public function createPays(){
        $data = array(
            'IMAGE_DRAPEAU' => $this->getDrapeau(),
            'NOM_PAYS' => $this->getNom(),
            'ACRONYME_PAYS' => $this->getAcronyme(),
            'INTRODUCTION_PAYS' =>$this->getIntroduction(),
            'INTRODUCTION_PAYS_SMARTPHONE' => $this->getIntroductionSmartphone(),            
            'IMAGE_PAYS' => $this->getCarte()
        );
        $this->db->insert('PAYS',$data);
        return $this->db->insert_id();
    }

    public function compterPays(){
        return $this->db->count_all('PAYS');
    }

    public function listePays($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('PAYS');
        return $liste->result();
        //var_dump($liste);
    }

    public function findNameById($id){
        $this->db->select('NOM_PAYS');
        $this->db->from('PAYS');
        $this->db->where('ID_PAYS',$id);
        $nom = $this->db->get();
        return $nom->row()->NOM_PAYS;
    }

    public function findIdByName($nom){
        $this->db->select('ID_PAYS');
        $this->db->from('PAYS');
        $this->db->where('NOM_PAYS',$nom);
        $pays = $this->db->get();
        //var_dump($nom);
        return $pays->row()->ID_PAYS;
    }

    public function singlePays($id){
        $this->db->where('ID_PAYS',$id);
        $single= $this->db->get('PAYS');
        return $single->result();
    }

    public function getListeNom(){
        $this->db->order_by('NOM_PAYS','asc');
        $liste = $this->db->get('PAYS');
        return $liste->result();
    }

    public function search($mot){
        $this->db->like('NOM_PAYS',$mot);
        $search = $this->db->get('PAYS');
        return $search->result();
    }

    public function compterResultatRecherche($mot){
        $count = $this->db->query("SELECT COUNT(NOM_PAYS) as nbpays FROM PAYS WHERE NOM_PAYS like '%".$mot."%'");
        return $count->row()->nbpays;
    }

    public function updatePays($id){
        $data = array(
            'IMAGE_DRAPEAU' => $this->getDrapeau(),
            'NOM_PAYS' => $this->getNom(),
			'ACRONYME_PAYS' => $this->getAcronyme(),
            'INTRODUCTION_PAYS' => $this->getIntroduction(),
            'INTRODUCTION_PAYS_SMARTPHONE' => $this->getIntroductionSmartphone(),
            'IMAGE_PAYS' => $this->getCarte()
        );
        $this->db->where('ID_PAYS',$id);
        return $this->db->update('PAYS',$data);
    }

    public function deletePays($id){
        $this->db->where('ID_PAYS',$id);
        return $this->db->delete('PAYS');
    }

    public function getDoublon($nom,$acronyme,$smartphone,$introduction,$drapeau,$carte){
        $this->db->SELECT('ID_PAYS');
        $this->db->FROM('PAYS');
        $this->db->WHERE('IMAGE_DRAPEAU',$drapeau);
        $this->db->WHERE('NOM_PAYS',$nom);
        $this->db->WHERE('ACRONYME_PAYS',$acronyme);
        $this->db->WHERE('INTRODUCTION_PAYS',$introduction);
        $this->db->WHERE('IMAGE_PAYS',$carte);
        $this->db->WHERE('INTRODUCTION_PAYS_SMARTPHONE',$smartphone);
        $doublon = $this->db->get();
        return $doublon->result();
    }

    public function gestionErreur($nom,$acronyme,$introduction,$smartphone,$drapeau,$carte){
        $erreurs = array();
        $id = $this->getDoublon($nom,$acronyme,$smartphone,$introduction,$drapeau,$carte);
        if(!isset($nom) || empty($nom)){
            $erreurs[0] = "Nom obligatoire";
        }
        if(!isset($acronyme) || empty($acronyme)){
            $erreurs[1] = "Acronyme obligatoire";
        }
        if(!isset($introduction) || empty($introduction)){
            $erreurs[2] = "Introduction obligatoire";
        }
        if(!isset($drapeau) || empty($drapeau)){
            $erreurs[3] = "Drapeau obligatoire";
        }
        if(!isset($carte) || empty($carte)){
            $erreurs[4] = "Carte obligatoire";
        }
        if($id != null){
            $erreurs[5] = "Vous ne pouvez pas insérer des données qui existent déja";
        }
        return $erreurs;
    }

    public function getNomById($id){
        $this->db->select('NOM_PAYS');
        $this->db->from('PAYS');
        $this->db->where('ID_PAYS',$id);
        $pays = $this->db->get();
        return $pays->row()->NOM_PAYS;
    }
}
