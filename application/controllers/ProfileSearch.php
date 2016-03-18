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
	}

	public function index(){
		$data['test']="test";
		$this->load->template('ProfileSearch_view', $data);
	}
}