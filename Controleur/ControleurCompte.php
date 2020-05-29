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
    
    public function comptes() {
        $comptes = $this->compte->getComptes();
        $vue = new Vue("Comptes");
        $vue->generer(array('comptes' => $comptes));
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
        }
        //header('Location: index.php');
        $this->comptes();
    }
    
//    public function ajoutPaiement($paiement) {
//        $this->paiement->setPaiement($paiement);
//        header('Location: index.php?action=compte&ID_Compte=' . $paiement[ID_Compte]);
//        //$vue = new Vue("Compte");
//        //$vue->generer();
//        //$this->compte($idCompte);
//    }
//    
//    public function supprimerPaiement($id){
//        $paiement = $this->paiement->getPaiement($id);
//        
//        $this->paiement->deletePaiement($id);
//        
//        header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
//    }
//    
//    public function confirmer($id) {
//        // Lire le commentaire à l'aide du modèle
//        $paiement = $this->paiement->getPaiement($id);
//        $vue = new Vue("Confirmer");
//        $vue->generer(array('paiements' => $paiements));
//    }
//    
//    public function modifier($id) {
//        $paiement = $this->paiement->getPaiement($id);
//        $vue = new Vue("Modifier");
//        $vue->generer(array('paiement' => $paiement));
//    }
//    
//    public function MAJ($postObject) {
//        $paiement = getPaiement($postObject['ID']);
//        $this->paiement->modifierPaiement($paiement);
//        $this->comptes();
//    }
}