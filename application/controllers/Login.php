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
        $this->connection();
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

            // Check if user exists before testing password
            $mail = $this->input->post('mail');
            $password = $this->input->post('password');
            $stored_password = $this->login->check_user_credentials($mail);

            if ($this->compare_password($password, $stored_password->password)) {
                $user_info = $this->login->get_user_info($mail);


                $user_id = $user_info[0]['id_utilisateur'];
                $user_ok = $user_info[0]['confirme'];
                $portfolio_id = $user_info[0]['id_portfolio'];


                if(isset($user_id) && isset($user_ok) && isset($portfolio_id)) {
                    $this->session->set_userdata(array(
                        'user_id' => (int)$user_id,
                        'portfolio_id' => (int)$portfolio_id,
                        'is_confirmed' => (int)$user_ok,
                        'logged_in' => (bool)true
                    ));

                    $this->load->template('Administration_view');
                }
            } else {
                $data['error'] = "Mot de passe incorrect ou utilisateur inexistant.";
                $this->load->template('Login_view', $data);
            }
        }
    }

    public function disconnection(){
        $this->session->sess_destroy();
        redirect(site_url('Home'));
    }
}