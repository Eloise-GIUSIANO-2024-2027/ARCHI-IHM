<?php

namespace Model;

/**
 * Modèle responsable de la récupération des plats du menu.
 */
class MenuModel {

    /**
     * Récupère l'ensemble des plats depuis l'API REST.
     *
     * @return array Liste des plats, chaque entrée contenant les clés
     *               'nom', 'description' et 'prix'.
     */
    public function getTousLesPlats(): array {
        $ch = curl_init('http://localhost:3003/plats');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($json, true);

        if (!is_array($data)) {
            return [];
        }

        return $data;
    }
}