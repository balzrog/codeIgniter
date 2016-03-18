<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 10:54
 */

class Login_model extends CI_Model {

    public function check_user_credentials($mail) {
        return $this->db->query("CALL sp_checkUserCredentials(?)", $mail)->result()['0'];
    }

    public function get_user_info($mail) {
        $this->db->select(array('utilisateur.id_utilisateur', 'confirme', 'utilisateur.id_portfolio'));
        $this->db->from('utilisateur');
        $this->db->join('portfolio', 'utilisateur.id_utilisateur = portfolio.id_utilisateur', 'inner');

        return $this->db->get()->result();
        //return $this->db->query("CALL sp_getUserInfo(?)", $mail)->result()['0'];
    }
}