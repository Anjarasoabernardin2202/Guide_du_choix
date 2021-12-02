<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_Model extends CI_Model {
    private $ID_APROPOS;
    private $IMAGE_APROPOS;
    private $QUESTION_APROPOS;
    private $REPONSE_APROPOS;
    private $WITHAUDIO;
    private $AUDIO_APROPOS; 

    
    public function  setId($ID_APROPOS){
        $this->ID_APROPOS = $ID_APROPOS;
    }
    public function  setImage($IMAGE_APROPOS){
        $this->IMAGE_APROPOS = $IMAGE_APROPOS;
    }
    public function  setQuestion($QUESTION_APROPOS){
        $this->QUESTION_APROPOS = $QUESTION_APROPOS;
    }
    public function  setReponse($REPONSE_APROPOS){
        $this->REPONSE_APROPOS = $REPONSE_APROPOS;
    }
    public function  setWithAudio($WITHAUDIO){
        $this->WITHAUDIO = $WITHAUDIO;
    }
    public function  setAudio($AUDIO_APROPOS){
        $this->AUDIO_APROPOS = $AUDIO_APROPOS;
    }


    public function  getId(){
        return $this->ID_APROPOS;
    }
    public function getImage(){
        return $this->IMAGE_APROPOS;
    }
    public function  getQuestion(){
        return $this->QUESTION_APROPOS;
    }
    public function  getReponse(){
        return $this->REPONSE_APROPOS;
    }
    public function  getWithAudio(){
        return $this->WITHAUDIO;
    }
    public function  getAudio(){
        return $this->AUDIO_APROPOS;
    }

 

    public function listeabout(){
        
        $liste = $this->db->get('ABOUT');
        return $liste->result();
    }

    
  

 
}
