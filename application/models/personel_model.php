<?php

class Personel_model extends CI_Model{

    function insert($data = array()){
        $result = $this->db->insert("personel", $data);
        return $result;
    }
    function delete($where){
        $result = $this->db->where($where)->delete("personel");
        return $result;

    }

}