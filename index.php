<?php

require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routeurRequete();


//try {
//    if (isset($_GET['action'])) {
//        $actions = $_GET['action'];
//        if ($actions == 'compte'){
//            if (isset($_GET['ID_Compte'])){
//                $id = intval($_GET['ID_Compte']);
//                if ($id != 0){
//                    
//                    compte($id);
//                } else {
//                    throw new Exception("Identifiant de compte incorrect");
//                } 
//            } else {
//                throw new Exception("Aucun identifiant de compte");
//            }
//            
//        } else if ($actions == 'nouveauCompte') {
//            $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
//            nouveauCompte($erreur);
//            
//        } else if ($actions == 'ajouter') {
//            $compte = $_POST;
//            ajouter($compte);
//            
//        } else if ($actions == 'paiement') {
//            if (isset($_POST['ID_Compte'])) {
//                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
//                $id = intval($_POST['ID_Compte']);
//                if ($id != 0) {
//                    // vérifier si l'article existe;
//                    $compte = getCompte($id);
//                    // Récupérer les données du formulaire
//                    $paiement = $_POST;                    
//                    //Réaliser l'action commentaire du contrôleur
//                    paiement($paiement);
//                } else
//                    throw new Exception("Identifiant de compte incorrect");
//            } else
//                throw new Exception("Aucun identifiant de compte");
//            
//        } else if ($actions == 'supprimer') {
//            if (isset($_POST['ID'])) {
//                
//                $id = intval($_POST['ID']);
//                if ($id != 0) {
//                    supprimer($id);
//                } else {
//                    throw new Exception("Identifiant de paiement incorrect");
//                }
//            } else {
//                throw new Exception("Aucun identifiant de paiement");
//            }
//        } else if ($actions == 'confirmer') {
//            if (isset($_GET['ID'])) {
//                
//                $id = intval($_GET['ID']);
//                if ($id != 0) {
//                    confirmer($id);
//                } else {
//                    throw new Exception("Identifiant de paiement incorrect");
//                }
//            } else {
//                throw new Exception("Aucun identifiant de paiement");
//            }
//        } else if ($actions == 'modifier') {
//            if (isset($_GET['ID'])) {
//                
//                $id = intval($_GET['ID']);
//                if ($id != 0 ) {
//                    modifier($id);
//                } else {
//                    throw new Exception("Identifiant de paiement incorrect");
//                }
//            } else {
//                throw new Exception("Aucun identifiant de paiement");
//            }
//        } else if ($actions == 'confirmerModifier') {
//            if (isset($_POST['ID'])) {
//                
//                $id = intval($_POST['ID']);
//                if ($id != 0){
//                    confirmerModifier($_POST);
//                } else {
//                    throw new Exception("Identifiant de paiement incorrect");
//                }
//            } else {
//               throw new Exception("Aucun identifiant de paiement");
//            }
//        }
//    } else {
//        accueil();
//    }
//    
//} catch (Exception $e) {
//    erreur($e->getMessage());
//}
