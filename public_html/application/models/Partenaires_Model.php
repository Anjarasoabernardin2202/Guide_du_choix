<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partenaires_Model extends CI_Model {
    private $ID_PARTENAIRE;
    private $ID_PAYS;
    private $IMAGE_PARTENAIRE;
    private $TYPE_PARTENAIRE;
    private $NOM_PARTENAIRE;
    private $INTRODUCTION_PARTENAIRE;
    private $DESCRIPTION_PARTENAIRE;

    public function setId($ID_PARTENAIRE){
        $this->ID_PARTENAIRE = $ID_PARTENAIRE;
    }
    public function setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    public function setImage($IMAGE_PARTENAIRE){
        $this->IMAGE_PARTENAIRE = $IMAGE_PARTENAIRE;
    }
    public function setTypePartenaire($TYPE_PARTENAIRE){
        $this->TYPE_PARTENAIRE = $TYPE_PARTENAIRE;
    }
    public function setNom($NOM_PARTENAIRE){
        $this->NOM_PARTENAIRE = $NOM_PARTENAIRE;
    }
    public function setIntroduction($INTRODUCTION_PARTENAIRE){
        $this->INTRODUCTION_PARTENAIRE = $INTRODUCTION_PARTENAIRE;
    }
    public function setDescription($DESCRIPTION_PARTENAIRE){
        $this->DESCRIPTION_PARTENAIRE = $DESCRIPTION_PARTENAIRE;
    }

    public function getId(){
        return $this->ID_PARTENAIRE;
    }
    public function getIdPays(){
        return $this->ID_PAYS;
    }
    public function getImage(){
        return $this->IMAGE_PARTENAIRE;
    }
    public function getTypePartenaire(){
        return $this->TYPE_PARTENAIRE;
    }
    public function getNom(){
        return $this->NOM_PARTENAIRE;
    }
    public function getIntroduction(){
        return $this->INTRODUCTION_PARTENAIRE;
    }
    public function getDescription(){
        return $this->DESCRIPTION_PARTENAIRE;
    }

    public function listeParrainsLimite($limite,$debut){
        $this->db->limit($limite,$debut);
        $this->db->where('TYPE_PARTENAIRE','International');
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }

    public function listeParrains(){
        $this->db->where('TYPE_PARTENAIRE','International');
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }

    public function listePartenairesParPays($limite,$debut,$pays){
        $this->db->limit($limite,$debut);
        $this->db->where('TYPE_PARTENAIRE','National');
        $this->db->where('ID_PAYS',$pays);
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }

    public function listePartenairesParPays2($pays){
        $this->db->where('TYPE_PARTENAIRE','National');
        $this->db->where('ID_PAYS',$pays);
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }

    public function listePartenaires($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('PARTENAIRESPAYS');
        return $liste->result();
    }

    public function singlePartenaire($id){
        $this->db->where('ID_PARTENAIRE',$id);
        $single= $this->db->get('PARTENAIRES');
        return $single->result();
    }

    public function compterPartenaire(){
        $this->db->where('TYPE_PARTENAIRE','National');
        return $this->db->count_all('PARTENAIRES');
    }
    
    public function compterParrain(){
        $this->db->where('TYPE_PARTENAIRE','International');
        return $this->db->count_all('PARTENAIRES');
    }

    public function createPartenaire(){
        $data = array(
            'IMAGE_PARTENAIRE' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'NOM_PARTENAIRE' => $this->getNom(),
            'INTRODUCTION_PARTENAIRE' => $this->getIntroduction(),
            'DESCRIPTION_PARTENAIRE' => $this->getDescription(),
            'TYPE_PARTENAIRE' => $this->getTypePartenaire()
        );
        $this->db->insert('PARTENAIRES',$data);
        return $this->db->insert_id();
    }


    public function updatePartenaire($id){
        $data = array(
            'IMAGE_PARTENAIRE' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'NOM_PARTENAIRE' => $this->getNom(),
            'INTRODUCTION_PARTENAIRE' => $this->getIntroduction(),
            'DESCRIPTION_PARTENAIRE' => $this->getDescription()
            //'TYPE_PARTENAIRE' => $this->getTypePartenaire()
        );
        $this->db->where('ID_PARTENAIRE',$id);
        return $this->db->update('PARTENAIRES',$data);
    }

    public function deletePartenaire($id){
        $this->db->where('ID_PARTENAIRE',$id);
        return $this->db->delete('PARTENAIRES');
    }


    public function getDoublon($image,$idpays,$nom,$introduction,$description,$type){
        $this->db->where('IMAGE_PARTENAIRE',$image);
        $this->db->where('ID_PAYS',$idpays);
        $this->db->where('NOM_PARTENAIRE',$nom);
        $this->db->where('INTRODUCTION_PARTENAIRE',$introduction);
        $this->db->where('DESCRIPTION_PARTENAIRE',$description);
        $this->db->where('TYPE_PARTENAIRE',$type);
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }
   
    public function gestionErreurPartenaire($image,$idpays,$nom,$introduction,$description,$type){
        $erreurs = array();
        $doublon = $this->getDoublon($image,$idpays,$nom,$introduction,$description,$type);
        if(!isset($image) || empty($image) || $image == NULL){
            $erreurs[0] = 'Image obligatoire';
        }
        if($idpays == NULL || $idpays == 0){
            $erreurs[1]='Vous devez sélectionner un pays';
        }
        if(!isset($nom) || empty($nom) || $nom == NULL){
            $erreurs[2] = 'Nom obligatoire';
        }
        if($doublon != NULL){
            $erreurs[5] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        return $erreurs;
    }

    public function gestionErreurParrain($image,$idpays,$nom,$introduction,$description,$type){
        $erreurs = array();
        $doublon = $this->getDoublon($image,$idpays,$nom,$introduction,$description,$type);
        if(!isset($image) || empty($image) || $image == NULL){
            $erreurs[0] = 'Image obligatoire';
        }
        if(!isset($nom) || empty($nom) || $nom == NULL){
            $erreurs[1] = 'Nom obligatoire';
        }
        if($doublon != null){
            $erreurs[3] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        return $erreurs;
    }

    public function findPByIdPays($id){
        $this->db->where('ID_PAYS',$id);
        $this->db->where('TYPE_PARTENAIRE','National');
        $liste = $this->db->get('PARTENAIRES');
        return $liste->result();
    }

    public function findIdPays($id){
        $this->db->SELECT('ID_PAYS');
        $this->db->FROM('PARTENAIRES');
        $this->db->WHERE('ID_PARTENAIRE',$id);
        $idpays = $this->db->get();
        return $idpays->row()->ID_PAYS;
    }
 
}
