<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les comptes
function accueil() {
    $comptes = getComptes();
    require 'Vue/vueComptes.php';
}

// Affiche les détails sur un article
function compte($idCompte) {
    $compte = getCompte($idCompte);
    $paiements = getPaiements($idCompte);
    require 'Vue/vueCompte.php';
}

// Ajoute un commentaire à un article
function paiement($paiement) {
    
        // Ajouter le commentaire à l'aide du modèle
        setPaiement($paiement);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
        
    
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $paiement = getPaiement($id);
    require 'Vue/vueConfirmer.php';
}

function modifier($id) {
    $paiement = getPaiement($id);
    require 'Vue/vueModifier.php';
}

function confirmerModifier($postObject) {
    $paiement = getPaiement($postObject['ID']);
    
    modifierPaiement($postObject);
    
    header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
    
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'article associé
    $paiement = getPaiement($id);
    // Supprimer le commentaire à l'aide du modèle
    deletePaiement($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=compte&ID_Compte=' . $paiement['ID_Compte']);
}



// Enregistre le nouvel article et retourne à l'accueil

    


// recherche et retourne les types pour l'autocomplete
function quelsTypes($term) {
    echo searchType($term);
}
// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
