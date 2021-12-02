<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_Controller extends CI_Controller {
	public function __construct() {
      parent::__construct();
      $this->load->library('excel');	
      $this->load->library('pagination');	
      $this->load->model('Excel_Model','excelmodel');
	  $this->load->model('Pays_Model','pays');
	  $this->load->model('Admin_Model','admin');

    }

    public function entreprise_bo(){
        $config = array();
		$config['base_url'] = site_url()."/Excel_Controller/entreprise_bo/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->excelmodel->compterEntreprise();
		$config['per_page'] = 10;
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['next_link'] = 'Suivant';
		$config['prev_link'] = 'Précédent';
		$config['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right;">';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
		$config['prev_tag_close'] = '</button>';
		$config['display_pages'] = FALSE;
		$config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['liste'] = $this->excelmodel->getEntreprise($config['per_page'],$page);
		if($this->session->userdata('admin')){
			$email = $this->session->userdata['admin'];
			$data['admin'] = $this->admin->getProfil($email);
		}
		else{
			redirect('Login_Controller/logout');
		}
        $data['listepaysnom'] = $this->pays->getListeNom();
        $data['links'] = $this->pagination->create_links();
        $this->load->view('backoffice/pages/entreprise',$data);
    }

    public function import(){
        if(isset($_FILES["excel"]["name"])){
            $nompays = $this->input->post('nompays');        
    		$idpays = $this->pays->findIdByName($nompays);         
            $path = $_FILES["excel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorkSheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($ligne = 3; $ligne <= $highestRow; $ligne++){
                    $ligne2 = $ligne-1;
                    $domaine = $worksheet->getCellByColumnAndRow(0,$ligne)->getValue();
                    $domaine2 = $worksheet->getCellByColumnAndRow(0,($ligne-1))->getValue();
                    $sousdomaine = $worksheet->getCellByColumnAndRow(1,$ligne)->getValue();
                    $sousdomaine2 = $worksheet->getCellByColumnAndRow(1,($ligne-1))->getValue();                    
                    $nomentreprise = $worksheet->getCellByColumnAndRow(2,$ligne)->getValue();
                    $site = $worksheet->getCellByColumnAndRow(3,$ligne)->getValue();
                    $telephone = $worksheet->getCellByColumnAndRow(4,$ligne)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(5,$ligne)->getValue();
                    $adresse = $worksheet->getCellByColumnAndRow(6,$ligne)->getValue();
                    $lieu = $worksheet->getCellByColumnAndRow(7,$ligne)->getValue();
                    $this->excelmodel->setIdPays($idpays);
                    if($domaine == null){
                        $this->excelmodel->setDomaine($domaine2);
                        $worksheet->getCellByColumnAndRow(0,$ligne)->setValue($domaine2);
                    }
                    else{
                        $this->excelmodel->setDomaine($domaine);
                    }
                    if($sousdomaine == null){
                        $this->excelmodel->setSousDomaine($sousdomaine2);
                        $worksheet->getCellByColumnAndRow(1,$ligne)->setValue($sousdomaine2);
                    }
                    else{
                        $this->excelmodel->setSousDomaine($sousdomaine);
                    }
                    $this->excelmodel->setNom($nomentreprise);
                    $this->excelmodel->setSite($site);
                    $this->excelmodel->setTelephone($telephone);
                    $this->excelmodel->setEmail($email);
                    $this->excelmodel->setAdresse($adresse);
                    $this->excelmodel->setLieu($lieu);
                     $this->excelmodel->insertExcel();
                }
            }
		    redirect('Excel_Controller/entreprise_bo','refresh');

        }
    }

}
