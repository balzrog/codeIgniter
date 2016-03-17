<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:41
 */

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('passwordhash', array(8, FALSE));
        $this->load->helper('form');
        $this->load->model('Registration_model', 'registration');
    }

    public function index() {
        echo "Registration";
    }

    /**
     * Encrypts the user password and returns it
     *
     * @param $password
     * @return mixed
     */
    public function encryptPassword($password) {
        return $this->passwordhash->HashPassword($password);
    }

    public function register() {
        $data = array();
        $data['h1'] = "Inscription";

        $this->load->view('Registration_view', $data);

        /*$this->registration->add_user(
            $_POST['name'],
            $_POST['firstname'],
            $_POST['mail'],
            $this->encryptPassword($_POST['password']),
            $_POST['landline'],
            $_POST['cellular'],
            time()
        );*/
    }
}