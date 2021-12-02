<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine_Model extends CI_Model {
    private $ID_MINIGUIDE;
    private $ID_GUIDE;
    private $ID_MINIGUIDE2;
    private $NOM_MINIGUIDE;
    private $TITRE_MINIGUIDE;
    private $TEXTE_MINIGUIDE;
    private $CONTENU_MINIGUIDE;
    private $BANDE_MINIGUIDE;
    private $SMARTPHONE_MINIGUIDE;

    public function setId($ID_MINIGUIDE){
        $this->ID_MINIGUIDE = $ID_MINIGUIDE;
    }
    public function setIdGuide($ID_GUIDE){
        $this->ID_GUIDE = $ID_GUIDE;
    }
    public function setId2($ID_MINIGUIDE2){
        $this->ID_MINIGUIDE2 = $ID_MINIGUIDE2;
    }
    public function setNom($NOM_MINIGUIDE){
        $this->NOM_MINIGUIDE = $NOM_MINIGUIDE;
    }
    public function setTitre($TITRE_MINIGUIDE){
        $this->TITRE_MINIGUIDE = $TITRE_MINIGUIDE;
    }
    public function setTexte($TEXTE_MINIGUIDE){
        $this->TEXTE_MINIGUIDE = $TEXTE_MINIGUIDE;
    }
    public function setContenu($CONTENU_MINIGUIDE){
        $this->CONTENU_MINIGUIDE = $CONTENU_MINIGUIDE;
    }
    public function setBande($BANDE_MINIGUIDE){
        $this->BANDE_MINIGUIDE = $BANDE_MINIGUIDE;
    }
    public function setSmartphone($SMARTPHONE_MINIGUIDE){
        $this->SMARTPHONE_MINIGUIDE = $SMARTPHONE_MINIGUIDE;
    }
   

    public function getId(){
        return $this->ID_MINIGUIDE;
    }
    public function getIdGuide(){
        return $this->ID_GUIDE;
    }
    public function getId2(){
        return $this->ID_MINIGUIDE2;
    }
    public function getNom(){
        return $this->NOM_MINIGUIDE;
    }
    
    public function getTitre(){
        return $this->TITRE_MINIGUIDE;
    }

    public function getTexte(){
        return $this->TEXTE_MINIGUIDE;
    }
    
    public function getContenu(){
        return $this->CONTENU_MINIGUIDE;
    }
    
    public function getBande(){
        return $this->BANDE_MINIGUIDE;
    }
    
    public function getSmartphone(){
        return $this->SMARTPHONE_MINIGUIDE;
    }

    public function compterMiniguide(){
        return $this->db->count_all('MINIGUIDE');
    }

    public function listeMiniguide($limite,$debut){
        $this->db->limit($limite,$debut);
        $single= $this->db->get('MINIGUIDE');
        return $single->result();
    }

    public function listeMiniguide2(){
        $this->db->where('ID_MINIGUIDE2',null);
        $single= $this->db->get('MINIGUIDE');
        return $single->result();
    }

    public function singleMiniguide($id){
        $this->db->where('ID_MINIGUIDE',$id);
        $single= $this->db->get('MINIGUIDE');
        return $single->result();
    }

   public function createMiniguide(){
       $data = array(
           'ID_MINIGUIDE2' => $this->getId2(),
            'ID_GUIDE' => $this->getIdGuide(),
           'NOM_MINIGUIDE' => $this->getNom(),
           'TITRE_MINIGUIDE' => $this->getTitre(),
           'TEXTE_MINIGUIDE' => $this->getTexte(),
           'CONTENU_MINIGUIDE' =>$this->getContenu(),
           'BANDE_MINIGUIDE' => $this->getBande(),
           'SMARTPHONE_MINIGUIDE' => $this->getSmartphone()
       );
       //svar_dump($data);
       $this->db->insert('MINIGUIDE',$data);
       return $this->db->insert_id();
   }

    public function updateMiniguide($id){
        $data = array(
            'ID_MINIGUIDE2' => $this->getId2(),
        //    'ID_GUIDE' => $this->getIdGuide(),
            'NOM_MINIGUIDE' => $this->getNom(),
            'TITRE_MINIGUIDE' => $this->getTitre(),
            'TEXTE_MINIGUIDE' => $this->getTexte(),
            'CONTENU_MINIGUIDE' =>$this->getContenu(),
            'BANDE_MINIGUIDE' => $this->getBande(),
            'SMARTPHONE_MINIGUIDE' => $this->getSmartphone()
        );
        $this->db->where('ID_MINIGUIDE',$id);
        return $this->db->update('MINIGUIDE',$data);
    }

    public function findNomMiniguideById($id){
        $this->db->select('NOM_MINIGUIDE');
        $this->db->from('MINIGUIDE');
        $this->db->where('ID_MINIGUIDE',$id);
        $liste = $this->db->get();
        return $liste->row()->NOM_MINIGUIDE;  
    }


    public function deleteMiniguide($id){
        $this->db->where('ID_MINIGUIDE',$id);
        return $this->db->delete('MINIGUIDE');
    }

    public function getDoublon($nom,$titre,$texte,$bande,$contenu,$smartphone){
        $this->db->select('ID_MINIGUIDE');
        $this->db->from('MINIGUIDE');
        $this->db->where('NOM_MINIGUIDE',$nom);
        $this->db->where('TITRE_MINIGUIDE',$titre);
        $this->db->where('TEXTE_MINIGUIDE',$texte);
        $this->db->where('BANDE_MINIGUIDE',$bande);
        $this->db->where('CONTENU_MINIGUIDE',$contenu);
        $this->db->where('SMARTPHONE_MINIGUIDE',$smartphone);
        $equipe = $this->db->get();
        return $equipe->result();
    }

    public function getMagazine($idguide){
        $this->db->where('ID_GUIDE',$idguide);
        $equipe = $this->db->get('MINIGUIDE');
        return $equipe->result();
    }

    public function getGuide($idguide){
        $this->db->select('ID_GUIDE');
        $this->db->from('MINIGUIDE');
        $this->db->where('ID_GUIDE',$idguide);
        $idguide = $this->db->get();
        return $idguide->result();
    }

    public function gestionErreur($nom,$titre,$texte,$bande,$contenu,$smartphone){
        $erreurs = array();
        $id = $this->getDoublon($nom,$titre,$texte,$bande,$contenu,$smartphone);
        // if($bande == null || !isset($bande) || empty($bande)){
        //     $erreurs[0] = 'Image obligatoire';
        // }
        // if($titre == null || !isset($titre) || empty($titre)){
        //     $erreurs[1] = 'Titre obligatoire';
        // }
        // if($nom == null || !isset($nom) || empty($nom)){
        //     $erreurs[2] = 'Nom obligatoire';
        // }
        if($id != null){
            $erreurs[3] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        return $erreurs;
    }
}
