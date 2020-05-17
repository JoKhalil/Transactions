<?php

require_once 'Modele/Modele.php';

class Compte extends Modele {
    
    public function getComptes() {
        $sql = 'SELECT * FROM compte ORDER BY ID_Compte DESC LIMIT 0, 10';
        $comptes = $this->executerRequete($sql);
        return $comptes;
    }
    
    public function getCompte($idCompte) {
        $sql = 'select * from compte'
                . ' where ID_Compte=?';
        $compte = $this->executerRequete($sql, array($idCompte));
      
        if ($compte->rowCount() == 1)
            return $compte->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
    }
    
    public function setCompte($compteTemp) {
        $sql = 'INSERT INTO compte (NomCompte, TypeDeCompte, ID_Utilisateur, Balance, MotDePasse, EmailCompte) VALUES(?, ?, ?, ?, ?, ?)';
        
        $result = $this->executerRequete($sql, array($compteTemp[NomCompte], $compteTemp[TypeDeCompte], 
            $compteTemp[ID_Utilisateur], $compteTemp[Balance], $compteTemp[MotDePasse], $compteTemp[EmailCompte]));
        
        return $result;
    }
}