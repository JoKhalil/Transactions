<?php $this->titre = "Les comptes de Joseph - " //. $compte['NomCompte']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreCompte"><?= $compte['NomCompte'] ?></h1>
    
        <h3 class="">Compte : <?= $compte['TypeDeCompte'] ?></h3>
    </header>
    <p>Courriel du compte : <?= $compte['EmailCompte'] ?></p>
    <p>Balance : <?= $compte['Balance'] ?></p>
    <p>Mot de passe : <?= $compte['MotDePasse']?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Paiements du compte <?= $compte['NomCompte'] ?> :</h1>
</header>
<?= ($paiements->rowCount() == 0) ? '<p>Aucun paiement</p>' : '' ?>
<?php foreach ($paiements as $paiement): ?>
<!--never enters the foreach-->
<article>
<p> <a href="index.php?action=confirmer&ID=<?= $paiement['ID'] ?>">
        [Supprimer]
    </a>
    <a href="index.php?action=modifier&ID=<?= $paiement['ID'] ?>">
        [Modifier]
    </a>
    <?= $paiement['Date'] ?>, <?= $paiement['Montant'] ?> 
    </p>
</article>
<?php endforeach; ?>
    <form action="index.php?action=paiement" method="post">
	<h2>Création d'un paiement</h2>
        <p>
            <label for="Date">Date du paiement</label> : <input type="date" name="Date" id="Date" /><br />
            <label for="Montant">Montant du paiement</label> : <input type="number" name="Montant" id="Montant"/>
            <input type="hidden" name="ID_Compte" value="<?=$compte['ID_Compte']?>" />
<!--            <input type="hidden" name="ID" value="1" />-->
            <input type="submit" value="Envoyer" />
	</p>
    </form>


<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

