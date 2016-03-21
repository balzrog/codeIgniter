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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Administration_model','admin_model');
    }

    function index(){
        $data['results'] = $this->admin_model->get_user_max_infos();
        $this->load->template("Administration_view", $data);
    }

    function save(){

        $this->form_validation->set_rules('name', 'Nom', 'trim|required|alpha|min_length[2]');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|alpha|min_length[2]');
        $this->form_validation->set_rules('phone', 'Téléphone', 'trim|max_length[10]');
        $this->form_validation->set_rules('mail', 'Adresse email', 'trim|required|valid_email');
        $this->form_validation->set_rules('address', 'Adresse', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('zipcode', 'Code postal', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('addressextra', 'Complément', 'trim|alpha|min_length[0]');

        if($this->form_validation->run() == false){
            $data['results'] = $this->admin_model->get_user_max_infos();
            $this->load->template("Administration_view", $data);
        } else {
            $name           = $this->input->post('name');
            $firstname      = $this->input->post('firstname');
            $phone          = $this->input->post('phone');
            $address        = $this->input->post('address');
            $city           = $this->input->post('city');
            $zipcode        = $this->input->post('zipcode');
            $address_extra  = $this->input->post('addressextra');

            $this->admin_model->update_user_infos(
                $this->session->userdata['user_id'],
                $name,
                $firstname,
                $phone,
                $address,
                $zipcode,
                $city,
                $address_extra);

            $data['results'] = $this->admin_model->get_user_max_infos();
            $this->load->template("Administration_view", $data);
        }
    }
}