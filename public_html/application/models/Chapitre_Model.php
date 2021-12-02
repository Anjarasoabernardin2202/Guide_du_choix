<?php if ( ! defined('BASEPATH') ) exit('No direct script acces allowed');

class Chapitre_Model extends CI_Model{
    private $ID_CHAPITRE;
    private $CHA_ID_CHAPITRE;
    private $ID_GUIDE;
    private $IMAGE_CHAPITRE;
    private $IMAGE_CHAPITRE2;
    private $TYPE_CHAPITRE;
    private $NOM_CHAPITRE;
    private $NUMERO_CHAPITRE;
    private $INTRODUCTION_CHAPITRE;
    private $INTRODUCTION_CHAPITRE_SMARTPHONE;


    public function setId($ID_CHAPITRE){
        $this->ID_CHAPITRE = $ID_CHAPITRE;
    }
    public function setIdChapitre($CHA_ID_CHAPITRE){
        $this->CHA_ID_CHAPITRE = $CHA_ID_CHAPITRE;
    }
    public function setIdGuide($ID_GUIDE){
            $this->ID_GUIDE = $ID_GUIDE;
    }
    public function setImage($IMAGE_CHAPITRE){
        $this->IMAGE_CHAPITRE = $IMAGE_CHAPITRE;
    }
    public function setImage2($IMAGE_CHAPITRE2){
        $this->IMAGE_CHAPITRE2 = $IMAGE_CHAPITRE2;
    }
    public function setNom($NOM_CHAPITRE){
        $this->NOM_CHAPITRE = $NOM_CHAPITRE;
    }
    public function setType($TYPE_CHAPITRE){
        $this->TYPE_CHAPITRE = $TYPE_CHAPITRE;
    }
    public function setNumero($NUMERO_CHAPITRE){
        $this->NUMERO_CHAPITRE = $NUMERO_CHAPITRE;
    }
    public function setIntroduction($INTRODUCTION_CHAPITRE){
        $this->INTRODUCTION_CHAPITRE = $INTRODUCTION_CHAPITRE;
    }
    public function setIntroductionSmartphone($INTRODUCTION_CHAPITRE_SMARTPHONE){
        $this->INTRODUCTION_CHAPITRE_SMARTPHONE = $INTRODUCTION_CHAPITRE_SMARTPHONE;
    }

    public function getId(){
        return $this->ID_CHAPITRE;
    }
    public function getIdChapitre(){
        return $this->CHA_ID_CHAPITRE;
    }
    public function getIdGuide(){
        return $this->ID_GUIDE;
    }
    public function getImage(){
        return $this->IMAGE_CHAPITRE;
    }
    public function getImage2(){
        return $this->IMAGE_CHAPITRE2;
    }
    public function getType(){
        return $this->TYPE_CHAPITRE;
    }
    public function getNom(){
        return $this->NOM_CHAPITRE;
    }
    public function getNumero(){
        return $this->NUMERO_CHAPITRE;
    }
    public function getIntroduction(){
        return $this->INTRODUCTION_CHAPITRE;
    }
    public function getIntroductionSmartphone(){
        return $this->INTRODUCTION_CHAPITRE_SMARTPHONE;
    }    

    public function getChapter($limite,$debut){
        $this->db->limit($limite,$debut);
        $query = $this->db->get('CHAPITREGUIDE');
        return $query->result();
    }

    public function getSousChapitreById($id){
        $this->db->select('ID_SOUSCHAPITRE');
        $this->db->from('CHAPITRESOUSCHAPITRE');
        $this->db->where('ID_CHAPITRE',$id);
        $schapitre = $this->db->get();
        return $schapitre->row()->ID_SOUSCHAPITRE;
    }

    public function getListeChapitre(){
        $this->db->where('CHA_ID_CHAPITRE',NULL);
        $query = $this->db->get('CHAPITRE');
        return $query->result();
    }

    public function getParagraphes($limite,$debut){
        $this->db->where('IMAGE_SOUSCHAPITRE is NOT NULL');
        $this->db->limit($limite,$debut);
        $query = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $query->result();
    }

    public function getListeParagraphes(){
        $this->db->where('IMAGE_SOUSCHAPITRE is NOT NULL');
        $query = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $query->result();
    }

    public function compterSousGuide($idchapitre){
        $sql = "SELECT ID_SOUSCHAPITRE FROM CHAPITRESOUSCHAPITRE WHERE IMAGE_CHAPITRE is null and ID_CHAPITRE = ".$idchapitre;
        $query = $this->db->query($sql);
       // var_dump($sql);
        return $query->result_array();
    }

    public function compterChapitreByGuide($idguide){
        $sql = "SELECT ID_CHAPITRE FROM CHAPITRE WHERE CHA_ID_CHAPITRE is null and  ID_GUIDE = ".$idguide;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function findIdByParagraphe($nomsouschapitre){
        $this->db->select('ID_SOUSCHAPITRE');
        $this->db->from('CHAPITRESOUSCHAPITRE');
        $this->db->where('NOM_SOUSCHAPITRE',$nomsouschapitre);
        $liste = $this->db->get();
        return $liste->row()->ID_SOUSCHAPITRE;
    }

    public function listeChapitres($idguide){
        $this->db->where('ID_GUIDE',$idguide);
        $query=$this->db->get('CHAPITRESOUSCHAPITRE');
        return $query->result();
    }

    public function getSousChapitre($idchapitre){
        $this->db->where('CHA_ID_CHAPITRE',$idchapitre);
        $liste = $this->db->get('CHAPITRE');
        return $liste->result();
    }

    public function getListeSubChapter(){
        $this->db->where('IMAGE_SOUSCHAPITRE',NULL);
        $liste = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $liste->result();
    }

    public function getChapitreByArticleEtape($idchapitre){
        $sql = "select ARTICLE.NUMERO_ARTICLE,
                ETAPE.NUMERO_ETAPE,
                CHAPITRE.ID_CHAPITRE 
                from CHAPITRE 
                join ARTICLE 
                on CHAPITRE.ID_CHAPITRE = ARTICLE.ID_CHAPITRE 
                join ETAPE
                on ETAPE.ID_CHAPITRE = CHAPITRE.ID_CHAPITRE 
                where CHAPITRE.ID_CHAPITRE = ".$idchapitre;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getChapitreByArticle($idchapitre){
        $this->db->select('NUMERO_ARTICLE');
        $this->db->from('ARTICLE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $article = $this->db->get();
        return $article->result();
    }
    
    public function getIdChapitreSousChapitre($idguide){
        $sql = "SELECT * FROM CHAPITRESOUSCHAPITRE WHERE NUMERO_SOUS_CHAPITRE=1 AND ID_GUIDE=".$idguide." limit 1";
        $query = $this->db->query($sql);
        return $query->result();
        
    }

    public function getIdChapitreChapitre($idguide){
        $sql = "SELECT ID_CHAPITRE FROM CHAPITRE WHERE CHA_ID_CHAPITRE is NULL and NUMERO_CHAPITRE=1 and ID_GUIDE=".$idguide;
        $query = $this->db->query($sql);
        //var_dump($sql);
        if($query->num_rows()==0){
            return 0;
        }
        return $query->row()->ID_CHAPITRE;
    }

    public function hasSubChapter($idchapitre){
        $this->db->where('CHA_ID_CHAPITRE',$idchapitre);
        $ll = $this->db->get('CHAPITRE');
        return $ll->result();
    }
    public function getSubChapter($limite,$debut){
        $this->db->limit($limite,$debut);
        $this->db->where('IMAGE_SOUSCHAPITRE',NULL);
        $liste = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $liste->result();
    }

    public function getSingle($idguide,$numero,$numeroschapitre){
            $query=$this->db->query(
                'SELECT * FROM `CHAPITRESOUSCHAPITRE` 
                WHERE ID_GUIDE='.$idguide.
                ' AND NUMERO_CHAPITRE='.$numero.
                ' AND NUMERO_SOUS_CHAPITRE='.$numeroschapitre.' limit 1'
            );
            return $query->result();
    }

    public function getSingleByChapitre($idchapitre){
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $single = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $single->result();
    }

    public function getIdSchapitre($idchapitre){
        $this->db->select('ID_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('CHA_ID_CHAPITRE',$idchapitre);
        $this->db->group_by('NUMERO_CHAPITRE','asc');
        $this->db->limit(1);
        $id = $this->db->get();
        if($id->num_rows() == 0 ){
            return 0;
        }
        return $id->row()->ID_CHAPITRE;
    }

    public function getSingleByChapitre1($idchapitre){
        $chapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE ID_CHAPITRE = ".$idchapitre);
        $result = $chapitre->result_array();
        foreach($result as $key=>$value){
            if($value['CHA_ID_CHAPITRE'] != null){
                $parent = $this->db->query("SELECT * FROM CHAPITRE WHERE  ID_CHAPITRE = ".$value['CHA_ID_CHAPITRE']);
                $result[$key]['PARENT']  = $parent->result_array();
            }
         
            $souschapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE  CHA_ID_CHAPITRE = ".$value['ID_CHAPITRE']);
            $result[$key]['SOUS_CHAPITRE']  = $souschapitre->result_array();
            $article = $this->db->query('SELECT * FROM ARTICLE WHERE ID_CHAPITRE ='.$value['ID_CHAPITRE']);
            $result[$key]['ARTICLE']  = $article->result_array();
            foreach($result[$key]['SOUS_CHAPITRE']as $cle=>$valeur){
                $contenu = $this->db->query('SELECT * FROM ARTICLE WHERE ID_CHAPITRE = '.$valeur['ID_CHAPITRE']);
                $result[$key]['SOUS_CHAPITRE'][$cle]['CONTENU'] = $contenu->result_array();
                $schapitre = $this->db->query('SELECT * FROM CHAPITRE WHERE CHA_ID_CHAPITRE = '.$valeur['ID_CHAPITRE']);
                $result[$key]['SOUS_CHAPITRE'][$cle]['SOUS_SOUSCHAPITRE'] = $schapitre->result_array();
            }
        }
        //var_dump($result);
        return $result;
    }

    public function getParent($idchapitre){
        $this->db->select('ID_CHAPITRE');
        $this->db->where('ID_SOUSCHAPITRE',$idchapitre);
        $id = $this->db->get('CHAPITRESOUSCHAPITRE');
        if($id->num_rows() == 0){
            return null;
        }
        return $id->row()->ID_CHAPITRE;
    }

    public function getGuide($idparent){
        $this->db->select('ID_GUIDE');
        $this->db->from('CHAPITRE');    
        $this->db->where('ID_CHAPITRE',$idparent);
        $id = $this->db->get();
        return $id->row()->ID_GUIDE;
    }

    public function getNOMSOUSCHAPITRE($idguide,$numero,$numeroschapitre){
        $sql = 'SELECT NOM_SOUSCHAPITRE FROM `CHAPITRESOUSCHAPITRE` 
                WHERE ID_GUIDE='.$idguide.
                ' AND NUMERO_CHAPITRE='.$numero.
                ' AND NUMERO_SOUS_CHAPITRE='.$numeroschapitre;
        $nom = $this->db->query($sql);
       //var_dump($sql);
        if($nom->row()){
            return $nom->row()->NOM_SOUSCHAPITRE;
        }
        else{
            return "N'existe pas";
        }
    }

    public function getNOMCHAPITRE($idguide,$numero,$numeroschapitre){
        $sql = 'SELECT NOM_CHAPITRE FROM `CHAPITRESOUSCHAPITRE` 
                WHERE ID_GUIDE='.$idguide.
                ' AND NUMERO_CHAPITRE='.$numero.
                ' AND NUMERO_SOUS_CHAPITRE='.$numeroschapitre;
        $nom = $this->db->query($sql);
       // var_dump($sql);
        if($nom->row()){
            return $nom->row()->NOM_CHAPITRE;
        }
        else{
            return "N'existe pas";
        }
    }

    public function compterQuestion($nomsouschapitre){
        $query = $this->db->query('SELECT count(*) as nombre FROM CHAPITRESOUSCHAPITRE WHERE NOM_CHAPITRE="'.$nomsouschapitre.'"');
        return $query->row()->nombre;
    }

    public function compterArticle(){
        $query = $this->db->query('SELECT count(*) as nombre FROM CHAPITRE WHERE TYPE_CHAPITRE="article"');
        return $query->row()->nombre;
    }

    public function getQuestions($nomsouschapitre){
        //$this->db->limit($limite,$debut);
        $this->db->where('NOM_CHAPITRE',$nomsouschapitre);
        $this->db->group_by('NUMERO_SOUS_CHAPITRE');
        $question = $this->db->get('CHAPITRESOUSCHAPITRE');
        return $question->result();
    }

    public function getChapitre($idguide){
        $chapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE TYPE_CHAPITRE='essentiel' AND ID_GUIDE = ".$idguide." AND CHA_ID_CHAPITRE is NULL group by NUMERO_CHAPITRE");
        $result = $chapitre->result_array();
        foreach($result as $key=>$value){
            $souschapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE  CHA_ID_CHAPITRE = ".$value['ID_CHAPITRE']." group by NUMERO_CHAPITRE");
            $result[$key]['SOUS_CHAPITRE']  = $souschapitre->result_array();
            
            foreach($result[$key]['SOUS_CHAPITRE']as $cle=>$valeur){
                $contenu = $this->db->query('SELECT * FROM CHAPITRESOUSCHAPITRE WHERE NOM_CHAPITRE = "'.$valeur['NOM_CHAPITRE'].'" group by NUMERO_CHAPITRE');
                $result[$key]['SOUS_CHAPITRE'][$cle]['CONTENU'] = $contenu->result_array();
            }
        }
        return $result;
    }

    
    public function getPoints($idguide){
        $chapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE TYPE_CHAPITRE='point' AND ID_GUIDE = ".$idguide." AND CHA_ID_CHAPITRE is NULL group by NUMERO_CHAPITRE");
        $result = $chapitre->result_array();
        foreach($result as $key=>$value){
            $souschapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE  CHA_ID_CHAPITRE = ".$value['ID_CHAPITRE']." group by NUMERO_CHAPITRE");
            $result[$key]['SOUS_CHAPITRE']  = $souschapitre->result_array();
            
            foreach($result[$key]['SOUS_CHAPITRE']as $cle=>$valeur){
                $contenu = $this->db->query('SELECT * FROM CHAPITRESOUSCHAPITRE WHERE NOM_CHAPITRE = "'.$valeur['NOM_CHAPITRE'].'" group by NUMERO_CHAPITRE');
                $result[$key]['SOUS_CHAPITRE'][$cle]['CONTENU'] = $contenu->result_array();
            }
        }
        return $result;
    }

    public function getArticle($idguide){
        $chapitre = $this->db->query("SELECT * FROM CHAPITRE WHERE ID_GUIDE = ".$idguide." AND TYPE_CHAPITRE='article' group by NUMERO_CHAPITRE");
        $result = $chapitre->result_array();
        return $result;
    }
    
    public function getSingleSousChapitre($idchapitre){
        $intro = $this->db->query("SELECT * FROM CHAPITRESOUSCHAPITRE WHERE ID_SOUSCHAPITRE = ".$idchapitre);
        return $intro->result();
    }

    public function compterResultatRecherche($mot){
        $count = $this->db->query("SELECT COUNT(NOM_CHAPITRE) as nbchapitre FROM CHAPITRE WHERE NOM_CHAPITRE like '%".$mot."%' OR INTRODUCTION_CHAPITRE like '%".$mot."%' ");
        return $count->row()->nbchapitre;
    }

    public function compterChapitre(){
        $query = $this->db->query('SELECT count(*) as nombre FROM CHAPITRE WHERE CHA_ID_CHAPITRE is NULL');
        return $query->row()->nombre;
    }

    public function compter(){
        return $this->db->count_all('CHAPITRESOUSCHAPITRE');
    }

    public function compterSChapitre(){
        $query = $this->db->query('SELECT count(*) as nombre FROM CHAPITRE WHERE CHA_ID_CHAPITRE is NOT NULL AND IMAGE_CHAPITRE is NULL ');
        return $query->row()->nombre;
    }

    public function compterParagraphe(){
        $query = $this->db->query('SELECT count(*) as nombre FROM CHAPITRE WHERE CHA_ID_CHAPITRE is NOT NULL AND IMAGE_CHAPITRE is NOT NULL ');
        return $query->row()->nombre;
    }

    public function findGuideById($idchapitre){
        $this->db->select('ID_GUIDE');
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $chapitre = $this->db->get();
        return $chapitre->row()->ID_GUIDE;
    }

    public function findChapitreByGuide($idguide){
        $this->db->select('ID_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('ID_GUIDE',$idguide);
        $guide = $this->db->get();
        return $guide->row()->ID_CHAPITRE;
    }

    public function findIdByName($nomchapitre){
        $this->db->select('ID_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('NOM_CHAPITRE',$nomchapitre);
        $chapitre = $this->db->get();
        return $chapitre->row()->ID_CHAPITRE;
    }

    public function findNameById($idchapitre){
        $this->db->select('NOM_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $chapitre = $this->db->get();
        return $chapitre->row()->NOM_CHAPITRE;
    }
    
    public function createChapitre(){
        $data = array(
            'CHA_ID_CHAPITRE' => $this->getIdChapitre(),
            'ID_GUIDE'=> $this->getIdGuide(),
            'IMAGE_CHAPITRE'=> $this->getImage(),
            'IMAGE_CHAPITRE2'=> $this->getImage2(),
            'TYPE_CHAPITRE' => $this->getType(),
            'NOM_CHAPITRE'=> $this->getNom(),
            'NUMERO_CHAPITRE'=> $this->getNumero(),
            'INTRODUCTION_CHAPITRE'=> $this->getIntroduction(),
            'INTRODUCTION_CHAPITRE_SMARTPHONE' => $this->getIntroductionSmartphone()
        );
        $this->db->insert('CHAPITRE',$data);
        return $this->db->insert_id();
    }

    public function updateChapitre($id){
        $data = array(
            'CHA_ID_CHAPITRE' =>$this->getIdChapitre(),
            'ID_GUIDE'=>$this->getIdGuide(),
            'IMAGE_CHAPITRE'=>$this->getImage(),
            'IMAGE_CHAPITRE2'=>$this->getImage2(),
            'TYPE_CHAPITRE' => $this->getType(),
            'NOM_CHAPITRE'=>$this->getNom(),
            'NUMERO_CHAPITRE'=>$this->getNumero(),
            'INTRODUCTION_CHAPITRE'=>$this->getIntroduction(),
            'INTRODUCTION_CHAPITRE_SMARTPHONE' => $this->getIntroductionSmartphone()
        );
        $this->db->where('ID_CHAPITRE',$id);
        $this->db->update('CHAPITRE',$data);
    }

    public function deleteChapitre($id){
        $this->db->where('ID_CHAPITRE',$id);
        return $this->db->delete('CHAPITRE');
    }

    public function singleChapitre($id){
        $this->db->where('ID_CHAPITRE',$id);
        $single= $this->db->get('CHAPITRE');
        return $single->result();
    }

    public function getDoublon($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone){
        $this->db->select('ID_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('CHA_ID_CHAPITRE',$idparent);
        $this->db->where('ID_GUIDE',$idguide);
        $this->db->where('IMAGE_CHAPITRE',$image);
        $this->db->where('IMAGE_CHAPITRE2',$image2);
        $this->db->where('TYPE_CHAPITRE',$type);
        $this->db->where('NOM_CHAPITRE',$nom);
        $this->db->where('NUMERO_CHAPITRE',$numero);
        $this->db->where('INTRODUCTION_CHAPITRE',$introduction);
        $this->db->where('INTRODUCTION_CHAPITRE_SMARTPHONE',$smartphone);
        $single= $this->db->get();
        return $single->result();
    }

    public function getTypeByChapitre($idchapitre){
        $this->db->select('TYPE_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$idchapitre);
        $chapitre = $this->db->get();
        return $chapitre->row()->TYPE_CHAPITRE;
    }

    public function getNumeroByGuide($idguide){
        $this->db->select('NUMERO_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('ID_GUIDE',$idguide);
        $this->db->where('CHA_ID_CHAPITRE',NULL);
        $numero = $this->db->get();
        return  $numero->result_array();
    }

    public function getNumeroByChapitre($idparent){
        $this->db->select('NUMERO_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('CHA_ID_CHAPITRE',$idparent);
        $this->db->where('IMAGE_CHAPITRE',NULL);
        $numero = $this->db->get();
        return  $numero->result_array();
    }

    public function getNumeroBySChapitre($idparent){
        $this->db->select('NUMERO_CHAPITRE');
        $this->db->from('CHAPITRE');
        $this->db->where('CHA_ID_CHAPITRE',$idparent);
        $this->db->where('IMAGE_CHAPITRE is not NULL');
        $numero = $this->db->get();
        return  $numero->result_array();
    }

    public function getChapitreBySChapitre($id){
        $this->db->select('CHA_ID_CHAPITRE',$id);
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$id);
        $chapitre = $this->db->get();
        return $chapitre->row()->CHA_ID_CHAPITRE;
    }

    public function getNomChapitreById($id){
        $this->db->select('NOM_CHAPITRE',$id);
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$id);
        $chapitre = $this->db->get();
        return $chapitre->row()->NOM_CHAPITRE;
    }

    public function getGuideById($id){
        $this->db->select('ID_GUIDE',$id);
        $this->db->from('CHAPITRE');
        $this->db->where('ID_CHAPITRE',$id);
        $guide = $this->db->get();
        return $guide->row()->ID_GUIDE;
    }

    public function findSChapitreById($id){
        $this->db->select('ID_SOUSCHAPITRE');
        $this->db->from('CHAPITRESOUSCHAPITRE');
        $this->db->where('ID_CHAPITRE',$id);
        $schapitre = $this->db->get();
        return $schapitre->result();
    }

    public function gestionErreurChapitre($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone){
        $erreurs = array();
        $doublon = $this->getDoublon($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone);
       // $num = $this->getNumeroByGuide($idguide);
        if(!isset($idguide) || empty($idguide) || $idguide==null){
            $erreurs[0] = 'Vous devez sélectionner un guide';
        }
        if(!isset($type) || empty($type) || $type==null){
            $erreurs[5] = 'Vous devez sélectionner un type';
        }
        if(!isset($nom) || empty($nom) || $nom==null){
            $erreurs[1] = 'Titre obligatoire';
        }
        if(!isset($numero) || empty($numero) || $numero==null){
            $erreurs[2] = 'Vous devez sélectionner un numéro';
        }
        // foreach($num as $n){
        //     if(in_array($numero,$n)){
        //         $erreurs[4] = 'Le numéro est déjà associé à un chapitre';
        //     }
        // }
        if($doublon != null){
            $erreurs[3] = 'Vous ne pouvez pas insérer des donneés qui existent deja';
        }
        return $erreurs;
    }

    public function gestionErreurSousChapitre($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone){
        $erreurs = array();
        $doublon = $this->getDoublon($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone);
        $num = $this->getNumeroByChapitre($idparent);
        if(!isset($nom) || empty($nom) || $nom==null){
            $erreurs[1] = 'Nom obligatoire';
        }
        if(!isset($numero) || empty($numero) || $numero==null){
            $erreurs[2] = 'Vous devez sélectionner un numero';
        }
        if(!isset($idparent) || empty($idparent) || $idparent==null){
            $erreurs[3] = 'Vous devez sélectionner un chapitre';
        }
        foreach($num as $n){
            if(in_array($numero,$n)){
                $erreurs[5] = 'Le numéro est déjà associé à un sous-chapitre';
            }
        }
        if($doublon != null){
            $erreurs[4] = 'Vous ne pouvez pas insérer des données qui existent deja';
        }
        return $erreurs;
    }

    public function gestionErreurParagraphe($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone){
        $erreurs = array();
        $doublon = $this->getDoublon($idparent,$idguide,$image,$image2,$nom,$type,$numero,$introduction,$smartphone);
        //$num = $this->getNumeroBySChapitre($idparent);
        if(!isset($nom) || empty($nom) || $nom==null){
            $erreurs[1] = 'Titre obligatoire';
        }
        if(!isset($numero) || empty($numero) || $numero==null){
            $erreurs[2] = 'Vous devez sélectionner un numero';
        }
        // foreach($num as $n){
        //     if(in_array($numero,$n)){
        //         $erreurs[6] = 'Le numéro est déjà associé à un sous-chapitre';
        //     }
        // }
        if(!isset($idparent) || empty($idparent) || $idparent==null){
            $erreurs[3] = 'Vous devez sélectionner un sous chapitre';
        }
        if($doublon != null){
            $erreurs[5] = 'Vous ne pouvez pas insérer des données qui existent deja';
        }
        return $erreurs;
    }
}