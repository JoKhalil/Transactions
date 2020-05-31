<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Compte.php';
require_once 'Modele/Paiement.php';

class ControleurComptes extends Controleur{
    private $compte;
    private $paiement;
    
    public function __construct() {
        $this->compte = new Compte();
        $this->paiement = new Paiement();
    }
    
    public function index() {
        $comptes = $this->compte->getComptes();
        $this->genererVue(['comptes' => $comptes]);
    }
    
    public function lire() {
        $idCompte = $this->requete->getParametre("id");
        $compte = $this->compte->getCompte($idCompte);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $paiements = $this->paiement->getPaiementsPublics($idCompte);
        $this->genererVue(['compte' => $compte, 'paiements' => $paiements, 'erreur' => $erreur]);
    }
//    public function compte($idCompte) {
//        $compte = $this->compte->getCompte($idCompte);
//        $paiements = $this->paiement->getPaiements($idCompte);
//        $vue = new Vue("Compte");
//        $vue->generer(array('compte' => $compte, 'paiements' => $paiements));
//    }
//    
//    public function comptes() {
//        $comptes = $this->compte->getComptes();
//        $vue = new Vue("Comptes");
//        $vue->generer(array('comptes' => $comptes));
//    }
//    
//    public function nouveauCompte($erreur) {
//        $vue = new Vue("AjouterCompte");
//        $vue->generer();
//
//    }
//    
//    public function ajouter($compte) {
//        $validation_courriel = filter_var($compte['EmailCompte'], FILTER_VALIDATE_EMAIL);
//        $validation_montant = filter_var($compte['Balance'], FILTER_VALIDATE_INT);
//
//        if(!$validation_courriel) {
//            header('Location: index.php?action=nouveauCompte' . '&erreur=courriel');
//        } else if(!$validation_montant) {
//            header('Location: index.php?action=nouveauCompte' . '&erreur=montant');
//        } else {
//            $this->compte->setCompte($compte);         
//        }
//        //header('Location: index.php');
//        $this->comptes();
//    }
    
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