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
        $this->load->model('Administration_model','admin_model');
    }

    function index(){
        $data['results'] = $this->admin_model->get_user_max_infos();
        $this->load->template("Administration_view", $data);
    }

    

}