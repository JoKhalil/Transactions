<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les comptes, triés par identifiant décroissant
function getArticles() {
    $bdd = getBdd();
    $comptes = $bdd->query('SELECT * FROM compte ORDER BY ID_Compte DESC LIMIT 0, 10');
    return $comptes;
}

// Renvoie la liste de tous les comptes, triés par identifiant décroissant
function setArticle($compteTemp) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO compte (NomCompte, TypeDeCompte, ID_Utilisateur, Balance, MotDePasse) VALUES(?, ?, ?, ?, ?)');
    $result->execute(array($compteTemp[NomCompte], $compteTemp[TypeDeCompte], $compteTemp[ID_Utilisateur], $compteTemp[Balance], $compteTemp[MotDePasse]));
    return $result;
}

// Renvoie les informations sur un compte
function getArticle($idCompte) {
    $bdd = getBdd();
    $compte = $bdd->prepare('select * from compte'
            . ' where ID_Compte=?');
    $compte->execute(array($idCompte));
    if ($compte->rowCount() == 1)
        return $compte->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
}

// Renvoie la liste des commentaires associés à un article
function getCommentaires($idPaiements) {
    $bdd = getBdd();
    $paiements = $bdd->prepare('select * from paiements'
            . ' where ID=?');
    $paiements->execute(array($idPaiements));
    return $paiements;
}

// Renvoie un commentaire spécifique
function getCommentaire($id) {
    $bdd = getBdd();
    $commentaire = $bdd->prepare('select * from Commentaires'
            . ' where id = ?');
    $commentaire->execute(array($id));
    if ($commentaire->rowCount() == 1)
        return $commentaire->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
    return $commentaire;
}

// Supprime un compte
function deleteCommentaire($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM compte'
            . ' WHERE ID_Compte = ?');
    $result->execute(array($id));
    return $result;
}

// Ajoute un commentaire associés à un article
function setCommentaire($commentaire) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO commentaires (article_id, date, auteur, titre, texte, prive) VALUES(?, NOW(), ?, ?, ?, ?)');
    $result->execute(array($commentaire['article_id'], $commentaire['auteur'], $commentaire['titre'], $commentaire['texte'], $commentaire['prive']));
    return $result;
}

// Recherche les types répondant à l'autocomplete
function searchType($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['type'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}
