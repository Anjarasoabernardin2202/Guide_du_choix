<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide_Model extends CI_Model {
    private $ID_GUIDE;
    private $ID_RUBRIQUE;
    private $IMAGE_GUIDE;
    private $SYMBOLE_GUIDE;
    private $NOM_GUIDE;
    private $DESCRIPTION_GUIDE;
    private $DESCRIPTION_GUIDE_SMARTPHONE;

    public function  setId($ID_GUIDE){
        $this->ID_GUIDE = $ID_GUIDE;
    }
    public function  setIdRubrique($ID_RUBRIQUE){
        $this->ID_RUBRIQUE = $ID_RUBRIQUE;
    }
    public function setImage($IMAGE_GUIDE){
        $this->IMAGE_GUIDE = $IMAGE_GUIDE;
    }
    public function setSymbole($SYMBOLE_GUIDE){
        $this->SYMBOLE_GUIDE = $SYMBOLE_GUIDE;
    }
    public function setNom($NOM_GUIDE){
        $this->NOM_GUIDE = $NOM_GUIDE;
    }
    public function setDescription($DESCRIPTION_GUIDE){
        $this->DESCRIPTION_GUIDE = $DESCRIPTION_GUIDE;
    }
    public function setDescriptionSmart($DESCRIPTION_GUIDE_SMARTPHONE){
        $this->DESCRIPTION_GUIDE_SMARTPHONE = $DESCRIPTION_GUIDE_SMARTPHONE;
    }
    public function getId(){
        return $this->ID_GUIDE;
    }
    public function getIdRubrique(){
        return $this->ID_RUBRIQUE;
    }
    public function getImage(){
        return $this->IMAGE_GUIDE;
    }
    public function getSymbole(){
        return $this->SYMBOLE_GUIDE;
    }
    public function getNom(){
        return $this->NOM_GUIDE;
    }
    public function getDescription(){
        return $this->DESCRIPTION_GUIDE;
    }
    public function getDescriptionSmart(){
        return $this->DESCRIPTION_GUIDE_SMARTPHONE;
    }
    public function compterGuide(){
        return $this->db->count_all('GUIDE');
    }

    public function getIdRubriqueByGuide($idguide){
        $this->db->select('ID_RUBRIQUE');
        $this->db->from('GUIDE');
        $this->db->where('ID_GUIDE',$idguide);
        $rubrique = $this->db->get();
        return $rubrique->row()->ID_RUBRIQUE;
    }

    public function getImageGuide($idguide){
        $this->db->where('IDGUIDE',$idguide);
        $image = $this->db->get('IMAGE');
        return $image->result_array();
    }

    public function listeGuidesLimit($limite,$debut,$idrubrique){
        $this->db->select('*');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $this->db->from('GUIDE');
        $this->db->limit($limite,$debut);
        $liste = $this->db->get();
        return $liste->result();
    }

    public function listeGuides($idrubrique){
        $this->db->select('*');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $this->db->from('GUIDE');
        $this->db->order_by("NOM_GUIDE","ASC");
        $liste = $this->db->get();
        if($liste->num_rows() == 0){
            return null;
        }
        else{
            return $liste->result();
        }
    }
    public function listeGuides2($idrubrique){
        $this->db->select('*');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $this->db->from('GUIDE');
        $this->db->order_by("NOM_GUIDE","ASC");
        $this->db->order_by('CATEGORIE_GUIDE');
        $liste = $this->db->get();
        if($liste->num_rows() == 0){
            return null;
        } else{
            return $liste->result_array();

        }
    }

    public function categorieguide($idrubrique){
        $this->db->select('*');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $this->db->group_by('CATEGORIE_GUIDE');
        $this->db->from('GUIDE');
        $liste = $this->db->get();
        if($liste->num_rows() == 0){
            return null;
        }
        else{
            return $liste->result();
        }
    }

    public function liste($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('PRATIQUES');
        return $liste->result();
    }

    public function findIdbyName($nom){
      // $liste =  $this->db->query('SELECT ID_GUIDE FROM GUIDE WHERE NOM_GUIDE ="'.$nom.'"');
        $this->db->select('ID_GUIDE');
        $this->db->from('GUIDE');
        $this->db->where('NOM_GUIDE',$nom);
        $liste = $this->db->get();
        // var_dump('SELECT ID_GUIDE FROM GUIDE WHERE NOM_GUIDE ="'.$nom.'"');
         return $liste->row()->ID_GUIDE;
    }

    public function findByName($nom){
        $this->db->where('NOM_GUIDE',$nom);
        $liste = $this->db->get('GUIDE');
        return $liste->result_array();
    }

    public function findNameById($id){
        $this->db->select('NOM_GUIDE');
        $this->db->from('GUIDE');
        $this->db->where('ID_GUIDE',$id);
        $liste = $this->db->get();
        return $liste->row()->NOM_GUIDE;
       
    }

    public function singleGuide($id){
        $this->db->where('ID_GUIDE',$id);
        $single= $this->db->get('GUIDE');
        return $single->result();
    }

    public function getListeNom($idrubrique){
        $this->db->select('*');
        $this->db->from('GUIDE');
        $this->db->where('ID_RUBRIQUE',$idrubrique);
        $liste = $this->db->get();
        return $liste->result();
    }

    public function getListe(){
        $liste = $this->db->get('GUIDE');
        return $liste->result();
    }
    public function getRubrique($idguide){
        $this->db->select('ID_RUBRIQUE');
        $this->db->from('GUIDE');
        $this->db->where('ID_GUIDE',$idguide);
        $idrubrique = $this->db->get();
        return $idrubrique->row()->ID_RUBRIQUE;
    }

    public function compterResultatRecherche($mot){
        $count = $this->db->query("SELECT COUNT(NOM_GUIDE) as nbguide FROM GUIDE WHERE NOM_GUIDE like '%".$mot."%' OR DESCRIPTION_GUIDE like '%".$mot."%' ");
        return $count->row()->nbguide;
    }

    public function createGuide(){
        $data = array(
            'ID_RUBRIQUE' => $this->getIdRubrique(),
            'SYMBOLE_GUIDE' => $this->getSymbole(),
            'IMAGE_GUIDE' => $this->getImage(),
            'NOM_GUIDE' => $this->getNom(),
            'DESCRIPTION_GUIDE' => $this->getDescription(),
            'DESCRIPTION_GUIDE_SMARTPHONE' => $this->getDescriptionSmart()
        );
        $this->db->insert('GUIDE',$data);
        return $this->db->insert_id();
    }

    public function updateGuide($id){
        $data = array(
            'ID_RUBRIQUE' => $this->getIdRubrique(),
            'IMAGE_GUIDE' => $this->getImage(),
            'SYMBOLE_GUIDE' => $this->getSymbole(),
            'NOM_GUIDE' => $this->getNom(),
            'DESCRIPTION_GUIDE' => $this->getDescription(),
            'DESCRIPTION_GUIDE_SMARTPHONE' => $this->getDescriptionSmart()            
        );
        $this->db->where('ID_GUIDE',$id);
        return $this->db->update('GUIDE',$data);
    }

    public function deleteGuide($id){
        $this->db->where('ID_GUIDE',$id);
        return $this->db->delete('GUIDE');
    }

    
    public function getDoublon($image,$symbole,$idrubrique,$nom,$description,$smartphone){
        $this->db->SELECT('ID_GUIDE');
        $this->db->FROM('GUIDE');
        $this->db->WHERE('IMAGE_GUIDE',$image);
        $this->db->WHERE('SYMBOLE_GUIDE',$symbole);
        $this->db->WHERE('ID_RUBRIQUE',$idrubrique);
        $this->db->WHERE('NOM_GUIDE',$nom);
        $this->db->WHERE('DESCRIPTION_GUIDE',$description);
        $this->db->WHERE('DESCRIPTION_GUIDE_SMARTPHONE',$smartphone);
        $doublon = $this->db->get();
        //var_dump($doublon);
        return $doublon->result();
    }

    public function gestionErreur($image,$symbole,$idrubrique,$nom,$description,$smartphone){
        $erreurs = array();
        $id = $this->getDoublon($image,$symbole,$idrubrique,$nom,$description,$smartphone);
        //var_dump($id);
        if(!isset($nom) || empty($nom)){
            $erreurs[0] = "Nom obligatoire";
        }
        if(!isset($image) || empty($image)){
            $erreurs[1] = "Image du guide obligatoire";
        }
        if(!isset($description) || empty($description)){
            $erreurs[2] = "Description obligatoire";
        }
        if($id != null){
            $erreurs[3] = "Vous ne pouvez pas insérer des données qui existent déja";
        }
        if($idrubrique == 0){
            $erreurs[4] = "Vous devez sélectionner une rubrique";
        }
        if(!isset($symbole) || empty($symbole)){
            $erreurs[5] = "Symbole du guide obligatoire";
        }
        return $erreurs;
    }

    public function findIdRubrique($id){
        $this->db->select('ID_RUBRIQUE');
        $this->db->where('ID_GUIDE',$id);
        $this->db->from('GUIDE');
        $liste = $this->db->get();
        return $liste->row()->ID_RUBRIQUE;
    }

    public function findByIdRubrique($id){
        $this->db->where('ID_RUBRIQUE',$id);
        $liste = $this->db->get('GUIDE');
        return $liste->result();
    }

}
