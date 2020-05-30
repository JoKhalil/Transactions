<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Compte.php';
require_once 'Modele/Paiement.php';

class ControleurAdminComptes extends ControleurAdmin {

    private $compte;
    private $paiement;

    public function __construct() {
        $this->compte = new Compte();
        $this->paiement = new Paiement();
    }

// Affiche la liste de tous les articles du blog
    public function index() {
        $comptes = $this->compte->getComptes();
        $this->genererVue(['comptes' => $comptes]);
    }

// Affiche les détails sur un article
    public function lire() {
        $idCompte = $this->requete->getParametreId("ID_Compte");
        $compte = $this->compte->getArticle($idCompte);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $paiements = $this->paiement->getPaiements($idCompte);
        $this->genererVue(['compte' => $compte, 'paiements' => $paiements, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("AjouterCompte");
        $this->genererVue();
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function nouveauCompte() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un compte n'est pas permis en démonstration");
        } else {
            $compte['ID_Utilisateur'] = $this->requete->getParametreId('ID_Utilisateur');
            $compte['NomCompte'] = $this->requete->getParametre('NomCompte');
            $compte['Balance'] = $this->requete->getParametre('Balance');
            $compte['MotDePasse'] = $this->requete->getParametre('MotDePasse');
            $compte['TypeDeCompte'] = $this->requete->getParametre('TypeDeCompte');
            $compte['EmailCompte'] = $this->requete->getParametre('EmailCompte');
            $this->compte->setCompte($compte);
            $this->executerAction('index');
        }
    }

// Modifier un article existant 
    //POUR LE PAIEMENT
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $article = $this->compte->getArticle($id);
        $this->genererVue(['article' => $article]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un article n'est pas permis en démonstration");
        } else {
            $article['id'] = $this->requete->getParametreId('id');
            $article['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $article['titre'] = $this->requete->getParametre('titre');
            $article['sous_titre'] = $this->requete->getParametre('sous_titre');
            $article['texte'] = $this->requete->getParametre('texte');
            $article['type'] = $this->requete->getParametre('type');
            $this->compte->updateArticle($article);
            $this->executerAction('index');
        }
    }

}
