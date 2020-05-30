<?php

//require_once 'Modele/Modele.php';
require_once 'Framework/Modele.php';

class Compte extends Modele {
    
    public function getComptes() {
        $sql = 'select c.ID_Compte, c.ID_Utilisateur, c.NomCompte, c.Balance,'
                . ' c.MotDePasse, c.TypeDeCompte, c.EmailCompte, u.nom, u.identifiant'
                . ' from compte c inner join utilisateurs u on c.ID_Utilisateur = u.id'
                . ' order by id desc';
        $comptes = $this->executerRequete($sql);
        return $comptes;
    }
    
    public function getCompte($idCompte) {
        $sql = 'select c.ID_Compte, c.ID_Utilisateur, c.NomCompte, c.Balance,'
                . ' c.MotDePasse, c.TypeDeCompte, c.EmailCompte, u.nom'
                . ' from compte c inner join utilisateurs u on c.ID_Utilisateur = u.id'
                . ' where c.ID_Compte=?';
        
        $compte = $this->executerRequete($sql, array($idCompte));
        
        if ($compte->rowCount() == 1) {
            return $compte->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
        }
    }
    
    public function setCompte($compte) {
        $sql = 'INSERT INTO compte (NomCompte, TypeDeCompte, ID_Utilisateur, Balance, MotDePasse, EmailCompte) VALUES(?, ?, ?, ?, ?, ?)';
        
        $result = $this->executerRequete($sql, array($compte['NomCompte'], $compte['TypeDeCompte'], 
            $compte['ID_Utilisateur'], $compte['Balance'], $compte['MotDePasse'], $compte['EmailCompte']));
        
        return $result;
    }
}