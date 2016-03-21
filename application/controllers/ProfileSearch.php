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

		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('ProfileSearch_model', 'profilesearch');
	}

	public function index(){
        echo "ProfileSearch Index";
	}

    public function search() {
        $data['results'] = array();

        if(empty($this->input->post('keyword'))) {
            $data['results'] = $this->profilesearch->get_all_seekers();
        }

        $this->form_validation->set_rules('keyword', 'Recherche', 'trim|required');
        if($this->form_validation->run() == false) {
            $this->load->template('ProfileSearch_view', $data);
        } else {
            $keywords = $this->input->post('keyword');

            $data['results'] = $this->profilesearch->get_results($keywords);

            $this->load->template('ProfileSearch_view', $data);
        }
    }
}