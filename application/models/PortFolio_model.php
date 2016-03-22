<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 18/03/2016
 * Time: 14:06
 */
class PortFolio_model extends CI_Model{

    public function get_seeker_by_id($id_user) {
        $query = $this->db->query("CALL sp_getSeekerById(?)", $id_user)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function get_portfolio($id_portfolio) {
        $query = $this->db->query("CALL sp_getPortfolioById(?)", $id_portfolio)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function sp_get_all_projects($id_user) {
        $query = $this->db->query("CALL sp_getAllProjects(?)", $id_user)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function sp_get_image($id_image) {
        $query = $this->db->query("CALL sp_getImageById(?)", $id_image)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function get_user_email($portfolio_id = 1) {
        $query = $this->db->query('CALL sp_getUserEmail(?)', $portfolio_id)->row()->mail;
        $this->db->free_result();
        return $query;
    }
}