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
    
    public function nouveauCompte($erreur) {
        $vue = new Vue("AjouterCompte");
        $vue->generer();
//    header('Location: Vue/vueAjouterCompte.php');
    }
    
    public function ajouter($compte) {
        $validation_courriel = filter_var($compte['EmailCompte'], FILTER_VALIDATE_EMAIL);
        $validation_montant = filter_var($compte['Balance'], FILTER_VALIDATE_INT);

        if(!$validation_courriel) {
            header('Location: index.php?action=nouveauCompte' . '&erreur=courriel');
        } else if(!$validation_montant) {
            header('Location: index.php?action=nouveauCompte' . '&erreur=montant');
        } else {
            $this->compte->setCompte($compte);
            header('Location: index.php');
        }
    }
    
    public function ajoutPaiement($idCompte, $Date, $Montant) {
        $this->paiement->setPaiement($idCompte, $Date, $Montant);
        $this->compte($idCompte);
    }
}