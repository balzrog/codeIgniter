<?php
/**
 * Created by PhpStorm
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:41
 */

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('passwordhash', array(8, FALSE));
        $this->load->library('form_validation');
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
    public function encrypt_password($password) {
        return $this->passwordhash->HashPassword($password);
    }


    /**
     * Check user entries and save them in the database if all of them are correct
     */
    public function register() {
        $data = array();
        $data['h1'] = "Inscription";

        $this->form_validation->set_rules('name', 'Nom', 'trim|required|alpha|min_length[2]');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|alpha|min_length[2]');
        $this->form_validation->set_rules('phone', 'Téléphone', 'trim|max_length[10]');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passwordbis', 'Confirmation du mot de passe', 'trim|required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('mail', 'Adresse email', 'trim|required|valid_email');
        $this->form_validation->set_rules('address', 'Adresse', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('zipcode', 'Code postal', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('addressextra', 'Complément', 'trim|alpha|min_length[5]');

        if($this->form_validation->run() == false) {
            $this->load->view('Includes/Header_view');
            $this->load->view('Registration_view', $data);
            $this->load->view('Includes/Footer_view');
        } else {
            $name           = $this->input->post('name');
            $firstname      = $this->input->post('firstname');
            $mail           = $this->input->post('mail');
            $password       = $this->encrypt_password($this->input->post('password'));
            $phone          = $this->input->post('phone');
            $address        = $this->input->post('address');
            $city           = $this->input->post('city');
            $zipcode        = $this->input->post('zipcode');
            $addressExtra   = $this->input->post('addressextra');
            $timestamp      = time();

            if($this->registration->add_user(
                $name,
                $firstname,
                $mail,
                $password,
                $phone,
                $address,
                $city,
                $zipcode,
                $addressExtra,
                $timestamp
            )) {
                redirect('Registration');
            } else {
                $data['error'] = "Un problème est survenu lors de la création du compte. Veuillez réessayer plus tard.";
                $this->load->view('Registration_view', $data);
            }
        }
    }
}