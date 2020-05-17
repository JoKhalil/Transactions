<?php
require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {
    private $compte;
    
    public function __construct() {
        $this->compte = new Compte();
    }
    
    public function accueil() {
        $comptes = $this->compte->getComptes();
        $vue = new Vue("Accueil");
        $vue->generer(array('comptes' => $comptes));
                
    }
}