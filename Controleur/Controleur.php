<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les comptes
function accueil() {
    $comptes = getComptes();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un article
function compte($idCompte) {
    $compte = getArticle($idCompte);
    //$commentaires = getCommentaires($idCompte);
    require 'Vue/vueArticle.php';
}

// Ajoute un commentaire à un article
function commentaire($commentaire) {
    $validation_courriel = filter_var($commentaire['auteur'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        // Ajouter le commentaire à l'aide du modèle
        setCommentaire($commentaire);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=article&id=' . $commentaire['article_id']);
    } else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=article&id=' . $commentaire['article_id'] . '&erreur=courriel');
    }
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $commentaire = getCommentaire($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'article associé
    $commentaire = getCommentaire($id);
    // Supprimer le commentaire à l'aide du modèle
    deleteCommentaire($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=article&id=' . $commentaire['article_id']);
}

function nouveauCompte($erreur) {
    require 'Vue/vueAjouterCompte.php';
//    header('Location: Vue/vueAjouterCompte.php');
}

// Enregistre le nouvel article et retourne à l'accueil
function ajouter($compte) {
    $validation_courriel = filter_var($compte['EmailCompte'], FILTER_VALIDATE_EMAIL);
    $validation_montant = filter_var($compte['Balance'], FILTER_VALIDATE_INT);
//    if($validation_courriel){
//        setCompte($compte);
//        header('Location: index.php');
//    } else {
//        header('Location: index.php?action=nouveauCompte' . $compte['ID_Compte'] . '&erreur=courriel');
//    }
//    if(!$validation_montant){
//        header('Location: index.php?action=nouveauCompte' . $compte['ID_Compte'] . '&erreur=montant');
//    }
    if(!$validation_courriel) {
        header('Location: index.php?action=nouveauCompte' . '&erreur=courriel');
    } else if(!$validation_montant) {
        header('Location: index.php?action=nouveauCompte' . '&erreur=montant');
    } else {
        setCompte($compte);
        header('Location: index.php');
    }
    
}

// recherche et retourne les types pour l'autocomplete
function quelsTypes($term) {
    echo searchType($term);
}
// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
