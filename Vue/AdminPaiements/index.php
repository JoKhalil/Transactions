<?php $this->titre = "Les comptes de Joseph - Paiements" ?>

<header>
    <h1 id="titreReponses">Paiements des comptes de Joseph :</h1>
</header>
<?php
foreach ($paiements as $paiement):
    ?>
    
        <p><a href="AdminPaiements/confirmer/<?= $this->nettoyer($paiement['ID']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($paiement['Date']) ?>, <?= $this->nettoyer($paiement['Montant']) ?>
            
            <a href="Admincomptes/lire/<?= $this->nettoyer($paiement['ID_Compte']) ?>" >
                <i><?= $this->nettoyer($paiement['NomCompte']) ?></i></a></a>
        </p>

        <p class="efface"><a href="AdminPaiements/modifier/<?= $this->nettoyer($paiement['ID']) ?>" >
                [Modifier]</a>
            Paiement du <?= $this->nettoyer($paiement['Date']) ?>, de <?= $this->nettoyer($paiement['Montant']) ?>
        </p>
    
<?php endforeach; ?>