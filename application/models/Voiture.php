<?php

class Voiture extends CI_Model
{
    public function getAll(){
        $voiture[] = array('idTypeVoiture' => 1, 'type' => '4x4');
        $voiture[] = array('idTypeVoiture' => 2, 'type' => 'Légére');
        $voiture[] = array('idTypeVoiture' => 3, 'type' => 'Utilitaire');
        return $voiture;
    }
}