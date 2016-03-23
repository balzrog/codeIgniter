<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 23/03/2016
 * Time: 09:16
 */
class Actions extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Actions_model', 'action');
	}

	public function theme_portfolio(){
		$portfolio_id  = $this->uri->segment(3);
		$theme = $this->action->get_portfolio_theme($portfolio_id);
		echo $theme[0]['background']."/".$theme[0]['font'];
	}
}