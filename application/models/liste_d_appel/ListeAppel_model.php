<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 11/03/2016
 * Time: 13:45
 */
class ListeAppel_model extends CI_Model
{

    public function getAllStudents(){
        return $this->db->select('`nom`,`prenom`')
            ->from('eleve')
            ->order_by('nom','asc')
            ->get()
            ->result();
    }

    public function addStudent($nom,$prenom){
        $this->db->set(array('nom' => $nom, 'prenom' => $prenom))
            ->insert('eleve');
    }

    public function delStudents($nom,$prenom){
        $this->db->set(array('nom' => $nom, 'prenom' => $prenom))
            ->delete('eleve');
    }
}
