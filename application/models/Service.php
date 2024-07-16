<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Model {
    // Fonction pour obtenir tous les types de service
    public function getAll(){
            $query = "SELECT * FROM v_type_service ORDER BY idTypeService ASC";
    
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

    // Fonction pour créer un nouveau type de service
    public function create_type_service($data) {
        $sql = "INSERT INTO type_service(type, duree, montant) values (?, ?, ?)";
        $this->db->query($sql, $data);
        return $this->db->affected_rows() > 0;
    }

    // Fonction pour obtenir un type de service par son ID
    public function get_type_service_by_id($id) {
        $query = $this->db->get_where('type_service', array('idTypeService' => $id));
        return $query->row_array();
    }




    // Fonction pour mettre à jour un type de service
    public function update_type_service($id, $data) {
        $this->db->where('idTypeService', $id);
        return $this->db->update('type_service', $data);
    }

    // Fonction pour supprimer un type de service
    public function delete_type_service($id) {
        $date = new DateTime();
        $this->db->update('type_service', ['date_suppression' => $date->format("Y-m-d")]);
        $this->db->where('idTypeService', $id);
        return $this->db->affected_rows() > 0;
    }
}