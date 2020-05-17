<?php $titre= 'Modifier'?>
<?php ob_start(); ?>

<form action="index.php?action=confirmerModifier" method="post">
	<h2>Modification d'un paiement</h2>
        <p>
            <label for="Date">Date du paiement</label> : <input type="date" name="Date" id="Date" value="<?php echo htmlspecialchars($paiement['Date']); ?>" /><br />
            <label for="Montant">Montant du paiement</label> : <input type="number" name="Montant" id="Montant" value="<?php echo htmlspecialchars($paiement['Montant']); ?>"/>
            <!--id="Montant"-->
            <input type="hidden" name="ID_Compte" value="<?=$paiement['ID_Compte']?>" /><br />
            <input type="hidden" name="ID" value="<?=$paiement['ID']?>" />
            <input type="submit" value="Envoyer" />
            <input type="button" value="Annuler" onclick="history.back()"/>
	</p>
    </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>


