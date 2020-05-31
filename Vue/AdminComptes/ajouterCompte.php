<?php $this->titre = "Les comptes de Joseph - ajouter un compte"; ?>

<header>
    <h1 id="titreReponses">Ajouter un compte au nom de <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Admincomptes/nouveauCompte" method="post">
    <h2>Création d'un compte usager</h2>
        <p>
            <label for="TypeDeCompte">Type de compte</label> :
		<select id="TypeDeCompte" name="TypeDeCompte">
                    <option value="Cheque">Chèque</option>
                    <option value="Epargne">Épargne</option>
                    <option value="Credit">Crédit</option>
		</select><br />
		
            <label for="Balance">Balance du compte($)</label> :  <input type="number" name="Balance" id="Balance" min="0"/>
            <?= ($erreur == 'balance') ? '<span style="color : red;">Entrez un montant valide s.v.p.</span>' : '' ?><br />
            <label for="NomCompte">Choisir un nom de compte</label> : <input type="text" name="NomCompte" id="NomCompte" /><br />
            <label for="EmailCompte">Courriel du compte (xxx@yyy.zzz)</label> : <input type="text" name="EmailCompte" id="EmailCompte" />
            <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?><br />
            <label for="MotDePasse">Mot de passe</label> :  <input type="password" name="MotDePasse" id="MotDePasse" /><br />		
            <input type="hidden" name="ID_Utilisateur" value="1" />		
            <input type="submit" value="Envoyer" />
	</p>
</form>


