<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 14:24
 */
class Administration_model extends CI_Model
{
    public function get_user_info() {
        $query = $this->db->select('`nom`,`prenom`')
            ->where(array('id_utilisateur' => 51))
            ->get('utilisateur');

        return $query->result_array();
    }
}