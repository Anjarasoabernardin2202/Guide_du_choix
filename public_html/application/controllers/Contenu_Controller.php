<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenu_Controller extends CI_Controller {
	public function __construct() {
      parent::__construct();
      $this->load->library('pagination');
      $this->load->model('Article_Model','article');		
      $this->load->model('Chapitre_Model','chapitre');
      $this->load->model('Admin_Model','admin');
    }

    public function article_bo(){
      $config2 = array();
      $config2["base_url"] = site_url() . "/Contenu_Controller/article_bo";
      $config2["total_rows"] = $this->article->compterArticle();
      $config2["per_page"] = 5;
      $config2["uri_segment"] = 3;
      $config2['num_tag_open'] = '<button>';
      $config2['num_tag_close'] = '</button>';
      $config2['next_link'] = 'Suivant';
      $config2['prev_link'] = 'Précédent';
      $config2['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right">';
      $config2['next_tag_close'] = '</button>';
      $config2['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
      $config2['prev_tag_close'] = '</button>';
      $config2['display_pages'] = FALSE;
      $config2['last_link'] = FALSE;
      $config2['first_link'] = FALSE;
      $this->pagination->initialize($config2);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if($this->session->userdata('admin')){
          $email = $this->session->userdata['admin'];
          $data['admin'] = $this->admin->getProfil($email);
        }
        else{
          redirect('Login_Controller/logout');
        }
        $data['erreur'] = '';
        $data['message'] = '';
        $data['listechapitres'] = $this->chapitre->getListeParagraphes();
        $data['liste']  = $this->article->listeArticles($config2["per_page"],$page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view("backoffice/pages/article",$data);
      
    }

    public function createArticle(){
      $config2 = array();
      $config2["base_url"] = site_url() . "/Contenu_Controller/article_bo";
      $config2["total_rows"] = $this->article->compterArticle();
      $config2["per_page"] = 5;
      $config2["uri_segment"] = 3;
      $config2['num_tag_open'] = '<button>';
      $config2['num_tag_close'] = '</button>';
      $config2['next_link'] = 'Suivant';
      $config2['prev_link'] = 'Précédent';
      $config2['next_tag_open'] = '<button type="button" class="btn btn-primary" style="float:right">';
      $config2['next_tag_close'] = '</button>';
      $config2['prev_tag_open'] = '<button type="button" class="btn btn-primary" style="float:left">';
      $config2['prev_tag_close'] = '</button>';
      $config2['display_pages'] = FALSE;
      $config2['last_link'] = FALSE;
      $config2['first_link'] = FALSE;
      $this->pagination->initialize($config2);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $config['upload_path'] = './assets/image';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 200;
      $config['max_width'] = 1000;
      $config['max_height'] = 1000;
      $this->load->library('upload',$config);
        $initialize = $this->upload->initialize($config);
        $image = 'no_img.jpg';
        $this->upload->do_upload('image');
        $data = $this->upload->data();
        $image = $data['file_name'];
        $idchapitre = $this->input->post('nomchapitre');
        $nom = $this->input->post('titrearticle');
        $description = $this->input->post('descriptionarticle');
        $smartphone = $this->input->post('descriptionarticlesmart');
        $numero = $this->input->post('numeroarticle'); 
        if($this->session->userdata('admin')){
          $email = $this->session->userdata['admin'];
          $data['admin'] = $this->admin->getProfil($email);
        }
        else{
          redirect('Login_Controller/logout');
        }     
        $erreur = $this->article->gestionErreur($idchapitre,$image,$nom,$description,$smartphone,$numero);
        if(!isset($erreur) || empty($erreur) || $erreur==null){
          $this->article->setImage($image);
          $this->article->setIdChapitre($idchapitre);
          $this->article->setTitre($nom);
          $this->article->setContenu($description);
          $this->article->setNumero($numero);
          $smartphone == null || empty($smartphone) ? $this->article->setContenuSmartphone($description) : $this->article->setContenuSmartphone($smartphone);
          $this->article->insertArticle();
          $data['erreur'] = '';
          $data['message'] = 'Insertion réussie';
          $data['listechapitres'] = $this->chapitre->getListeParagraphes();
          $data['liste']  = $this->article->listeArticles($config2["per_page"],$page);
          $data['links'] = $this->pagination->create_links();
          $this->load->view("backoffice/pages/article",$data);
        }
        else{
          $data['erreur'] = $erreur;
          $data['message'] = '';
          $data['listechapitres'] = $this->chapitre->getListeParagraphes();
          $data['liste']  = $this->article->listeArticles($config2["per_page"],$page);
          $data['links'] = $this->pagination->create_links();
          $this->load->view("backoffice/pages/article",$data);
        }		
      
    }

    public function updateArticle($id){
      $config['upload_path'] = './assets/image';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 200;
      $config['max_width'] = 1000;
      $config['max_height'] = 1000;
      $this->load->library('upload',$config);
      $initialize = $this->upload->initialize($config);
      $image = 'no_img.jpg';
      $chapitre = $this->input->post('nomchapitre');
      $idchapitre = $this->chapitre->findIdByName($chapitre);
      $nom = $this->input->post('titrearticle');
      $description = $this->input->post('descriptionarticle');
      $smartphone = $this->input->post('descriptionarticlesmart');
      $numero = $this->input->post('numero'); 
      if($this->upload->do_upload('image')){
        $data = $this->upload->data();
        $image = $data['file_name'];
        $this->article->setImage($image);
        $this->article->setIdChapitre($idchapitre);
        $this->article->setTitre($nom);
        $this->article->setContenu($description);
        $this->article->setNumero($numero);
        $this->article->setContenuSmartphone($smartphone);
       $this->article->updateArticle($id);
       redirect('Contenu_Controller/article_bo','refresh');
      }
      if(!$this->upload->do_upload('image')){
        $img = $this->input->post('img');
        $this->article->setImage($img);
        $this->article->setIdChapitre($idchapitre);
        $this->article->setTitre($nom);
        $this->article->setContenu($description);
        $this->article->setNumero($numero);
        $this->article->setContenuSmartphone($smartphone);
        $this->article->updateArticle($id);
       redirect('Contenu_Controller/article_bo','refresh');
      }
    }

    public function deleteArticle($id){
      $this->article->deleteArticle($id);
      redirect('Contenu_Controller/article_bo','refresh');
    }

    public function readArticle($id){
      if($this->session->userdata('admin')){
        $email = $this->session->userdata['admin'];
        $data['admin'] = $this->admin->getProfil($email);
      }
      else{
        redirect('Login_Controller/logout');
      }
      $data['single'] = $this->article->singleArticle($id);
      $idchapitre = $this->article->getChapitre($id);
      $data['nomchapitre'] = $this->chapitre->findNameById($idchapitre);
      $data['listechapitres'] = $this->chapitre->getListeParagraphes();      
      $this->load->view('backoffice/pages/fichearticle',$data);
    }
    
  

   
}
