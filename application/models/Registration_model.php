<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:44
 */

class Registration_model extends CI_Model {

    /*public function check_user($mail) {
        if(empty($this->db->query('CALL sp_checkUserEmail(?)', $mail)->result())) {
            return true;
        } else { return false; }
    }*/

    public function add_user_address($userId, $address, $city, $zipcode, $adressExtra) {
        $this->db->query('CALL sp_addUserAddress(?, ?, ?, ?, ?)', array($address, $city, $adressExtra, $zipcode, $userId));
    }

    public function add_user($name, $firstname, $mail, $password, $phone, $address, $city, $zipcode, $addressextra, $timestamp) {
        //echo $this->check_user_email($mail);
        //if($this->check_user($mail) == true) {
            $this->db->query('CALL sp_addUser(?, ?, ?, ?, ?, ?)', array($name, $firstname, $mail, $password, $phone, $timestamp));

            /* Get last inserted id in utilisateur table */
            $this->db->select_max('id_utilisateur');
            $lastInsertId = $this->db->get('utilisateur')->result_array()[0]['id_utilisateur'];

            if(isset($lastInsertId)) {
                $this->add_user_address($lastInsertId, $address, $city, $zipcode, $addressextra);
                return true;
            } else {
                echo "Utilisateur non ajouté dans la base de données";
                return false;
            }
        //} else {
            //echo "Utilisateur déjà existant";
        //}
    }
}