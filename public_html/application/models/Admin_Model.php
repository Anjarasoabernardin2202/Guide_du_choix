<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {
    private $ID_ADMIN;
    private $NOM_ADMIN;
    private $AGE_ADMIN;
    private $MAIL_ADMIN;
    private $MDP_ADMIN;
    private $POSTE_ADMIN;

    public function setId($ID_ADMIN){
        $this->ID_ADMIN = $ID_ADMIN;
    }
    public function setNom($NOM_ADMIN){
        $this->NOM_ADMIN = $NOM_ADMIN;
    }
    public function setAge($AGE_ADMIN){
        $this->AGE_ADMIN = $AGE_ADMIN;
    }
    public function setMail($MAIL_ADMIN){
        $this->MAIL_ADMIN = $MAIL_ADMIN;
    }
    public function setMdp($MDP_ADMIN){
        $this->MDP_ADMIN = $MDP_ADMIN;
    }
    public function setPoste($POSTE_ADMIN){
        $this->POSTE_ADMIN = $POSTE_ADMIN;
    }

    public function getId(){
        return $this->ID_ADMIN;
    }
    public function getNom(){
        return $this->NOM_ADMIN;
    }
    public function getAge(){
        return $this->AGE_ADMIN;
    }
    public function getMail(){
        return $this->MAIL_ADMIN;
    }
    public function getMdp(){
        return $this->MDP_ADMIN;
    }
    public function getPoste(){
        return $this->POSTE_ADMIN;
    }


    public function insert_Admin($nom,$age,$poste,$email,$mdp){
        //$mdp = $nom.'!'.$age.'Ad'.$poste;
        $motdepasse = sha1($mdp);
        $this->db->select('*');
        $this->db->from('ADMINISTRATEUR');
        $this->db->where('NOM_ADMIN',$nom);
        $this->db->where('AGE_ADMIN',$age);
        $this->db->where('POSTE_ADMIN',$poste);
        $this->db->where('MAIL_ADMIN',$email);
        $query = $this->db->get();
        if($query->num_rows()==0){
            $this->db->set('NOM_ADMIN',$nom);
            $this->db->set('AGE_ADMIN',$age);
            $this->db->set('POSTE_ADMIN',$poste);
            $this->db->set('MAIL_ADMIN',$email);
            $this->db->set('MDP_ADMIN',$motdepasse);
            $this->db->insert('ADMINISTRATEUR');
            if($this->db->affected_rows() > 0){
                echo 'Successful';
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function login($email,$mdp){
        $motdepasse = sha1($mdp);
        $this->db->select('*');
        $this->db->from('ADMINISTRATEUR');
        $this->db->where('MAIL_ADMIN',$email);
        $this->db->where('MDP_ADMIN',$motdepasse);
        $this->db->limit(1);
        $login = $this->db->get();
        if($login->num_rows()==1){
            return true;
        }
        else{
            //var_dump($motdepasse);
            return false;
        }
        
    }

    public function getProfil($email){
        $this->db->select('*');
        $this->db->from('ADMINISTRATEUR');
        $this->db->where('MAIL_ADMIN',$email);
        $this->db->limit(1);
        $profil = $this->db->get();
        $data = array();
        foreach($profil->result_array() as $row){
            $data['ID_ADMIN'] = $row['ID_ADMIN'];
            $data['NOM_ADMIN'] = $row['NOM_ADMIN'];
            $data['AGE_ADMIN'] =$row['AGE_ADMIN'];
            $data['MAIL_ADMIN'] = $row['MAIL_ADMIN'];
            $data['POSTE_ADMIN'] = $row['POSTE_ADMIN'];
        }
        return $data;
    }

    public function compteradmin(){
        return $this->db->count_all('ADMINISTRATEUR');
    }

    public function listeadmin($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('ADMINISTRATEUR');
        return $liste->result();
    }

    public function singleadmin($id){
        $this->db->where('ID_ADMIN',$id);
        $single = $this->db->get('ADMINISTRATEUR');
        return $single->result();
    }

    public function updateadmin($id){
        $data = array(
            'NOM_ADMIN' => $this->getNom(),
            'AGE_ADMIN' => $this->getAge(),
            'MAIL_ADMIN' => $this->getMail(),
            'POSTE_ADMIN' => $this->getPoste()
        );
        $this->db->where('ID_ADMIN',$id);
        return $this->db->update('ADMINISTRATEUR',$data);
    }
    
    public function updateprofil($id){
        $data = array(
            'NOM_ADMIN' => $this->getNom(),
            'AGE_ADMIN' => $this->getAge(),
            'MAIL_ADMIN' => $this->getMail(),
            'MDP_ADMIN' => sha1($this->getMdp())
        );
        $this->db->where('ID_ADMIN',$id);
        var_dump($data);
        return $this->db->update('ADMINISTRATEUR',$data);
    }
    
    public function deleteadmin($id){
        $this->db->where('ID_ADMIN',$id);
        return $this->db->delete('ADMINISTRATEUR');
    }

    public function getPosteAdmin($email){
        $this->db->select('POSTE_ADMIN');
        $this->db->from('ADMINISTRATEUR');
        $this->db->where('MAIL_ADMIN',$email);
        $poste = $this->db->get();
        return $poste->row()->POSTE_ADMIN;
    }
    
}
