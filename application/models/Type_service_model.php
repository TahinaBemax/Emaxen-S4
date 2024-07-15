<?php
class Type_service_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour créer un nouveau type de service
    public function create_type_service($data) {
        return $this->db->insert('type_service', $data);
    }

    // Fonction pour obtenir un type de service par son ID
    public function get_type_service_by_id($id) {
        $query = $this->db->get_where('type_service', array('idTypeService' => $id));
        return $query->row_array();
    }

    // Fonction pour obtenir tous les types de service
    public function get_all_type_services() {
        $query = $this->db->get('type_service');
        return $query->result_array();
    }

    // Fonction pour mettre à jour un type de service
    public function update_type_service($id, $data) {
        $this->db->where('idTypeService', $id);
        return $this->db->update('type_service', $data);
    }

    // Fonction pour supprimer un type de service
    public function delete_type_service($id) {
        $this->db->where('idTypeService', $id);
        return $this->db->delete('type_service');
    }
}
?>
