<?php $this->titre = "Supprimer - " //. $paiement['titre']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        Date : <?= $paiement['Date'] ?>, Montant : <?= $paiement['Montant'] ?>$<br/>
               
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="ID" value="<?= $paiement['ID'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="compte" />
    <input type="hidden" name="ID_Compte" value="<?= $paiement['ID_Compte'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

