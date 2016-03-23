<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 23/03/2016
 * Time: 09:17
 */
class Actions_model extends CI_Model {

	public function get_portfolio_theme($portfolio_id){
		$query = $this->db->query('CALL sp_getTheme(?)', $portfolio_id)->result_array();
		$this->db->free_result();
		return $query;
	}
}