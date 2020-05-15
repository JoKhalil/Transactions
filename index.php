<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Création d'un compte</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
	.scroll
	{
		width: 217px;
		height: 377px;
		overflow: scroll;
		background-color: lightblue;
	}
	.table
	{
		width:200px;
	}
    </style>
    -->

<?php

require 'Controleur/Controleur.php';
$action = $_GET['action'];
// Connexion à la base de données

try {
    if (isset($action)) {
        
        if ($action == 'compte'){
            if (isset($_GET['ID_Compte'])){
                $id = intval($_GET['ID_Compte']);
                if ($id != 0){
                    
                    compte($id);
                } else {
                    throw new Exception("Identifiant de compte incorrect");
                } 
            } else {
                throw new Exception("Aucun identifiant de compte");
            }
        } else if ($action == 'nouveauCompte') {
            $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
            nouveauCompte($erreur);
        } else if ($action == 'ajouter') {
            $compte = $_POST;
            ajouter($compte);
        }
    } else {
        accueil();
    }
    
} catch (Exception $ex) {
    erreur($e->getMessage());
}

// Récupération des 10 derniers comptes
//$reponse = $bdd->query('SELECT * FROM compte ORDER BY ID_Compte DESC LIMIT 0, 10');
//
//// Affichage de chaque compte (toutes les données sont protégées par htmlspecialchars)
//echo '<div class="scroll">';
//while ($donnees = $reponse->fetch())
//{
//	$nomCompte = $donnees['NomCompte'];
//	
//	echo '<table class="table" border=1>';
//		echo '<tr>';
//			echo '<th>Nom du compte : ' . $nomCompte . '</th>';
//		echo '</tr>';
//	echo '<td>';
//	echo '<p><a href="compte_modifier.php?ID_Compte=' . $donnees['ID_Compte'] . '">[modifier]</a><a href="compte_supprimer.php?ID_Compte=' . $donnees['ID_Compte'] . '">[supprimer]</a> 
//		Compte <strong>  ' . 
//		htmlspecialchars($donnees['TypeDeCompte']) . 
//		'</strong> ' . 
//		htmlspecialchars($donnees['Balance']) . '$</em>, mot de passe du compte : ' . 
//		htmlspecialchars($donnees['MotDePasse']) . 
//		'</p>';
//		echo '</td>';
//	echo '</table>';
//	
//}
//echo '</div>';
//
//$reponse->closeCursor();

?>