<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Model {
    public function getAll(){
            $query = "SELECT * FROM type_service ORDER BY idTypeService ASC";
    
            $result = $this->db->query($query);
            $services = [];
    
            if ($result->num_rows() > 0) {
                foreach ($result->result_array() as $row){
                    $services[] = $row;
                }
            } else {
                return false;
            }
            return $services;
    }
}