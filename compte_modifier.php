<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un compte</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>


        <?php
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'root',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération du message à modifier
        $reponse = $bdd->query('SELECT * FROM compte WHERE ID_Compte = ' . $_GET['ID_Compte']);
		

// Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $reponse->fetch();
        $reponse->closeCursor();		
        ?>


        <form action="compte_mise_a_jour.php" method="post">
			<h2>Modifier un compte</h2>
            <p>
				<label for="TypeDeCompte">Type de compte</label> : 
				<select id="TypeDeCompte" name="TypeDeCompte" value="<?php echo htmlspecialchars($donnees['TypeDeCompte']);?>">
					<option value="Cheque"<?=$donnees['TypeDeCompte'] == 'Chèque' ? 'selected="selected"' : ''?>>Chèque</option>
					<option value="Epargne"<?=$donnees['TypeDeCompte'] == 'Épargne' ? 'selected="selected"' : ''?>>Épargne</option>
					<option value="Credit"<?=$donnees['TypeDeCompte'] == 'Crédit' ? 'selected="selected"' : ''?>>Crédit</option>
				</select>
					
                <label for="Balance">Balance du compte($)</label> : <input type="number" name="Balance" id="Balance" value="<?php echo htmlspecialchars($donnees['Balance']); ?>" /><br />
                <label for="NomCompte">Choisir un nom de compte</label> :  <input type="text" name="NomCompte" id="NomCompte" value="<?php echo htmlspecialchars($donnees['NomCompte']); ?>" />
				<label for="MotDePasse">Mot de passe</label> :  <input type="password" name="MotDePasse" id="MotDePasse" value="<?php echo htmlspecialchars($donnees['MotDePasse']); ?>" /><br />				
                <input type="submit" value="Modifier" />
				<input type="hidden" name="ID_Compte" value="<?php echo $donnees['ID_Compte']; ?>" />
				<input type="button" value="Annuler" onclick="history.back()"/>				
            </p>
        </form>
		
    </body>
</html>



