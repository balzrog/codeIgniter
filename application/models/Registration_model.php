<?php
/**
 * Created by PhpStorm
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
            $this->db->free_result();

            /* Get last inserted id in utilisateur table */
            $this->db->select_max('id_utilisateur');
            $lastInsertId = $this->db->get('utilisateur')->result_array()[0]['id_utilisateur'];
            $this->db->query('CALL sp_addPortfolio(?)', $lastInsertId)->result_array();
            $this->db->free_result();
            $this->db->select_max('id_portfolio');;
            $lastInsertPortfolio = $this->db->get('portfolio')->result_array()[0]['id_portfolio'];
            $this->update_user_portfolio($lastInsertId, $lastInsertPortfolio);
            if(count($lastInsertId) > 0) {
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

    public function update_user_portfolio($id_user, $portfolio_id){
        $query = $this->db->query('CALL sp_updateUserPortfolio(?, ?)', array($id_user, $portfolio_id))->result_array();
        $this->db->free_result();
        return $query;
    }
}