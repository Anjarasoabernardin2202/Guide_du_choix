<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe_Model extends CI_Model {
    private $ID_MEMBRE;
    private $ID_PAYS;
    private $PROFIL_MEMBRE;
    private $NOM_MEMBRE;
    private $POSTE;
    private $TYPE_MEMBRE;

    public function setId($ID_MEMBRE){
        $this->ID_MEMBRE = $ID_MEMBRE;
    }
    
    public function setNom($NOM_MEMBRE){
        $this->NOM_MEMBRE = $NOM_MEMBRE;
    }
    
    public function setIdPays($ID_PAYS){
        $this->ID_PAYS = $ID_PAYS;
    }
    
    public function setType($TYPE_MEMBRE){
        $this->TYPE_MEMBRE = $TYPE_MEMBRE;
    }
    public function setProfil($PROFIL_MEMBRE){
        $this->PROFIL_MEMBRE = $PROFIL_MEMBRE;
    }
    public function setPoste($POSTE){
        $this->POSTE = $POSTE;
    }

    public function getId(){
        return $this->ID_MEMBRE;
    }
    public function getNom(){
        return $this->NOM_MEMBRE;
    }
    public function getIdPays(){
        return $this->ID_PAYS;
    }
    public function getType(){
        return $this->TYPE_MEMBRE;
    }
    public function getProfil(){
        return $this->PROFIL_MEMBRE;
    }
    public function getPoste(){
        return $this->POSTE;
    }
   

    public function getEquipeInternationale(){
        $this->db->where('TYPE_MEMBRE','international');
        $equipe = $this->db->get('EQUIPE');
        return $equipe->result();
    }
    public function getEquipeNationale($idpays){
        $this->db->where('TYPE_MEMBRE','national');
        $this->db->where('ID_PAYS',$idpays);
        $equipe = $this->db->get('EQUIPE');
        return $equipe->result();
    }
    public function getStagiaire($idpays){
        $this->db->where('TYPE_MEMBRE','stagiaire');
        $this->db->where('ID_PAYS',$idpays);
        $equipe = $this->db->get('EQUIPE');
        return $equipe->result();
    }

    public function compterEquipe(){
        return $this->db->count_all('EQUIPE');
    }

    public function listeEquipe($limite,$debut){
        $this->db->limit($limite,$debut);
        $single= $this->db->get('EQUIPE');
        return $single->result();
    }

    public function singleEquipe($id){
        $this->db->where('ID_MEMBRE',$id);
        $single= $this->db->get('EQUIPE');
        return $single->result();
    }

    public function findIdPays($id){
        $this->db->select('ID_PAYS');
        $this->db->from('EQUIPE');
        $this->db->where('ID_MEMBRE',$id);
        $idpays = $this->db->get();
        return $idpays->row()->ID_PAYS;
    }

   public function createEquipe(){
       $data = array(
           'ID_PAYS' => $this->getIdPays(),
           'TYPE_MEMBRE' => $this->getType(),
           'NOM_MEMBRE' =>$this->getNom(),
           'PROFIL_MEMBRE' => $this->getProfil(),
           'POSTE' => $this->getPoste()
       );
       $this->db->insert('EQUIPE',$data);
       return $this->db->insert_id();
   }

    public function updateEquipe($id){
        $data = array(
            'ID_PAYS' => $this->getIdPays(),
           'TYPE_MEMBRE' => $this->getType(),
           'NOM_MEMBRE' =>$this->getNom(),
           'PROFIL_MEMBRE' => $this->getProfil(),
           'POSTE' => $this->getPoste()
        );
        $this->db->where('ID_MEMBRE',$id);
        return $this->db->update('EQUIPE',$data);
    }

    public function deleteEquipe($id){
        $this->db->where('ID_MEMBRE',$id);
        return $this->db->delete('EQUIPE');
    }

    public function getDoublon($idpays,$type,$nom,$profil,$poste){
        $this->db->select('ID_MEMBRE');
        $this->db->from('EQUIPE');
        $this->db->where('ID_PAYS',$idpays);
        $this->db->where('TYPE_MEMBRE',$type);
        $this->db->where('NOM_MEMBRE',$nom);
        $this->db->where('PROFIL_MEMBRE',$profil);
        $this->db->where('POSTE',$poste);
        $equipe = $this->db->get();
        return $equipe->result();
    }

    public function gestionErreur($idpays,$type,$nom,$profil,$poste){
        $erreurs = array();
        $id = $this->getDoublon($idpays,$type,$nom,$profil,$poste);
        if($profil == null || !isset($profil) || empty($profil)){
            $erreurs[0] = 'Image obligatoire';
        }
        if($poste == null || !isset($poste) || empty($poste)){
            $erreurs[1] = 'Poste obligatoire';
        }
        if($nom == null || !isset($nom) || empty($nom)){
            $erreurs[2] = 'Nom obligatoire';
        }
        if($type == null || !isset($type) || empty($type)){
            $erreurs[4] = 'Vous devez selectionner un type';
        }
        if($id != null){
            $erreurs[3] = 'Vous ne pouvez pas insérer des données qui existent déjà';
        }
        return $erreurs;
    }
}
