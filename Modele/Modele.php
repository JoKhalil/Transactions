<?php
abstract class Modele {
    
    private $bdd;
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }
    
    private function getBdd() {
        if ($this->bdd == null) {
        
            $this->bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $this->bdd;
        }
    }
}