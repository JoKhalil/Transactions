<?php
require_once 'Modele/Paiement.php';
require_once 'Vue/Vue.php';

class ControleurPaiement {
    private $paiement;
    private $compte;
    
    public function __construct() {
        $this->paiement = new Paiement();
        $this->compte = new Compte();
    }
    
    public function compte($idCompte) {
        $compte = $this->compte->getCompte($idCompte);
        $paiements = $this->paiement->getPaiements($idCompte);
        $vue = new Vue("Compte");
        $vue->generer(array('compte' => $compte, 'paiements' => $paiements));
    }
    
    public function ajoutPaiement($paiement) {
        
        $this->paiement->setPaiement($paiement);
       // throw new Exception($paiement['ID_Compte']);
        
        $this->ctrlCompte->compte($paiement);
    }
    
    public function supprimerPaiement($id){
        $paiement = $this->paiement->getPaiement($id);
        
        $this->paiement->deletePaiement($id);
        
        header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
    }
    
    public function confirmer($id) {
        // Lire le commentaire à l'aide du modèle
        $paiement = $this->paiement->getPaiement($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('paiements' => $paiements));
    }
    
    public function modifier($id) {
        $paiement = $this->paiement->getPaiement($id);
        $vue = new Vue("Modifier");
        $vue->generer(array('paiement' => $paiement));
    }
    
    public function MAJ($postObject) {
        $paiement = getPaiement($postObject['ID']);
        $this->paiement->modifierPaiement($paiement);
        $this->comptes();
    }
}


