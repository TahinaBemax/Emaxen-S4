<?php
if (!function_exists('verifierDateValide')) {
    /**
     * @throws Exception
     */
    function verifierDateValide($date) {
        if (trim($date) === '') throw new Exception("Le champ date est obligatoire");
        // Essayer de créer un objet DateTime à partir de la date fournie
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);

        // Vérifier si $dateTime est un objet DateTime et que la date correspond au format 'Y-m-d'
        if ($dateTime !== false && $dateTime->format('Y-m-d') === $date) {
            // Date au format 'Y-m-d' valide
            $dateFournie = $dateTime;
        } else {
            // Essayer de créer un objet DateTime à partir de la date fournie sans format spécifique
            $dateTime = new DateTime($date);

            // Vérifier si $dateTime est un objet DateTime
            if ($dateTime !== false) {
                // Date valide
                $dateFournie = $dateTime;
            } else {
                // La date n'est pas valide
                throw new Exception("Date invalide");
            }
        }

        // Comparaison avec la date actuelle

        $dateActuelle = new DateTime();
        // Comparaison
        if ($dateFournie >= $dateActuelle) {
            return true; // Date valide et supérieure ou égale à la date actuelle
        } else {
            throw new Exception("Date inférieure à la date actuelle");
        }
    }
}

if (!function_exists('verifierHeureValide')) {
    function verifierHeureValide($heure)
    {
        // Vérifier si l'heure n'est pas vide
        if (empty($heure) || trim($heure) === '') {
            throw new Exception("Le champ heure  est obligatoire");
        }

        // Vérifier si l'heure est valide en utilisant strtotime()
        $timestamp = strtotime($heure);

        if ($timestamp === false) {
            throw new Exception("Heure invalide");
        } else {
            return true; // L'heure est valide
        }
    }
}

// Fonction pour vérifier si un fichier est un fichier CSV


