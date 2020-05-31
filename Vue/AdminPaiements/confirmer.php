<?php $this->titre = "Effacer - " . $this->nettoyer($paiement['Date']); ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($paiement['Date']) ?>, <?= $this->nettoyer($paiement['Montant']) ?> 
        </p>
    </header>
</article>

<form action="AdminPaiements/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($paiement['ID']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Admincomptes/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($paiement['ID_Compte']) ?>" />
    <input type="submit" value="Annuler" />
</form>


