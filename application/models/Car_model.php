<?php
class Car_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour vérifier le login
    public function login($car_number, $car_type) {
        $query = "SELECT voiture.idVoiture, voiture.numero, type_voiture.type
                  FROM voiture
                  JOIN type_voiture ON voiture.idTypeVoiture = type_voiture.idTypeVoiture
                  WHERE voiture.numero = %s AND type_voiture.type = %s";
        $query = sprintf($query, $this->db->escape($car_number), $this->db->escape($car_type));
        
        $result = $this->db->query($query);
        
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    // Fonction pour enregistrer un nouveau client et une voiture
    public function register($car_number, $car_type) {
        // Vérifier si le type de voiture existe
        $query = "SELECT idTypeVoiture FROM type_voiture WHERE type = %s";
        $query = sprintf($query, $this->db->escape($car_type));
        $result = $this->db->query($query);
        
        if ($result->num_rows() == 0) {
            // Si le type de voiture n'existe pas, retourner une erreur
            return false;
        }

        $type_voiture = $result->row_array();

        // Insérer un nouveau client
        $client_data = array('password' => password_hash($car_number, PASSWORD_DEFAULT));
        $this->db->insert('client', $client_data);
        $client_id = $this->db->insert_id();

        // Insérer la voiture
        $car_data = array(
            'numero' => $car_number,
            'idClient' => $client_id,
            'idTypeVoiture' => $type_voiture['idTypeVoiture']
        );

        return $this->db->insert('voiture', $car_data);
    }

    // Fonction pour gérer le processus de connexion et d'inscription automatique
    public function authenticate($car_number, $car_type) {
        // Vérifier si la voiture existe déjà
        $car = $this->login($car_number, $car_type);

        if ($car) {
            return $car; // Connexion réussie
        } else {
            // Sinon, enregistrer une nouvelle voiture et un nouveau client
            if ($this->register($car_number, $car_type)) {
                // Réessayer de se connecter après l'inscription
                return $this->login($car_number, $car_type);
            } else {
                return false; // Inscription échouée
            }
        }
    }
}
?>
