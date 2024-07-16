<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Model
{
    public function isNumeroVoitureExist($car_number)
    {
        $query = "SELECT * FROM v_voiture WHERE numero = %s";
        $query = sprintf($query, $this->db->escape($car_number));

        $result = $this->db->query($query);

        return $result->num_rows() >= 1;
    }

    // Fonction pour vérifier le login
    public function login($car_number, $car_type) {
        $query = "SELECT * FROM v_voiture WHERE numero = %s AND idTypeVoiture = %s";
        $query = sprintf($query, $this->db->escape($car_number), $this->db->escape($car_type));

        $result = $this->db->query($query);

        return $result->num_rows() == 1;
    }

    // Fonction pour vérifier le login
    public function getClient($car_number, $car_type) {
        $query = "SELECT * FROM v_client WHERE numero = %s AND type = %s";
        $query = sprintf($query, $this->db->escape($car_number), $this->db->escape($car_type));

        $result = $this->db->query($query);
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function getAll() {
        $query = "SELECT * FROM client";
        $result = $this->db->query($query);
        $resultat = [];

        foreach ($result->result_array() as $row){
            $resultat[] = $row;
        }
        return $resultat;
    }
    public function getAllVoiture() {
        $query = "SELECT * FROM v_voiture";
        $result = $this->db->query($query);
        $resultat = [];

        foreach ($result->result_array() as $row){
            $resultat[] = $row;
        }
        return $resultat;
    }

    // Fonction pour enregistrer un nouveau client et une voiture
    public function register($car_number, $car_type) {
        // Vérifier si le type de voiture existe
        $query = "SELECT idTypeVoiture FROM type_voiture WHERE idTypeVoiture = %s";
        $query = sprintf($query, $this->db->escape($car_type));
        $result = $this->db->query($query);

        if ($result->num_rows() == 0) {
            throw new Exception("Le type du véhicule n'existe pas");
        }

        $type_voiture = $result->row_array();

        // Insérer un nouveau client
        $this->db->insert('client', ['idClient' => null]);
        $client_id = $this->db->insert_id();

        // Insérer la voiture
        $car_data = array(
            'numero' => $car_number,
            'idClient' => $client_id,
            'idTypeVoiture' => $type_voiture['idTypeVoiture']
        );

        return $this->db->insert('voiture', $car_data);
    }
}
?>
