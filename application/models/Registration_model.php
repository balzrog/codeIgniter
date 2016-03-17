<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:44
 */

class Registration_model extends CI_Model {

    public function add_user($name, $firstname, $mail, $password, $phone, $city, $zipcode, $addressextra, $timestamp) {
        $this->db->query('CALL sp')
    }
}