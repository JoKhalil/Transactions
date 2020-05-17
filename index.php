<?php

require 'Controleur/Controleur.php';
$action = $_GET['action'];
// Connexion à la base de données

try {
    if (isset($action)) {
        
        if ($action == 'compte'){
            if (isset($_GET['ID_Compte'])){
                $id = intval($_GET['ID_Compte']);
                if ($id != 0){
                    
                    compte($id);
                } else {
                    throw new Exception("Identifiant de compte incorrect");
                } 
            } else {
                throw new Exception("Aucun identifiant de compte");
            }
            
        } else if ($action == 'nouveauCompte') {
            $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
            nouveauCompte($erreur);
            
        } else if ($action == 'ajouter') {
            $compte = $_POST;
            ajouter($compte);
            
        } else if ($action == 'paiement') {
            if (isset($_POST['ID_Compte'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['ID_Compte']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $compte = getCompte($id);
                    // Récupérer les données du formulaire
                    $paiement = $_POST;                    
                    //Réaliser l'action commentaire du contrôleur
                    paiement($paiement);
                } else
                    throw new Exception("Identifiant de compte incorrect");
            } else
                throw new Exception("Aucun identifiant de compte");
            
        } else if ($action == 'supprimer') {
            if (isset($_POST['ID'])) {
                
                $id = intval($_POST['ID']);
                if ($id != 0) {
                    supprimer($id);
                } else {
                    throw new Exception("Identifiant de paiement incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de paiement");
            }
        } else if ($action == 'confirmer') {
            if (isset($_GET['ID'])) {
                
                $id = intval($_GET['ID']);
                if ($id != 0) {
                    confirmer($id);
                } else {
                    throw new Exception("Identifiant de paiement incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de paiement");
            }
        } else if ($action == 'modifier') {
            if (isset($_GET['ID'])) {
                
                $id = intval($_GET['ID']);
                if ($id != 0 ) {
                    modifier($id);
                } else {
                    throw new Exception("Identifiant de paiement incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de paiement");
            }
        } else if ($action == 'confirmerModifier') {
            if (isset($_POST['ID'])) {
                
                $id = intval($_POST['ID']);
                if ($id != 0){
                    confirmerModifier($_POST);
                } else {
                    throw new Exception("Identifiant de paiement incorrect");
                }
            } else {
               throw new Exception("Aucun identifiant de paiement");
            }
        }
    } else {
        accueil();
    }
    
} catch (Exception $ex) {
    erreur($e->getMessage());
}
?>