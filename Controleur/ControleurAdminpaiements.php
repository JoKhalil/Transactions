<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Paiement.php';

class ControleurAdminPaiements extends ControleurAdmin {

    private $paiement;

    public function __construct() {
        $this->paiement = new Paiement();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commentaires
    public function index() {
        $paiements = $this->paiement->getPaiements();
        $this->genererVue(['paiements' => $paiements]);
    }
  
// Confirmer la suppression d'un commentaire
    public function confirmer() {
        $id = $this->requete->getParametreId("ID");
        // Lire le commentaire à l'aide du modèle
        $paiement = $this->paiement->getCommentaire($id);
        $this->genererVue(['paiement' => $paiement]);
    }

// Supprimer un commentaire
    public function supprimer() {
        $id = $this->requete->getParametreId("ID");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $paiement = $this->paiement->getPaiement($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->paiement->deletePaiement($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Admincomptes', 'lire/' . $paiement['ID_Compte']);
    }

    // Rétablir un commentaire
//    public function retablir() {
//        $id = $this->requete->getParametreId("id");
//        // Lire le commentaire afin d'obtenir le id de l'article associé
//        $commentaire = $this->paiement->getCommentaire($id);
//        // Supprimer le commentaire à l'aide du modèle
//        $this->paiement->restoreCommentaire($id);
//        //Recharger la page pour mettre à jour la liste des commentaires associés
//        $this->rediriger('Adminarticles', 'lire/' . $commentaire['article_id']);
//    }
    
    // Modifier un article existant 
    //POUR LE PAIEMENT
    public function modifier() {
        $id = $this->requete->getParametreId('ID');
        $paiement = $this->compte->getPaiement($id);
        $this->genererVue(['paiement' => $paiement]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un paiement n'est pas permis en démonstration");
        } else {
            $paiement['ID'] = $this->requete->getParametreId('ID');
            $paiement['ID_Compte'] = $this->requete->getParametreId('ID_Compte');
            $paiement['Date'] = $this->requete->getParametre('Date');
            $paiement['Montant'] = $this->requete->getParametre('Montant');
            
            $this->paiement->modifierPaiement($paiement);
            $this->executerAction('index');
        }
    }

}
