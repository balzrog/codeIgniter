<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 10:54
 */

class Login_model extends CI_Model {

    /*public function __construct() {
        parent::__construct();
    }*/

    public function check_user_credentials($mail, $password) {
        return $this->db->query("CALL sp_checkUserCredentials(?, ?)", array($mail, $password))->result();
    }
}