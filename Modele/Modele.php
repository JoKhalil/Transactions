<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les comptes, triés par identifiant décroissant
function getComptes() {
    $bdd = getBdd();
    $comptes = $bdd->query('SELECT * FROM compte ORDER BY ID_Compte DESC LIMIT 0, 10');
    return $comptes;
}

// Renvoie la liste de tous les comptes, triés par identifiant décroissant
function setCompte($compteTemp) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO compte (NomCompte, TypeDeCompte, ID_Utilisateur, Balance, MotDePasse, EmailCompte) VALUES(?, ?, ?, ?, ?, ?)');
    $result->execute(array($compteTemp[NomCompte], $compteTemp[TypeDeCompte], $compteTemp[ID_Utilisateur], $compteTemp[Balance], $compteTemp[MotDePasse], $compteTemp[EmailCompte]));
    return $result;
}

// Renvoie les informations sur un compte
function getCompte($idCompte) {
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
function getPaiements($idPaiements) {
    $bdd = getBdd();
    $paiements = $bdd->prepare('select * from paiement'
            . ' where ID_Compte=?');
    $paiements->execute(array($idPaiements));
    return $paiements;
}

// Renvoie un commentaire spécifique
function getPaiement($id) {
    $bdd = getBdd();
    $paiement = $bdd->prepare('select * from paiement'
            . ' where ID = ?');
    $paiement->execute(array($id));
    if ($paiement->rowCount() == 1)
        return $paiement->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
    return $paiement;
}

// Supprime un compte
function deletePaiement($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM paiement'
            . ' WHERE ID = ?');
    $result->execute(array($id));
    return $result;
}

function modifierPaiement($post) {
    $bdd = getBdd();
    $result = $bdd->prepare('UPDATE paiement SET Date = ?, Montant = ? WHERE ID = ?');
//    $result->execute(array($id));
    $result->execute(array($post['Date'], $post['Montant'], $post['ID']));
    return $result;
}

// Ajoute un commentaire associés à un article
function setPaiement($paiement) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO paiement (ID_Compte, Date, Montant) VALUES(?, ?, ?)');
    $result->execute(array($paiement['ID_Compte'], $paiement['Date'], $paiement['Montant']));
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
