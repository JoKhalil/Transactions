<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCompte.php';
require_once 'Vue/Vue.php';

class Routeur {
    
    private $ctrlAccueil;
    private $ctrlCompte;
    
    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil;
        $this->ctrlCompte = new ControleurCompte;
    }
    
    public function routeurRequete() {
        try {
            if (isset($_GET['action'])) {
                $actionRequete = $_GET['action'];
                
                if(actionRequete == 'compte') {
                    if (isset($_GET['ID_Compte'])) {
                        $idCompte = intval($_GET['ID_Compte']);
                        
                        if($idCompte != 0) {
                            $this->ctrlCompte->compte($idCompte);
                        } else {
                            throw new Exception("Identifiant de compte non valide");
                        }
                    } else {
                        throw new Exception("Identifiant de compte non défini");
                    }
                } else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $ex) {
            $this->erreur($e->getMessage());
        }
    }
    
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}