<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 21/03/2016
 * Time: 08:57
 */
class PortFolio extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('PortFolio_model', 'portfolio');
	}

	public function index(){
		$this->lookup();
	}

	public function lookup() {
		$data = array();
		$requested_id = $this->uri->segment(3);
		$data['user'] = $this->portfolio->get_seeker_by_id($requested_id);
		$data['portfolio'] = $this->portfolio->get_portfolio($data['user'][0]['id_portfolio']);
		$data['projects'] = $this->portfolio->sp_get_all_projects($requested_id);
		var_dump($data['projects']);
		$this->load->template("PortFolio_view", $data);

	}
}