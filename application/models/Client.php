<?php
<<<<<<< HEAD


class Client extends CI_Model
{
    public function isNumeroVoitureExist($car_number) {
        $query = "SELECT * FROM v_voiture WHERE numero = %s";
        $query = sprintf($query, $this->db->escape($car_number));

        $result = $this->db->query($query);

        return $result->num_rows() >= 1;
=======
class Car_model extends CI_Model {

    public function __construct() {
        $this->load->database();
>>>>>>> a53d754b74f3cd5ec1a7c1ea86d3d0783746e579
    }

    // Fonction pour vérifier le login
    public function login($car_number, $car_type) {
<<<<<<< HEAD
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

=======
        $query = "SELECT voiture.idVoiture, voiture.numero, type_voiture.type
                  FROM voiture
                  JOIN type_voiture ON voiture.idTypeVoiture = type_voiture.idTypeVoiture
                  WHERE voiture.numero = %s AND type_voiture.type = %s";
        $query = sprintf($query, $this->db->escape($car_number), $this->db->escape($car_type));
        
        $result = $this->db->query($query);
        
>>>>>>> a53d754b74f3cd5ec1a7c1ea86d3d0783746e579
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    // Fonction pour enregistrer un nouveau client et une voiture
    public function register($car_number, $car_type) {
        // Vérifier si le type de voiture existe
<<<<<<< HEAD
        $query = "SELECT idTypeVoiture FROM type_voiture WHERE idTypeVoiture = %s";
        $query = sprintf($query, $this->db->escape($car_type));
        $result = $this->db->query($query);

        if ($result->num_rows() == 0) {
            throw new Exception("Le type du véhicule n'existe pas");
=======
        $query = "SELECT idTypeVoiture FROM type_voiture WHERE type = %s";
        $query = sprintf($query, $this->db->escape($car_type));
        $result = $this->db->query($query);
        
        if ($result->num_rows() == 0) {
            // Si le type de voiture n'existe pas, retourner une erreur
            return -1;
>>>>>>> a53d754b74f3cd5ec1a7c1ea86d3d0783746e579
        }

        $type_voiture = $result->row_array();

        // Insérer un nouveau client
<<<<<<< HEAD
        $this->db->insert('client', ['idClient' => null]);
=======
        $client_data = array('password' => password_hash($car_number, PASSWORD_DEFAULT));
        $this->db->insert('client', $client_data);
>>>>>>> a53d754b74f3cd5ec1a7c1ea86d3d0783746e579
        $client_id = $this->db->insert_id();

        // Insérer la voiture
        $car_data = array(
            'numero' => $car_number,
            'idClient' => $client_id,
            'idTypeVoiture' => $type_voiture['idTypeVoiture']
        );

        return $this->db->insert('voiture', $car_data);
    }
<<<<<<< HEAD
}
=======

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
>>>>>>> a53d754b74f3cd5ec1a7c1ea86d3d0783746e579
