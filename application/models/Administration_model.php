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

    public function update_user_infos($id, $name, $firstname,$phone, $address, $zipcode,$city, $addressextra){
        $this->db->query('CALL sp_updateUserInfos(?,?,?,?,?,?,?,?)', array($id, $name, $firstname,$phone, $address, $zipcode, $city, $addressextra));
    }

    public function add_training($portfolio_id, $training, $diploma, $year, $city, $details = "", $order = 0, $visible = 1) {
        $this->db->query('CALL sp_addTraining(?, ?, ?, ?, ?, ?, ?, ?)', array($portfolio_id, $training, $diploma, $year, $city, $details, $visible, $order));

        /* Get last inserted id in formation table */
        $this->db->select_max('id_formation');
        $lastInsertId = $this->db->get('formation')->result_array()[0]['id_formation'];

        return $lastInsertId;
    }
}