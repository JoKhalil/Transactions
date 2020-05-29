<?php
require_once 'Modele/Paiement.php';
require_once 'Vue/Vue.php';

class ControleurPaiement {
    
    public function ajoutPaiement($paiement) {
        $this->paiement->setPaiement($paiement);
        header('Location: index.php?action=compte&ID_Compte=' . $paiement[ID_Compte]);
        //$vue = new Vue("Compte");
        //$vue->generer();
        //$this->compte($idCompte);
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


