<?php

namespace Model;

/**
 * Modèle responsable de la récupération des plats du menu.
 */
class MenuModel {

    /**
     * Récupère l'ensemble des plats depuis le fichier JSON de l'API.
     *
     * @return array Liste des plats, chaque entrée contenant les clés
     *               'nom', 'description' et 'prix'.
     */
    public function getTousLesPlats(): array {
        $json = file_get_contents(__DIR__ . '/../../API/plats-utilisateurs.json');
        $data = json_decode($json, true);
        return $data['plats'];
    }
}