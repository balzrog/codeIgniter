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

    public function get_portfolio_infos($user_id){
        $query = $this->db->query("CALL sp_getPortfolioInfos(?)", $user_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function update_portfolio_infos($user_id,$description,$id_img){
        $this->db->query('CALL sp_updatePortfolioInfos(?,?,?)',array($user_id,$description,$id_img));
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

    public function get_all_projects($portfolio_id) {
        $query = $this->db->query('CALL sp_getAllProjects2(?)', $portfolio_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function get_all_categories($portfolio_id) {
        $query = $this->db->query('CALL sp_getAllCategories(?)', $portfolio_id)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function add_training($portfolio_id, $training, $diploma, $year, $city, $details = "", $visible = 1) {
        $this->db->query('CALL sp_addTraining(?, ?, ?, ?, ?, ?, ?)', array($portfolio_id, $training, $diploma, $year, $city, $details, $visible));
    }

    public function update_training($training_id, $portfolio_id, $training, $year, $diploma, $city, $details = "", $visible) {
        $this->db->query('CALL sp_updateTraining(?, ?, ?, ?, ?, ?, ?, ?)', array($training_id, $portfolio_id, $training, $year, $diploma, $city, $details, $visible));
    }

    public function delete_training($training_id) {
        $this->db->query('CALL sp_deleteTraining(?)', $training_id);
    }

    public function add_experience($portfolio_id, $position, $year, $entreprise, $city, $details, $visible) {
        $this->db->query('CALL sp_addExperience(?, ?, ?, ?, ?, ?, ?)', array($portfolio_id, $position, $year, $entreprise, $details, $city, $visible));
    }

    public function update_experience($experience_id, $portfolio_id, $position, $year, $entreprise, $city, $details, $visible) {
        $this->db->query('CALL sp_updateExperience(?, ?, ?, ?, ?, ?, ?, ?)', array($experience_id, $portfolio_id, $position, $year, $entreprise, $city, $details, $visible));
    }

    public function delete_experience($experience_id) {
        $this->db->query('CALL sp_deleteExperience(?)', $experience_id);
    }

    public function add_project($title, $description, $link, $visible, $portfolio_id, $image_id) {
        $this->db->query('CALL sp_addProject(?, ?, ?, ?, ?, ?)', array($title, $description, $link, $visible, $portfolio_id, $image_id));
    }

    public function update_project($projectid, $portfolio_id, $title, $description, $link, $visible) {
        $this->db->query('CALL sp_updateProject(?, ?, ?, ?, ?, ?)', array($projectid, $portfolio_id, $title, $description, $link, $visible));
    }

    public function delete_project($project_id) {
        $this->db->query('CALL sp_deleteProject(?)', $project_id);
    }

    public function add_categorie($portfolio_id, $categorie) {
        $this->db->query('CALL sp_addCategorie(?, ?)', array($portfolio_id, $categorie));
    }

    public function add_skill($categorie_id, $skill, $level, $visible) {
        $this->db->query('CALL sp_addSkill(?, ?, ?, ?)', array($skill, $visible, $level, $categorie_id));
    }

    public function add_image($file_name) {
        $this->db->query('CALL sp_addImageUrl(?)', $file_name);
        $this->db->free_result();

        $this->db->select_max('id_image');
        $lastInsertId = $this->db->get('image')->result_array()[0]['id_image'];

        return $lastInsertId;
    }

    public function sp_get_all_categories($id_portfolio) {
        $query = $this->db->query("CALL sp_getAllCategories(?)", $id_portfolio)->result_array();
        $this->db->free_result();
        return $query;
    }

    public function sp_get_all_skills($id_category) {
        $query = $this->db->query("CALL sp_getAllSkills(?)", $id_category)->result_array();
        $this->db->free_result();
        return $query;
    }
}