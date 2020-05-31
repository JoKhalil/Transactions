<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Paiement.php';

class ControleurPaiements extends Controleur{
    private $paiement;
    
    
    public function __construct() {
        $this->paiement = new Paiement();
        
    }
    
    public function index() {
        $paiements = $this->paiement->getPaiementsPublics();
        $this->genererVue(['paiements' => $paiements]);
    }

// Ajoute un commentaire à un article
    public function ajouter() {
        $paiement['ID_Compte'] = $this->requete->getParametreId("ID_Compte");
                
            //don't forget validations 
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un paiement n'est pas permis en démonstration");
            } else {
                $paiement['Date'] = $this->requete->getParametre('Date');
                $paiement['Montant'] = $this->requete->getParametre('Montant');
                
                // Ajouter le commentaire à l'aide du modèle
                $this->paiement->setPaiement($paiement);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des commentaires associés
            $this->rediriger('Comptes', 'lire/' . $paiement['ID_Compte']);        
        }
    }
//    public function compte($idCompte) {
//        $compte = $this->compte->getCompte($idCompte);
//        $paiements = $this->paiement->getPaiements($idCompte);
//        $vue = new Vue("Compte");
//        $vue->generer(array('compte' => $compte, 'paiements' => $paiements));
//    }
//    
//    public function ajoutPaiement($paiement) {
//        
//        $this->paiement->setPaiement($paiement);
//        //throw new Exception($paiement['ID_Compte']);
//        header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
//        
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
//        $vue->generer(array('paiement' => $paiement));
//    }
//    
//    public function modifier($id) {
//        $paiement = $this->paiement->getPaiement($id);
//        $vue = new Vue("Modifier");
//        $vue->generer(array('paiement' => $paiement));
//    }
//    
//    public function MAJ($paiement) {
//        //$paiement = getPaiement($postObject['ID']);
//        $this->paiement->modifierPaiement($paiement);
//        header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
//    }
//}
//
//
