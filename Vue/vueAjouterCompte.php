<?php $titre = "Les comptes de Joseph - "; //. $compte['NomCompte']; ?>

<?php ob_start(); ?>
<header>
    <h1>Ajouter un compte</h1>
</header>
   
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

<?php $contenu = ob_get_clean(); ?>