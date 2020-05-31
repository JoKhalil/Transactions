<?php $this->titre = "Les comptes de Joseph - " . $this->nettoyer($compte['NomCompte']); ?>

<article>
    <header>
        <h1 class="titreArticle"><?= $this->nettoyer($compte['NomCompte']) ?></h1>
        <p><?= $this->nettoyer($compte['Balance']) ?></p><br /> <?= $this->nettoyer($compte['MotDePasse']) ?>
        <h3 class=""><?= $this->nettoyer($compte['TypeDeCompte']) ?></h3>
    </header>
    <p><?= $this->nettoyer($compte['EmailCompte']) ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Paiements de <?= $this->nettoyer($compte['NomCompte']) ?> :</h1>
</header>
<?= ($paiements->rowCount() == 0) ? '<p class="message">Pas encore de paiements pour ce compte.</p>' : '' ?>
<?php
foreach ($paiements as $paiement):
    ?>
        <p>
            <?= $this->nettoyer($paiement['Date']) ?>, <?= $this->nettoyer($paiement['Montant']) ?> dit :<br/>            
        </p>
<?php endforeach; ?>

<form action="Paiements/ajouter" method="post">
    <h2>Création d'un paiement</h2>
        <p>
            <label for="Date">Date du paiement</label> : <input type="date" name="Date" id="Date" /><br />
            <label for="Montant">Montant du paiement</label> : <input type="number" name="Montant" id="Montant"/>
            <input type="hidden" name="ID_Compte" value="<?= $this->nettoyer($compte['ID_Compte'])?>" />
<!--            <input type="hidden" name="ID" value="1" />-->
            <input type="submit" value="Envoyer" />
	</p>
</form>


