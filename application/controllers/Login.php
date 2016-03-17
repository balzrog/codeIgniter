<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 10:49
 */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Login_model', 'login');
    }

    public function index() {
        echo "Login";
        //redirect(site_url());
    }

    public function connection() {
        $data = array();
        //$data['results'] = $this->login->check_user_credentials($_POST['mail'], $_POST['password']);
        //$data['title'] = "Connexion";
        $data['description'] = "";

        $this->load->view('Login_view', $data);
    }
}