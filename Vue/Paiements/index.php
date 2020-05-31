<?php $this->titre = "Les comptes de Joseph - Paiements" ?>

<header>
    <h1 id="titreReponses">Paiements des comptes de Joseph :</h1>
</header>
<?php
foreach ($paiements as $paiement):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($paiement['Date']) ?>, <?= $this->nettoyer($paiement['Montant']) ?> 
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Comptes/lire/<?= $this->nettoyer($paiement['ID_Compte']) ?>" >
                [paiement pour <i><?= $this->nettoyer($paiement['NomCompte']) ?></i>]</a>
        </p>
<?php endforeach; ?>