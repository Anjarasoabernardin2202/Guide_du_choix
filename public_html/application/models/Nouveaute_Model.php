<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nouveaute_Model extends CI_Model {
    private $ID_SPONSOR;
    private $IMAGE_SPONSOR;
    private $ID_PAYS;
    private $INFORMATION_SPONSOR;
    private $COORDONNEES;
    private $DEVIS;
    private $TYPE_SPONSOR;
 
    public function setId($ID_SPONSOR){
        $this->ID_SPONSOR = $ID_SPONSOR;
    }
    public function setImage($IMAGE_SPONSOR){
        $this->IMAGE_SPONSOR = $IMAGE_SPONSOR;
    }
    public function setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    public function setInformation($INFORMATION_SPONSOR){
        $this->INFORMATION_SPONSOR = $INFORMATION_SPONSOR;
    }
    public function setCoordonnees($COORDONNEES){
        $this->COORDONNEES = $COORDONNEES;
    }
    public function setDevis($DEVIS){
        $this->DEVIS = $DEVIS;
    }
    public function setType($TYPE_SPONSOR){
        $this->TYPE_SPONSOR = $TYPE_SPONSOR;
    }
 
 
    public function getId(){
        return $this->ID_SPONSOR;
    }
    public function getImage(){
        return $this->IMAGE_SPONSOR;
    }
    public function getIdPays(){
        return $this->ID_PAYS;
    }
    public function getInformation(){
        return $this->INFORMATION_SPONSOR;
    }
    public function getCoordonnees(){
        return $this->COORDONNEES;
    }
    public function getDevis(){
        return $this->DEVIS;
    }
    public function getType(){
        return $this->TYPE_SPONSOR;
    }

    public function createPub(){
        $data = array(
            'IMAGE_SPONSOR' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'INFORMATION_SPONSOR' => $this->getInformation(),
            'COORDONNEES' => $this->getCoordonnees(),
            'DEVIS' => $this->getDevis(),
            'TYPE_SPONSOR' => $this->getType()
        );
       // var_dump($data);
        $this->db->insert('PUB',$data);
        //var_dump($this->db->insert('PUB',$data));
        return $this->db->insert_id();
    }


    public function listeInternational(){
        $this->db->WHERE('TYPE_SPONSOR','international');
        $liste = $this->db->get('PUB');
        return $liste->result_array();
    }

    public function listeNational($idpays){
        $this->db->WHERE('TYPE_SPONSOR','national');
        $this->db->WHERE('ID_PAYS',$idpays);
        $liste = $this->db->get('PUB');
        return $liste->result_array();
    }

    public function listePubs($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('PUB');
        return $liste->result();
    }

    public function compterPubs(){
        return $this->db->count_all('PUB');
    }

    public function compterInternational(){
        $query = $this->db->query('SELECT count(*) as nombre FROM PUB WHERE TYPE_SPONSOR = "international" ');
        return $query->row()->nombre;
    }

    public function compterNational($idpays){
        $query = $this->db->query('SELECT count(*) as nombre FROM PUB WHERE TYPE_SPONSOR = "national" and ID_PAYS = '.$idpays);
        return $query->row()->nombre;
    }

    public function singlePub($id){
        $this->db->where('ID_SPONSOR',$id);
        $single= $this->db->get('PUB');
        return $single->result();
    }

    public function updatePub($id){
        $data = array(
            'IMAGE_SPONSOR' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'INFORMATION_SPONSOR' => $this->getInformation(),
            'COORDONNEES' => $this->getCoordonnees(),
            'DEVIS' => $this->getDevis(),
            'TYPE_SPONSOR' => $this->getType()
        );
        //var_dump($data);
        $this->db->where('ID_SPONSOR',$id);
       // var_dump($this->db->update('PUB',$data));
        return $this->db->update('PUB',$data);
    }

    public function deletePub($id){
        $this->db->where('ID_SPONSOR',$id);
        return $this->db->delete('PUB');
    }

    public function findIdPays($id){
        $this->db->select('ID_PAYS');
        $this->db->from('PUB');
        $this->db->where('ID_SPONSOR',$id);
        $idpays = $this->db->get();
        return $idpays->row()->ID_PAYS;
    }

  
    public function getDoublon($image,$type,$idpays,$information,$coordonnees,$devis){
        $this->db->select('ID_SPONSOR');
        $this->db->from('PUB');
        $this->db->where('IMAGE_SPONSOR',$image);
        $this->db->where('TYPE_SPONSOR',$type);
        $this->db->where('ID_PAYS',$idpays);
        $this->db->where('INFORMATION_SPONSOR',$information);
        $this->db->where('COORDONNEES',$coordonnees);
        $this->db->where('DEVIS',$devis);
        $single= $this->db->get();
        return $single->result();
    }

    public function gestionErreur($image,$type,$idpays,$information,$coordonnees,$devis){
        $erreurs = array();
        $doublon = $this->getDoublon($image,$type,$idpays,$information,$coordonnees,$devis);
        if(!isset($image) || empty($image) || $image == null){
            $erreurs[0] = 'Image obligatoire';
        }
        if(!isset($type) || empty($type) || $type == null){
            $erreurs[1] = 'Type obligatoire';
        }
        if($doublon != null){
            $erreurs[2] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        return $erreurs;
    }
 
}
