<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recherche_Model extends CI_Model {
    public function recherche($mot){
        $query = " SELECT ID_PAYS,IMAGE_DRAPEAU,NOM_PAYS,INTRODUCTION_PAYS,'pays' FROM PAYS WHERE NOM_PAYS like '%".$mot."%' OR INTRODUCTION_PAYS like '%".$mot."%'
                    union
                    SELECT ID_RUBRIQUE,IMAGE_RUBRIQUE,NOM_RUBRIQUE,DESCRIPTION_RUBRIQUE,'rubrique' FROM RUBRIQUE WHERE NOM_RUBRIQUE like '%".$mot."%' OR DESCRIPTION_RUBRIQUE like '%".$mot."%'
                    union
                    SELECT ID_GUIDE,IMAGE_GUIDE,NOM_GUIDE,DESCRIPTION_GUIDE,'guide' FROM GUIDE WHERE NOM_GUIDE like '%".$mot."%' OR DESCRIPTION_GUIDE like '%".$mot."%'
                ";
        $resultat = $this->db->query($query);
        $data = array();
        $i=0;
        foreach ($resultat->result_array() as $row) {
            $data[$i]['id'] = $row['ID_PAYS'];
            $data[$i]['image'] = $row['IMAGE_DRAPEAU'];
            $data[$i]['nom'] = $row['NOM_PAYS'];
            $data[$i]['description'] = $row['INTRODUCTION_PAYS'];
            $data[$i]['type'] = $row['pays'];
            $i++;
        }
        $this->db->close();
        return $data; 
    }

    // public function countrecherche($mot){
    //     $query = " SELECT count(INTRODUCTION_PAYS) as nbpays,'pays' FROM PAYS WHERE NOM_PAYS like '%".$mot."%' OR INTRODUCTION_PAYS like '%".$mot."%'
    //                 union
    //                 SELECT count(DESCRIPTION_RUBRIQUE) as nbrubrique,'rubrique' FROM RUBRIQUE WHERE NOM_RUBRIQUE like '%".$mot."%' OR DESCRIPTION_RUBRIQUE like '%".$mot."%'
    //                 union
    //                 SELECT count(DESCRIPTION_GUIDE) as nbguide,'guide' FROM GUIDE WHERE NOM_GUIDE like '%".$mot."%' OR DESCRIPTION_GUIDE like '%".$mot."%'
    //                 union
    //                 SELECT count(INTRODUCTION_CHAPITRE) as nbchapitre,'chapitre' FROM CHAPITRE WHERE NOM_CHAPITRE like '%".$mot."%' OR INTRODUCTION_CHAPITRE like '%".$mot."%'
    //                 union
    //                 SELECT count(INTRODUCTION_PARTENAIRE) as nbpartenaire,'partenaire' FROM PARTENAIRES  WHERE NOM_PARTENAIRE like '%".$mot."%' OR INTRODUCTION_PARTENAIRE like '%".$mot."%'
    //             ";
    //     $resultat = $this->db->query($query);
    //     $data = array();
    //     $i=0;
    //     foreach ($resultat->result_array() as $row) {
    //         $data[$i]['image'] = $row['IMAGE_DRAPEAU'];
    //         $data[$i]['nom'] = $row['NOM_PAYS'];
    //         $data[$i]['description'] = $row['INTRODUCTION_PAYS'];
    //         $data[$i]['type'] = $row['pays'];
    //         $i++;
    //     }
    //     $this->db->close();
    //     return $data; 
    // }

}
