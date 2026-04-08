<?php

namespace Model;

class MenuModel {
    public function getTousLesPlats(): array {
        $json = file_get_contents(__DIR__ . '/../../API/plats-utilisateurs.json');
        $data = json_decode($json, true);
        return $data['plats'];
    }
}