<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCompte.php';
require_once 'Vue/Vue.php';

class Routeur {
    
    private $ctrlAccueil;
    private $ctrlCompte;
    
    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
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
                } else if ($actionRequete == 'paiement') {
                        $idCompte = $this->getParametre($_POST, 'ID_Compte');
                        $date = $this->getParametre($_POST, 'Date');
                        $montant = $this->getParametre($_POST, 'Montant');
                        $this->ctrlCompte->ajoutPaiement($idCompte, $date, $montant);
                        
                } else if ($actionRequete == 'nouveauCompte') {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    $this->ctrlCompte->nouveauCompte($erreur);
                                   
                } else if ($actionRequete == 'ajouter') {
                    //$compte = $_POST;
                    $this->ctrlCompte->ajouter($compte);  
                }
                else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlAccueil->accueil();
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