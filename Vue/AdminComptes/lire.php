<?php $this->titre = "Les comptes de Joseph - " . $this->nettoyer($compte['NomCompte']); ?>

<article>
    <header>
        <h1 class="titreArticle"><?= $this->nettoyer($compte['NomCompte']) ?></h1>
        <p><?= $this->nettoyer($compte['Balance']) ?></p><br /> 
        <?= $this->nettoyer($compte['MotDePasse']) ?>
        <h3 class=""><?= $this->nettoyer($compte['TypeDeCompte']) ?></h3>
    </header>
    <p><?= $this->nettoyer($compte['EmailCompte']) ?></p>
    
</article>
<hr />
<header>
    <h1 id="titreReponses">Paiements de <?= $this->nettoyer($compte['NomCompte']) ?> :</h1>
</header>
<?= ($paiements->rowCount() == 0) ? '<p class="message">Pas encore de commentaires pour cet article.</p>' : '' ?>
<?php
foreach ($paiements as $paiement):
    ?>
    
        <a href="AdminPaiements/confirmer/<?= $this->nettoyer($paiement['ID']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($paiement['Date']) ?>, <?= $this->nettoyer($paiement['Montant']) ?> 
        
        
    
        <a href="AdminPaiements/modifier/<?= $this->nettoyer($paiement['ID']) ?>" >
            [Modifier]</a><br />
            
        
    
<?php endforeach; ?>



