<?php
class Cleanup_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour nettoyer les données de la base de données
    public function cleanup_database() {
        // Désactiver les contraintes de clé étrangère
        $this->db->query('SET foreign_key_checks = 0');

        // Vider les tables en conservant les informations fixes
        $this->db->query('DELETE FROM client');
        $this->db->query('DELETE FROM voiture');
        $this->db->query('DELETE FROM rendez_vous');
        $this->db->query('DELETE FROM devis');

        // Réactiver les contraintes de clé étrangère
        $this->db->query('SET foreign_key_checks = 1');
    }
}
?>
