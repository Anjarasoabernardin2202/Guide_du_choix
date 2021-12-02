<?php if ( ! defined('BASEPATH') ) exit('No direct script acces allowed');

class Article_Model extends CI_Model{
    private $ID_ARTICLE;
    private $ID_CHAPITRE;
    private $IMAGE_ARTICLE;
    private $TITRE_ARTICLE;
    private $CONTENU_ARTICLE;
    private $NUMERO_ARTICLE;
    private $CONTENU_ARTICLE_SMARTPHONE;

    public function getId(){
        return $this->ID_ARTICLE;
    }
    public function getIdChapitre(){
        return $this->ID_CHAPITRE;
    }
    public function getImage(){
        return $this->IMAGE_ARTICLE;
    }
    public function getTitre(){
        return $this->TITRE_ARTICLE;
    }
    public function getContenu(){
        return $this->CONTENU_ARTICLE;
    }
    public function getContenuSmartphone(){
        return $this->CONTENU_ARTICLE_SMARTPHONE;
    }
    public function getNumero(){
        return $this->NUMERO_ARTICLE;
    }


    public function setId($ID_ARTICLE){
        $this->ID_ARTICLE = $ID_ARTICLE;
    }
    public function setIdChapitre($ID_CHAPITRE){
        $this->ID_CHAPITRE = $ID_CHAPITRE;
    }
    public function setImage($IMAGE_ARTICLE){
        $this->IMAGE_ARTICLE = $IMAGE_ARTICLE;
    }
    public function setTitre($TITRE_ARTICLE){
        $this->TITRE_ARTICLE = $TITRE_ARTICLE;
    }
    public function setContenu($CONTENU_ARTICLE){
        $this->CONTENU_ARTICLE = $CONTENU_ARTICLE;
    }
    public function setContenuSmartphone($CONTENU_ARTICLE_SMARTPHONE){
        $this->CONTENU_ARTICLE_SMARTPHONE = $CONTENU_ARTICLE_SMARTPHONE;
    }
    public function setNumero($NUMERO_ARTICLE){
        $this->NUMERO_ARTICLE = $NUMERO_ARTICLE;
    }

    public function getArticle($id_chapitre){
        $query=$this->db->query("SELECT * FROM ARTICLE WHERE ID_CHAPITRE=".$id_chapitre);
        $result = $query->result_array();
        return $result;
    }

    public function getChapitre($id){
        $this->db->select('ID_CHAPITRE');
        $this->db->from('ARTICLE');
        $this->db->where('ID_ARTICLE',$id);
        $chapitre = $this->db->get();
        return $chapitre->row()->ID_CHAPITRE;
    }

    public function getSection($idchapitre){
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $section = $this->db->get('ARTICLE');
        return $section->result_array();
    }

    public function listeArticles($limite,$debut){
        $this->db->limit($limite,$debut);
        $liste = $this->db->get('ARTICLECHAPITRE');
        return $liste->result();
    }
    
    public function updateArticle($id){
        $data = array(
            'ID_CHAPITRE' => $this->getIdChapitre(),
            'IMAGE_ARTICLE' => $this->getImage(),
            'TITRE_ARTICLE' => $this->getTitre(),
            'CONTENU_ARTICLE' => $this->getContenu(),
            'CONTENU_ARTICLE_SMARTPHONE' => $this->getContenuSmartphone(),
            'NUMERO_ARTICLE' => $this->getNumero()
        );
        $this->db->where('ID_ARTICLE',$id);
        $this->db->update('ARTICLE',$data);
    }

    public function deleteArticle($id){
        $this->db->where('ID_ARTICLE',$id);
        return $this->db->delete('ARTICLE');
    }

    public function insertArticle(){
        $data = array(
            'ID_ARTICLE' => $this->getId(),
            'ID_CHAPITRE' => $this->getIdChapitre(),
            'IMAGE_ARTICLE' => $this->getImage(),
            'TITRE_ARTICLE' => $this->getTitre(),
            'CONTENU_ARTICLE' => $this->getContenu(),
            'CONTENU_ARTICLE_SMARTPHONE' => $this->getContenuSmartphone(),
            'NUMERO_ARTICLE' => $this->getNumero()
        );
        $this->db->insert('ARTICLE',$data);
        return $this->db->insert_id();
    }

    public function singleArticle($id){
        $this->db->where('ID_ARTICLE',$id);
        $single= $this->db->get('ARTICLE');
        return $single->result();
    }

    public function compterArticle(){
        return $this->db->count_all('ARTICLE');
    }



    public function getChapitreByArticle($idchapitre){
        $this->db->select('NUMERO_ARTICLE');
        $this->db->from('ARTICLE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $article = $this->db->get();
        return $article->result();
    }

    public function getDoublon($idchapitre,$image,$titre,$contenu,$smartphone,$numero){
        $this->db->select('ID_ARTICLE');
        $this->db->from('ARTICLE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $this->db->where('IMAGE_ARTICLE',$image);
        $this->db->where('TITRE_ARTICLE',$titre);
        $this->db->where('CONTENU_ARTICLE',$contenu);
        $this->db->where('CONTENU_ARTICLE_SMARTPHONE',$smartphone);
        $this->db->where('NUMERO_ARTICLE',$numero);
        $single= $this->db->get();
        return $single->result();
    }

    public function gestionErreur($idchapitre,$image,$titre,$contenu,$smartphone,$numero){
        $erreurs = array();
        $id = $this->getDoublon($idchapitre,$image,$titre,$contenu,$smartphone,$numero);
        // $num1 = array();
        
        
        //$num1 = $this->getChapitreByArticle($idchapitre);
        if($idchapitre==0 || $idchapitre == null){
            $erreurs[0] = 'Vous devez selectionner un paragraphe';
        }
        if($titre == null || empty($titre) || !isset($titre)){
            $erreurs[1] = 'Titre obligatoire';
        }
        // foreach($num1 as $n1){
        //     if(in_array($numero,$n1)){
        //         $erreurs[2] = 'Le numéro est déjà associé à un sous paragraphe';
        //     }
        // }
        if($id != null){
            $erreurs[3] = 'Vous ne pouvez pas inserer des donnees qui existent deja';
        }
        return $erreurs;
    }

    public function getArticleByChapitre($id){
        $this->db->select('ID_ARTICLE');
        $this->db->from('ARTICLE');
        $this->db->where('ID_CHAPITRE',$id);
        $chapitre = $this->db->get();
        return $chapitre->result();
    }
}