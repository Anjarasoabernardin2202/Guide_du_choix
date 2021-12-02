<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert_Model extends CI_Model {
    private $ID_EXPERT;
    private $ID_GUIDE;
    private $ID_PAYS;
    private $LOGO_EXPERT;
    private $LIEN_EXPERT;
    private $SLOGAN;
    private $IMAGE_EXPERT;
    private $NOM_EXPERT;
    private $MAIL_EXPERT;
    private $INFORMATION_EXPERT;
    private $DEVIS;
    private $COORDONNEES;
 
     public function setId($ID_EXPERT){
       $this->ID_EXPERT = $ID_EXPERT;
     }
     public function setIdGuide($ID_GUIDE){
         $this->ID_GUIDE = $ID_GUIDE;
     }
     public function setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
     public function setImage($IMAGE_EXPERT){
         $this->IMAGE_EXPERT = $IMAGE_EXPERT;
     }
     public function setLogo($LOGO_EXPERT){
        $this->LOGO_EXPERT = $LOGO_EXPERT;
    }
    public function setLien($LIEN_EXPERT){
        $this->LIEN_EXPERT = $LIEN_EXPERT;
    }
    public function setSlogan($SLOGAN){
        $this->SLOGAN = $SLOGAN;
    }
     public function setNom($NOM_EXPERT){
         $this->NOM_EXPERT = $NOM_EXPERT;
     }
     public function setMail($MAIL_EXPERT){
        $this->MAIL_EXPERT = $MAIL_EXPERT;
    }
     public function setInformation($INFORMATION_EXPERT){
         $this->INFORMATION_EXPERT = $INFORMATION_EXPERT;
     }
     public function setDevis($DEVIS){
         $this->DEVIS = $DEVIS;
     }
     public function setCoordonnees($COORDONNEES){
        $this->COORDONNEES = $COORDONNEES;
    }
 
     public function getId(){
         return $this->ID_EXPERT;
     }
     public function getIdGuide(){
         return $this->ID_GUIDE;
     }
     public function getIdPays(){
        return $this->ID_PAYS;
    }
     public function getImage(){
         return $this->IMAGE_EXPERT;
     }
     public function getLogo(){
         return $this->LOGO_EXPERT;
     }
     public function getLien(){
        return $this->LIEN_EXPERT;
    }
     public function getSlogan(){
         return $this->SLOGAN;
     }
     public function getNom(){
         return $this->NOM_EXPERT;
     }
     public function getMail(){
        return $this->MAIL_EXPERT;
    }
     public function getInformation(){
         return $this->INFORMATION_EXPERT;
     }
     public function getCoordonnees(){
         return $this->COORDONNEES;
     }
     public function getDevis(){
        return $this->DEVIS;
    }

    public function findGuideById($id){
        $this->db->select('ID_GUIDE');
        $this->db->from('EXPERT');
        $this->db->where('ID_EXPERT',$id);
        $guide = $this->db->get();
        return $guide->row()->ID_GUIDE;
    }

    public function findIdPays($id){
        $this->db->select('ID_PAYS');
        $this->db->from('EXPERT');
        $this->db->where('ID_EXPERT',$id);
        $guide = $this->db->get();
        return $guide->row()->ID_PAYS;
    }

    public function findExpertByGuide($idguide){
        $this->db->select('ID_EXPERT');
        $this->db->from('EXPERT');
        $this->db->where('ID_GUIDE',$idguide);
        $guide = $this->db->get();
        return $guide->row()->ID_EXPERT;
    }

     public function listeExperts($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('EXPERTGUIDEPAYS');
        return $liste->result();
    }

    public function getExpertGuide($idguide,$idpays){
        $this->db->where('ID_GUIDE',$idguide);
        $this->db->where('ID_PAYS',$idpays);
        $expert = $this->db->get('EXPERT');
        return $expert->result();
    }

    public function compterExpert(){
         return $this->db->count_all('EXPERT');
    }
 
    public function singleExpert($id){
         $this->db->where('ID_EXPERT',$id);
         $single= $this->db->get('EXPERT');
         return $single->result();
    }

    public function createExpert(){
        $data = array(
            'ID_GUIDE' => $this->getIdGuide(),
            'ID_PAYS' => $this->getIdPays(),
            'IMAGE_EXPERT' => $this->getImage(),
            'NOM_EXPERT' => $this->getNom(),
            'LOGO_EXPERT' => $this->getLogo(),
            'LIEN_EXPERT' => $this->getLien(),
            'SLOGAN' => $this->getSlogan(),
            'MAIL_EXPERT' => $this->getMail(),
            'INFORMATION_EXPERT' => $this->getInformation(),
            'COORDONNEES' => $this->getCoordonnees(),
            'DEVIS' => $this->getDevis()
        );
        $this->db->insert('EXPERT',$data);
        return $this->db->insert_id();
    }

    public function updateExpert($id){
        $data = array(
            'ID_GUIDE' => $this->getIdGuide(),
            'ID_PAYS' => $this->getIdPays(),
            'IMAGE_EXPERT' => $this->getImage(),
            'LOGO_EXPERT' => $this->getLogo(),
            'LIEN_EXPERT' => $this->getLien(),
            'SLOGAN' => $this->getSlogan(),
            'NOM_EXPERT' => $this->getNom(),
            'MAIL_EXPERT' => $this->getMail(),
            'INFORMATION_EXPERT' => $this->getInformation(),
            'COORDONNEES' => $this->getCoordonnees(),
            'DEVIS' => $this->getDevis()
        );
        $this->db->where('ID_EXPERT',$id);
        return $this->db->update('EXPERT',$data);
    }

    public function deleteExpert($id){
        $this->db->where('ID_EXPERT',$id);
        return $this->db->delete('EXPERT');
    }

    public function getDoublon($idguide,$idpays,$image,$nom,$logo,$lien,$slogan,$mail,$information,$coordonnees,$devis){
        $this->db->select('ID_EXPERT');
        $this->db->from('EXPERT');
        $this->db->where('ID_GUIDE',$idguide);
        $this->db->where('ID_PAYS',$idpays);
        $this->db->where('IMAGE_EXPERT',$image);
        $this->db->where('LOGO_EXPERT',$logo);
        $this->db->where('LIEN_EXPERT',$lien);
        $this->db->where('SLOGAN',$slogan);
        $this->db->where('NOM_EXPERT',$nom);
        $this->db->where('MAIL_EXPERT',$mail);
        $this->db->where('INFORMATION_EXPERT',$information);
        $this->db->where('DEVIS',$devis);
        $this->db->where('COORDONNEES',$coordonnees);
        $expert = $this->db->get();
        return $expert->result();
    }

    public function gestionErreur($idguide,$idpays,$image,$nom,$logo,$lien,$slogan,$mail,$information,$coordonnees,$devis){
        $erreurs = array();
        $id = $this->getDoublon($idguide,$idpays,$image,$nom,$logo,$lien,$slogan,$mail,$information,$coordonnees,$devis);
        if($idguide == 0 || $idguide == null){
            $erreurs[0] = 'Vous devez choisir un guide';
        }
        if($idpays == 0 || $idpays == null){
            $erreurs[5] = 'Vous devez choisir un pays';
        }
        if(!isset($image) ||  empty($image)){
            $erreurs[1] = 'Image obligatoire';
        }
        if(!isset($nom) || empty($nom)){
            $erreurs[2] = 'Nom obligatoire';
        }
        if($id != null){
            $erreurs[3] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        if(!isset($logo) || empty($logo)){
            $erreurs[4] = 'Logo obligatoire';
        }
        return $erreurs;
    }
 
}
