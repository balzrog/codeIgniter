<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 11:08
 */
class Administration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email'));
        $this->load->model('Administration_model','admin_model');
    }

    function index(){
        if($this->session->userdata['user_id'] != null) {
            $data['results'] = $this->admin_model->get_user_max_infos();

            $portfolio_id = $this->session->userdata['portfolio_id'];
            $data['trainings'] = $this->admin_model->get_all_trainings($portfolio_id);

            $this->load->template("Administration_view", $data);
        }else{
            redirect(base_url("Home"));
        }
    }

    public function add_user_training() {
        $data = array();

        $this->form_validation->set_rules('training', 'Formation', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('diploma', 'Diplôme', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            echo "ADD : ERREUR SAISIE";
        } else {
            $training       = $this->input->post('training');
            $diploma        = $this->input->post('diploma');
            $year           = $this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('details');
            $visible        = $this->input->post('visible');
            $portfolio_id   = $this->session->userdata['portfolio_id'];

            $last_id = $this->admin_model->add_training($portfolio_id, $training, $diploma, $year, $city, $details);
            echo $last_id;
        }
    }

    public function update_user_training() {
        $this->form_validation->set_rules('training', 'Formation', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('diploma', 'Diplôme', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');

        if($this->form_validation->run() == false) {
            echo "MAJ : ERREUR SAISIE";
        } else {
            $training_id    = $this->input->post('id_training');
            $training       = $this->input->post('training');
            $diploma        = $this->input->post('diploma');
            $year           = $this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('details');
            //$visible      = $this->input->post('visible');
            $visible        = 1;
            $portfolio_id   = $this->session->userdata['portfolio_id'];

            $this->admin_model->update_training($training_id, $portfolio_id, $training, $year, $diploma, $city, $details, $visible);
        }
    }

    public function delete_user_training() {
        $training_id = $this->input->post('id_training');
        $user_id = $this->session->userdata['user_id'];

        $this->admin_model->delete_training($training_id, $user_id);
    }

    public function save(){
        if($this->session->userdata['user_id'] != null) {


        $this->form_validation->set_rules('name', 'Nom', 'trim|required|customAlpha|min_length[2]');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|customAlpha|min_length[2]');
        $this->form_validation->set_rules('phone', 'Téléphone', 'trim|max_length[10]');
        $this->form_validation->set_rules('address', 'Adresse', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('zipcode', 'Code postal', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('addressextra', 'Complément', 'trim|alpha|min_length[5]');

        if($this->form_validation->run() == false){
            echo 'erreur';
            var_dump($this->input->post('name'));
            $data['results'] = $this->admin_model->get_user_max_infos();
            $portfolio_id = $this->session->userdata['portfolio_id'];
            $data['trainings'] = $this->admin_model->get_all_trainings($portfolio_id);
            $this->load->template("Administration_view", $data);
        } else {
            $name           = $this->input->post('name');
            $firstname      = $this->input->post('firstname');
            $phone          = $this->input->post('phone');
            $address        = $this->input->post('address');
            $city           = $this->input->post('city');
            $zipcode        = $this->input->post('zipcode');
            $address_extra  = $this->input->post('addressextra');
            $name_visible         = $this->input->post('radio_nom');
            $firstname_visible      = $this->input->post('radio_prenom');
            $phone_visible          = $this->input->post('radio_phone');
            $mail_visible           = $this->input->post('radio_mail');
            $address_visible        = $this->input->post('radio_adresse');
            $city_visible           = $this->input->post('radio_ville');
            $zipcode_visible        = $this->input->post('radio_code_postal');
            $address_extra_visible  = $this->input->post('radio_complement');

            $this->admin_model->update_user_infos(
                $this->session->userdata['user_id'],
                $name,
                $firstname,
                $phone,
                $address,
                $zipcode,
                $city,
                $address_extra);

            $this->admin_model->update_user_visibility_infos(
                $this->session->userdata['user_id'],
                $name_visible,
                $firstname_visible,
                $phone_visible,
                $mail_visible,
                $address_visible,
                $city_visible,
                $zipcode_visible,
                $address_extra_visible);

            redirect(base_url('Administration/index#Contact'));
        }
        }else{
            redirect(base_url("Home"));
        }
    }
}