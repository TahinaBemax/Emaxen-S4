<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrateur extends CI_Model
{
    // Fonction pour vérifier le login
    public function login($login, $password)
    {
        $query = "SELECT * FROM admin WHERE login = %s AND password = %s";
        $query = sprintf($query, $this->db->escape($login), $this->db->escape($password));

        $result = $this->db->query($query);

        return $result->num_rows() === 1;
    }
    public function admin($login, $password)
    {
        $query = "SELECT * FROM admin WHERE login = %s AND password = %s";
        $query = sprintf($query, $this->db->escape($login), $this->db->escape($password));

        $result = $this->db->query($query);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    /**
     * @throws Exception
     */
    public function deleteAllData(){
        try {
            // Désactiver les contraintes de clé étrangère
            $this->db->query('SET foreign_key_checks = 0');// Vider les tables en conservant les informations fixes
            $this->db->query('DELETE FROM client');
            $this->db->query('DELETE FROM voiture');
            $this->db->query('DELETE FROM rendez_vous');
            $this->db->query('DELETE FROM devis');
            $this->db->query('DELETE FROM type_voiture');
            $this->db->query('DELETE FROM type_service');// Réactiver les contraintes de clé étrangère
            $this->db->query('SET foreign_key_checks = 1');

        } catch (Exception $e) {
            throw $e;
        } finally {
            $this->db->query('SET foreign_key_checks = 1');
        }
        return true;
    }
}

