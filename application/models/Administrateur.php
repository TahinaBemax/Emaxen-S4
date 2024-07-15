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
}

