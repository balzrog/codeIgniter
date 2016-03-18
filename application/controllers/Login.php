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

        $this->load->library('passwordhash', array(8, FALSE));
        $this->load->model('Login_model', 'login');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('form');
    }

    public function index() {
        echo "Login";
    }

    public function compare_password($storedPassword, $actualPassword) {
        return $this->passwordhash->CheckPassword($storedPassword, $actualPassword);
    }

    public function connection() {
        $data = array();
        $data['title_header'] = "Connexion";

        $this->form_validation->set_rules('mail', 'Adresse email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[6]');
        if($this->form_validation->run() == false){
            $this->load->template('Login_view', $data);
        } else {
            $mail = $this->input->post('mail');
            $password = $this->input->post('password');

            $storedPassword = $this->login->check_user_credentials($mail)['0'];

            if($this->compare_password($password, $storedPassword->password)){
                $userId = "";


                $this->session->set_userdata(array('userid' => $userId, 'mail' => $mail));


            } else {
                echo "BAD PASSWORD";
            }

            //L'email et le mot de passe rentré correspondent avec la BDD

            $user_id = 3;
            $username = "christian33";

            /*$_SESSION['userid'] = (int)$user_id;
            $_SESSION['username'] = (string)$username;*/

            //$_SESSION = null,

            //redirect('Registration/register');
        }
        //$data = array();
        //$data['results'] = $this->login->check_user_credentials($_POST['mail'], $_POST['password']);
        //$data['title'] = "Connexion";
        //$data['description'] = "";

    }
}