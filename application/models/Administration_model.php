<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 14:24
 */
class Administration_model extends CI_Model
{
    public function get_user_max_infos($user_id) {
        $query = $this->db->query("CALL sp_getUserMaxInfos(?)", $user_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function update_user_infos($id, $name, $firstname,$phone, $address, $zipcode,$city, $addressextra){
        $this->db->query('CALL sp_updateUserInfos(?,?,?,?,?,?,?,?)',array($id, $name, $firstname,$phone, $address, $zipcode, $city, $addressextra));
    }

    public function update_user_visibility_infos($id, $nom_visible, $prenom_visible, $phone_visible, $mail_visible,$address_visible, $zipcode_visible, $city_visible, $addressextra_visibe){
        $this->db->query('CALL sp_updateUserVisibilityInfos(?,?,?,?,?,?,?,?,?)' , array($id,$nom_visible, $prenom_visible, $phone_visible,$mail_visible, $address_visible, $zipcode_visible, $city_visible, $addressextra_visibe));
    }

    public function get_all_trainings($portfolio_id) {
        $query = $this->db->query('CALL sp_getAllTrainings(?)', $portfolio_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function get_all_experiences($portfolio_id) {
        $query = $this->db->query('CALL sp_getAllExperiences(?)', $portfolio_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function add_training($portfolio_id, $training, $diploma, $year, $city, $details = "", $visible = 1) {
        $this->db->query('CALL sp_addTraining(?, ?, ?, ?, ?, ?, ?)', array($portfolio_id, $training, $diploma, $year, $city, $details, $visible));

        /* Get last inserted id in formation table */
        /*$this->db->select_max('id_formation');
        $lastInsertId = $this->db->get('formation')->result_array()[0]['id_formation'];

        return $lastInsertId;*/
    }

    public function update_training($training_id, $portfolio_id, $training, $year, $diploma, $city, $details = "", $visible) {
        $this->db->query('CALL sp_updateTraining(?, ?, ?, ?, ?, ?, ?, ?)', array($training_id, $portfolio_id, $training, $year, $diploma, $city, $details, $visible));
    }

    public function delete_training($training_id, $user_id) {
        $this->db->query('CALL sp_deleteTraining(?, ?)', array($training_id, $user_id));
    }

    public function add_experience($portfolio_id, $position, $year, $entreprise, $city, $details, $visible) {
        $this->db->query('CALL sp_addExperience(?, ?, ?, ?, ?, ?, ?)', array($portfolio_id, $position, $year, $entreprise, $details, $city, $visible));
    }
}