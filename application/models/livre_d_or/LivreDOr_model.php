<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 10/03/2016
 * Time: 22:01
 */
class LivreDOr_model extends CI_Model
{
    private $table = 'livreor_commentaires';

    public function addCommentary($pseudo,$message){
        if(!is_string($pseudo) OR !is_string($message) OR empty($pseudo) OR empty($message))
        {
            return false;
        }

        return $this->db->set(array('pseudo' => $pseudo, 'message' => $message))
        ->set('date','NOW()',false)
            ->insert($this->table);
    }

    public function count(){
        return $this->db->count_all($this->table);
    }

    public function getCommantaries($nb,$start=0){
        if(!is_integer($nb) OR $nb < 1 OR !is_integer($start) OR $start < 0)
        {
            return false;
        }

        return $this->db->select('`id`, `pseudo`, `message`, DATE_FORMAT(`date`,\'%d/%m/%Y &agrave; %H:%i:%s\') AS \'date\'', false)
            ->from($this->table)
            ->order_by('id', 'desc')
            ->limit($nb, $start)
            ->get()
            ->result();
    }
}