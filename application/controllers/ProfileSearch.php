<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 18/03/2016
 * Time: 14:12
 */
class ProfileSearch extends CI_Controller{
	public function __construct() {
		parent::__construct();

        $this->load->model('ProfileSearch_model', 'profilesearch');
		$this->load->helper('form');
        $this->load->library('form_validation');
	}

	public function index(){
		$data['test']="test";
		$this->load->template('ProfileSearch_view', $data);
	}

    public function search() {
        //$this->form_validation->set_rules('trim');

        $keywords = $this->input->post('search');

        $data['results'] = $this->profilesearch->get_results($keywords);

        print_r($data);
    }
}