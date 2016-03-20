<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 14:24
 */
class Administration_model extends CI_Model
{
    public function get_user_max_infos() {
        return $this->db->query("CALL sp_getUserMaxInfos(?)", '51')->result_array();
    }

    public function update_user_infos(){

    }
}