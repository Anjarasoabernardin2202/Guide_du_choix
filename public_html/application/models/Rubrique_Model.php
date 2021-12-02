<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rubrique_Model extends CI_Model {
    private $ID_RUBRIQUE;
    private $ID_PAYS;
    private $IMAGE_RUBRIQUE;
    private $NOM_RUBRIQUE;
    private $DESCRIPTION_RUBRIQUE;
    private $DESCRIPTION_RUBRIQUE_SMARTPHONE;
    private $MAURICE;
    private $COMORES;
    private $MAYOTTE;
    private $MAROC;
    private $CAMEROUN;


    public function  setId($ID_RUBRIQUE){
        $this->ID_RUBRIQUE = $ID_RUBRIQUE;
    }
    public function  setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    public function setImage($IMAGE_RUBRIQUE){
        $this->IMAGE_RUBRIQUE = $IMAGE_RUBRIQUE;
    }
    public function setNom($NOM_RUBRIQUE){
        $this->NOM_RUBRIQUE = $NOM_RUBRIQUE;
    }
    public function setDescription($DESCRIPTION_RUBRIQUE){
        $this->DESCRIPTION_RUBRIQUE = $DESCRIPTION_RUBRIQUE;
    }
    public function setDescriptionSmartphone($DESCRIPTION_RUBRIQUE_SMARTPHONE){
        $this->DESCRIPTION_RUBRIQUE_SMARTPHONE = $DESCRIPTION_RUBRIQUE_SMARTPHONE;
    }
    public function setMaurice($MAURICE){
        $this->MAURICE = $MAURICE;
    } 
    public function setComores($COMORES){
        $this->COMORES = $COMORES;
    } 
    public function setMayotte($MAYOTTE){
        $this->MAYOTTE = $MAYOTTE;
    } 
    public function setMaroc($MAROC){
        $this->MAROC = $MAROC;
    } 
    public function setCameroun($CAMEROUN){
        $this->CAMEROUN = $CAMEROUN;
    }

    public function getId(){
        return $this->ID_RUBRIQUE;
    }
    public function getIdPays(){
        return $this->ID_PAYS;
    }
    public function getImage(){
        return $this->IMAGE_RUBRIQUE ;
    }
    public function getNom(){
        return $this->NOM_RUBRIQUE;
    }
    public function getDescription(){
        return $this->DESCRIPTION_RUBRIQUE;
    }
    public function getDescriptionSmartphone(){
        return $this->DESCRIPTION_RUBRIQUE_SMARTPHONE;
    }
    public function getMaurice(){
        return $this->MAURICE;
    } 
    public function getComores(){
        return $this->COMORES;
    } 
    public function getMayotte(){
       return $this->MAYOTTE;
    } 
    public function getMaroc(){
        return $this->MAROC;
    } 
    public function getCameroun(){
        return $this->CAMEROUN;
    }
    public function compterRubrique(){
        return $this->db->count_all('RUBRIQUE');
    }

    public function listeRubriques($limite,$debut){
        $this->db->select('*');
        $this->db->from('RUBRIQUE');
        $this->db->limit($limite,$debut);
        $liste = $this->db->get();
        return $liste->result();
    }

    public function findIdbyName($nom){
        $this->db->select('ID_RUBRIQUE');
        $this->db->where('NOM_RUBRIQUE',$nom);
        $this->db->from('RUBRIQUE');
        $liste = $this->db->get();
        return $liste->row()->ID_RUBRIQUE;
    }

    public function findNamebyId($id){
        $this->db->select('NOM_RUBRIQUE');
        $this->db->from('RUBRIQUE');
        $this->db->where('ID_RUBRIQUE',$id);
        $liste = $this->db->get();
        return $liste->row()->NOM_RUBRIQUE;
    }

    public function listeRub(){
        $this->db->select('*');
        $this->db->from('RUBRIQUE');
        $liste = $this->db->get();
        return $liste->result();
    }

    public function liste($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get("PAYSRUBRIQUES2");
        //var_dump($liste->result());
        return  $liste->result();
    }
    
    public function singleRubrique($id){
        $this->db->where('ID_RUBRIQUE',$id);
        $single= $this->db->get('RUBRIQUE');
        return $single->result();
    }

    
    public function getPays($idrubrique){
        $this->db->select('ID_PAYS');
        $this->db->from('RUBRIQUE');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $idpays = $this->db->get();
        return $idpays->row()->ID_PAYS;
    }

    public function search($mot){
        $this->db->like('NOM_RUBRIQUE',$mot);
        $search = $this->db->get('RUBRIQUE');
        return $search->result();
    }

    public function compterResultatRecherche($mot){
        $count = $this->db->query("SELECT COUNT(NOM_RUBRIQUE) as nbrubrique FROM RUBRIQUE WHERE NOM_RUBRIQUE like '%".$mot."%' OR DESCRIPTION_RUBRIQUE like '%".$mot."%' ");
        return $count->row()->nbrubrique;
    }

    public function updateRubrique($id){
        $data = array(
            'IMAGE_RUBRIQUE' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'NOM_RUBRIQUE' => $this->getNom(),
            'DESCRIPTION_RUBRIQUE' => $this->getDescription(),
            'DESCRIPTION_RUBRIQUE_SMARTPHONE'=>$this->getDescriptionSmartphone(),
            'MAURICE'=>$this->getMaurice(),
            'COMORES'=>$this->getComores(),
            'CAMEROUN'=>$this->getCameroun(),
            'MAROC'=>$this->getMaroc(),
            'MAYOTTE'=>$this->getMayotte()
        );
        $this->db->where('ID_RUBRIQUE',$id);
        return $this->db->update('RUBRIQUE',$data);
    }

    public function deleteRubrique($id){
        $this->db->where('ID_RUBRIQUE',$id);
        return $this->db->delete('RUBRIQUE');
    }

    public function createRubrique(){
        $data = array(
            'IMAGE_RUBRIQUE' => $this->getImage(),
            'ID_PAYS' => $this->getIdPays(),
            'NOM_RUBRIQUE' => $this->getNom(),
            'DESCRIPTION_RUBRIQUE' => $this->getDescription(),
            'DESCRIPTION_RUBRIQUE_SMARTPHONE' => $this->getDescriptionSmartphone(),
            'MAURICE'=>$this->getMaurice(),
            'COMORES'=>$this->getComores(),
            'CAMEROUN'=>$this->getCameroun(),
            'MAROC'=>$this->getMaroc(),
            'MAYOTTE'=>$this->getMayotte()
        );
        $this->db->insert('RUBRIQUE',$data);
        return $this->db->insert_id();
    }

    public function getDoublon($image,$idpays,$nom,$description,$smartphone){
        $this->db->select('ID_RUBRIQUE');
        $this->db->from('RUBRIQUE');
        $this->db->where('IMAGE_RUBRIQUE',$image);
        $this->db->where('ID_PAYS',$idpays);
        $this->db->where('NOM_RUBRIQUE',$nom);
        $this->db->where('DESCRIPTION_RUBRIQUE',$description);
        $this->db->where('DESCRIPTION_RUBRIQUE_SMARTPHONE',$smartphone);
        $id= $this->db->get();
        return $id->result();
    }

    public function findIdPays($id){
        $this->db->SELECT('ID_PAYS');
        $this->db->FROM('RUBRIQUE');
        $this->db->WHERE('ID_RUBRIQUE',$id);
        $idpays = $this->db->get();
        return $idpays->row()->ID_PAYS;
    }

    public function gestionErreur($image,$idpays,$nom,$description,$smartphone){
        $erreurs = array();
        $id = $this->getDoublon($image,$idpays,$nom,$description,$smartphone);
        //var_dump($id);
        if(!isset($nom) || empty($nom)){
            $erreurs[0] = "Nom obligatoire";
        }
        if(!isset($image) || empty($image)){
            $erreurs[1] = "Image obligatoire";
        }
        if(!isset($description) || empty($description)){
            $erreurs[2] = "Description obligatoire";
        }
        if($idpays==null || $idpays==0){
            $erreurs[3] = "Vous devez sélectionner un pays";
        }
        if($id != null){
            $erreurs[4] = "Vous ne pouvez pas insérer des données qui existent déja";
        }
        return $erreurs;
    }

    public function findByIdPays($id){
        $this->db->where('ID_PAYS',$id);
        $liste = $this->db->get('RUBRIQUE');
        return $liste->result();
    }

    // public function findIdPays($id){
    //     $this->db->select('ID_PAYS');
    //     $this->db->from('RUBRIQUE');
    //     $this->db->where('ID_RUBRIQUE',$id);
    //     $idpays = $this->db->get();
    //     return $idpays->row()->ID_PAYS;
    // }
}
