<?php

class TypeVoiture extends CI_Model
{
    public function getAll(){
        $query = "SELECT * FROM type_voiture";

        $result = $this->db->query($query);
        $voiture = [];

        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row){
                $voiture[] = $row;
            }
        } else {
            return false;
        }
        return $voiture;
    }
}