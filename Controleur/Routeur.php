<?php
require_once 'Controleur/ControleurPaiement.php';
require_once 'Controleur/ControleurCompte.php';
require_once 'Vue/Vue.php';

class Routeur {
    
    private $ctrlPaiement;
    private $ctrlCompte;
    
    public function __construct() {
        $this->ctrlPaiement = new ControleurPaiement();
        $this->ctrlCompte = new ControleurCompte();
    }
    
    public function routeurRequete() {
        try {
            if (isset($_GET['action'])) {
                $actionRequete = $_GET['action'];
                
                if($actionRequete == 'compte') {
                    if (isset($_GET['ID_Compte'])) {
                        $idCompte = intval($this->getParametre($_GET,'ID_Compte'));
                        
                        if($idCompte != 0) {
                            $this->ctrlCompte->compte($idCompte);
                        } else {
                            throw new Exception("Identifiant de compte non valide");
                        }
                    }
                } else if ($actionRequete == 'nouveauCompte') {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    $this->ctrlCompte->nouveauCompte($erreur);
                                   
                } else if ($actionRequete == 'ajouter') {
                    $idUtilisateur = intval($this->getParametre($_POST, 'ID_Utilisateur'));
                    if ($idUtilisateur != 0 ) {
                        $this->getParametre($_POST, 'TypeDeCompte');
                        $this->getParametre($_POST, 'NomCompte');
                        $this->getParametre($_POST, 'Balance');
                        $this->getParametre($_POST, 'MotDePasse');
                        $this->getParametre($_POST, 'EmailCompte');
                        $this->ctrlCompte->ajouter($_POST);  
                    } else {
                        throw new Exception("Identifiant d'utilisateur non valide");
                    }
                    
                } else if ($actionRequete == 'paiement') {
                    $idCompte = intval($this->getParametre($_POST, 'ID_Compte'));
                    if($idCompte != 0) {
                        $this->getParametre($_POST, 'Date');
                        $this->getParametre($_POST, 'Montant');
                        $this->ctrlPaiement->ajoutPaiement($_POST);
                    } else {
                        throw new Exception("Identifiant de compte non valide");
                    }
                    
                } else if ($actionRequete == 'supprimer') {                    
                    $id = intval($this->getParametre($_POST, 'ID'));
                    if ($id != 0) {
                        $this->ctrlPaiement->supprimerPaiement($id);
                    } else {
                        throw new Exception("Identifiant de paiement non valide");
                    }
                    
                } else if ($actionRequete == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'ID'));
                    if ($id != 0) {
                        $this->ctrlPaiement->confirmer($id);
                    } else {
                        throw new Exception("Identifiant de paiement non valide");
                    }
                    
                } else if ($actionRequete == 'modifier') {
                    $id = intval($this->getParametre($_GET, 'ID'));
                    if ($id != 0) {
                        $this->ctrlPaiement->modifier($id);
                    } else
                        throw new Exception("Identifiant d'article non valide");
                    
                } else if ($actionRequete == 'confirmerModifier') {
                    $id = intval($this->getParametre($_POST, 'ID'));
                    if ($id != 0) {
                        $idCompte = intval($this->getParametre($_POST, 'ID_Compte'));
                        if ($idCompte != 0) {
                            //Vérifier l'existence des paramètres
                            $this->getParametre($_POST, 'Date');
                            $this->getParametre($_POST, 'Montant');
                            
                            // Enregistrer l'article
                            $this->ctrlPaiement->MAJ($_POST);
                        } else
                            throw new Exception("Identifiant d'utilisateur non valide");
                    } else
                        throw new Exception("Identifiant d'article non valide");
                }
                else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlCompte->comptes();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }
    
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}