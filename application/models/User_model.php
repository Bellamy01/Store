<?php

class User_model extends CI_model{
    function create($formArray){
        $this->db->insert('users',$formArray);
    }
    function display(){
        return $users = $this->db->get('users')->result_array();
    }
    function getUser($userId){
        $this->db->where('userId',$userId);
        return $user = $this->db->get('users')->row_array();
    }
    function updateUser($userId,$formArray)
    {
        $this->db->where('userId',$userId);
        $this->db->update('users',$formArray);
    }
    function deleteUser($userId){
        $this->db->where('userId',$userId);
        $this->db->delete('users');
    }
}


?>