<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 11/03/2016
 * Time: 13:51
 */
class ListeAppel_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('liste_d_appel/ListeAppel_model','listeAppelModel');
    }

    public function index(){
        echo 'voici l\'index';
    }

    public function showStudents(){
        $data = array();

        $data['students'] = $this->listeAppelModel->getAllStudents();
        $this->load->view('liste_d_appel/ListeAppel_view', $data);
    }

    public function error(){
        $this->load->view('liste_d_appel/ListeAppel_view_error');
    }

    public function displayForm(){
        $this->form_validation->set_rules('nom','Nom','required');
        $this->form_validation->set_rules('prenom','Prenom','required');
        if ($this->form_validation->run())
        {
            $this->listeAppelModel->addStudent($_POST['nom'],$_POST['prenom']);
            redirect('liste_d_appel/ListeAppel_controller/showStudents');
        }else{
            redirect('liste_d_appel/ListeAppel_controller/error');
        }
    }

    public function delStudents($nom,$prenom){
        switch ($_POST['action']) {
            case 'removeEntry':
                $this->listeAppelModel->delStudents($_POST['nom'],$_POST['prenom']);
        }
        $this->showStudents();
    }
}