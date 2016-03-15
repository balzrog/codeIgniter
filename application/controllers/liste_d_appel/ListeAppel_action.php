<?php
/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 14/03/2016
 * Time: 11:30
 */

class Action_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('liste_d_appel/ListeAppel_model','listeAppelModel');
    }

    public function action()
    {
        redirect('liste_d_appel/ListeAppel_controller/showStudents');

    }
}