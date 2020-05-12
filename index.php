<!DOCTYPE html>
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
    <body>
    
    <form action="compte_envoyer.php" method="post">
		<h2>Création d'un compte usager</h2>
        <p>
        <label for="TypeDeCompte">Type de compte</label> : 
		<select id="TypeDeCompte" name="TypeDeCompte">
			<option value="Cheque">Chèque</option>
			<option value="Epargne">Épargne</option>
			<option value="Credit">Crédit</option>
		</select>
		
        <label for="Balance">Balance du compte($)</label> :  <input type="number" name="Balance" id="Balance" min="0"/><br />
		<label for="NomCompte">Choisir un nom de compte</label> : <input type="text" name="NomCompte" id="NomCompte" />
        <label for="MotDePasse">Mot de passe</label> :  <input type="password" name="MotDePasse" id="MotDePasse" /><br />		
        <input type="hidden" name="ID_Utilisateur" value="1" />		
		<input type="submit" value="Envoyer" />
	</p>
    </form>
	<p><a href="a_propos.html">À propos</a></p>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers comptes
$reponse = $bdd->query('SELECT * FROM compte ORDER BY ID_Compte DESC LIMIT 0, 10');

// Affichage de chaque compte (toutes les données sont protégées par htmlspecialchars)
echo '<div class="scroll">';
while ($donnees = $reponse->fetch())
{
	$nomCompte = $donnees['NomCompte'];
	
	echo '<table class="table" border=1>';
		echo '<tr>';
			echo '<th>Nom du compte : ' . $nomCompte . '</th>';
		echo '</tr>';
	echo '<td>';
	echo '<p><a href="compte_modifier.php?ID_Compte=' . $donnees['ID_Compte'] . '">[modifier]</a><a href="compte_supprimer.php?ID_Compte=' . $donnees['ID_Compte'] . '">[supprimer]</a> 
		Compte <strong>  ' . 
		htmlspecialchars($donnees['TypeDeCompte']) . 
		'</strong> ' . 
		htmlspecialchars($donnees['Balance']) . '$</em>, mot de passe du compte : ' . 
		htmlspecialchars($donnees['MotDePasse']) . 
		'</p>';
		echo '</td>';
	echo '</table>';
	
}
echo '</div>';

$reponse->closeCursor();

?>
    </body>
</html>

