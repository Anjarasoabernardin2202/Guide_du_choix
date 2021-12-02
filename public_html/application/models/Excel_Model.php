<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Excel_Model extends CI_Model {
        private $ID_MEMBRE;
        private $ID_PAYS;
        private $DOMAINE;
        private $SOUS_DOMAINE;
        private $NOM_ENTREPRISE;
        private $SITE_WEB;
        private $TELEPHONE;
        private $EMAIL;
        private $ADRESSE;
        private $LIEU;
    
    
        public function setId($ID_MEMBRE){
            $this->ID_MEMBRE = $ID_MEMBRE;
        }
        public function setIdPays($ID_PAYS){
            $this->ID_PAYS = $ID_PAYS;
        }
        public function setDomaine($DOMAINE){
                $this->DOMAINE = $DOMAINE;
        }
        public function setSousDomaine($SOUS_DOMAINE){
            $this->SOUS_DOMAINE= $SOUS_DOMAINE;
        }
        public function setNom($NOM_ENTREPRISE){
            $this->NOM_ENTREPRISE = $NOM_ENTREPRISE;
        }
        public function setSite($SITE_WEB){
            $this->SITE_WEB = $SITE_WEB;
        }
        public function setTelephone($TELEPHONE){
            $this->TELEPHONE = $TELEPHONE;
        }
        public function setEmail($EMAIL){
            $this->EMAIL = $EMAIL;
        }
        public function setAdresse($ADRESSE){
            $this->ADRESSE= $ADRESSE;
        }
        public function setLieu($LIEU){
            $this->LIEU = $LIEU;
        }
    
        public function getId(){
            return $this->ID_MEMBRE;
        }
        public function getIdPays(){
            return $this->ID_PAYS;
        }
        public function getDomaine(){
            return $this->DOMAINE;
        }
        public function getSousDomaine(){
            return $this->SOUS_DOMAINE;
        }
        public function getNom(){
            return $this->NOM_ENTREPRISE;
        }
        public function getSite(){
            return $this->SITE_WEB;
        }
        public function getTelephone(){
            return $this->TELEPHONE;
        }
        public function getEmail(){
            return $this->EMAIL;
        }
        public function getAdresse(){
            return $this->ADRESSE;
        }
        public function getLieu(){
            return $this->LIEU;
        }    
    
        public function getEntreprise($limite,$debut){
            $this->db->limit($limite,$debut);   
            $query = $this->db->get('ENTREPRISE_MEMBRE');
            return $query->result();
        }

        public function insertExcel(){
            $data[] = array(
                'ID_PAYS' => $this->getIdPays(),
                'DOMAINE' => $this->getDomaine(),
                'SOUS_DOMAINE' => $this->getSousDomaine(),
                'NOM_ENTREPRISE' => $this->getNom(),
                'SITE_WEB' => $this->getSite(),
                'TELEPHONE' => $this->getTelephone(),
                'EMAIL' => $this->getEmail(),
                'ADRESSE' => $this->getAdresse(),
                'LIEU' => $this->getLieu(),
            );
           $this->db->insert_batch('ENTREPRISE_MEMBRE',$data);
        }

        public function compterEntreprise(){
         return $this->db->count_all('ENTREPRISE_MEMBRE');

        }
    }