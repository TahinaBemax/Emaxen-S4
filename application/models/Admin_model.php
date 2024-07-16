<?php
class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour vérifier le nom d'utilisateur et le mot de passe
    public function authenticate($login, $password) {
        $query = $this->db->get_where('admin', array('login' => $login));

        if ($query->num_rows() == 1) {
            $admin = $query->row_array();

            // Vérifier le mot de passe
            if (password_verify($password, $admin['password'])) {
                return true;
            }
        }

        return false;
    }
}
?>
