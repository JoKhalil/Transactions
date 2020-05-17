<?php
require_once 'Modele/Compte.php';
require_once 'Modele/Paiement.php';
require_once 'Vue/Vue.php';

class ControleurCompte {
    private $compte;
    private $paiement;
    
    public function __construct() {
        $this->compte = new Compte();
        $this->paiement = new Paiement();
    }
    
    public function compte($idCompte) {
        $compte = $this->compte->getCompte($idCompte);
        $paiements = $this->paiement->getPaiements($idCompte);
        $vue = new Vue("Compte");
        $vue->generer(array('compte' => $compte, 'paiements' => $paiements));
    }
}