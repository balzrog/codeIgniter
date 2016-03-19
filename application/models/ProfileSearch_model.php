<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 18/03/2016
 * Time: 14:06
 */
class ProfileSearch_model extends CI_Model{

    public function get_all_seekers() {
        return $this->db->query("CALL sp_getAllJobSeekers()")->result_array();
    }

    public function get_results($keyword) {
        return $this->db->query("CALL sp_getResultsFromKeyword(?)", $keyword);
    }
}