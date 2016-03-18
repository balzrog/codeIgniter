<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 11:54
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "Accueil";
        $data['description'] = "";
        $this->load->view('Home_view', $data);
    }
}