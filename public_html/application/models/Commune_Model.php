<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commune_Model extends CI_Model {
    private $ID_COMMUNE;
    private $LOGO_COMMUNE;
    private $NOM_COMMUNE;
    private $DESCRIPTION_COMMUNE;


    public function setId($ID_COMMUNE){
        $this->ID_COMMUNE = $ID_COMMUNE;
    }
    public function setLogo($LOGO_COMMUNE){
        $this->LOGO_COMMUNE = $LOGO_COMMUNE;
    }
    public function setNom($NOM_COMMUNE){
        $this->NOM_COMMUNE = $NOM_COMMUNE;
    }
    public function setDescription($DESCRIPTION_COMMUNE){
        $this->DESCRIPTION_COMMUNE = $DESCRIPTION_COMMUNE;
    }
    
    public function getId(){
        return $this->ID_COMMUNE;
    }
    public function getLogo(){
        return $this->LOGO_COMMUNE;
    }
    public function getNom(){
        return $this->NOM_COMMUNE;
    }
    public function getDescription(){
        return $this->DESCRIPTION_COMMUNE;
    }

    public function getListe(){
        $liste = $this->db->get('COMMUNE');
        return $liste->result();
    }

    public function getSingle($idcommune){
        $this->db->where('ID_COMMUNE',$idcommune);
        $single = $this->db->get('COMMUNE');
        return $single->result();
    }
    
}
