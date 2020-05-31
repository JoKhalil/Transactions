<?php $this->titre = 'Les comptes de Joseph'; ?>

<?php foreach ($comptes as $compte):
    ?>
    <article>
        <header>
            <a href="Comptes/lire/<?= $this->nettoyer($compte['ID_Compte']) ?>">
                <h1 class="titreArticle"><?= $this->nettoyer($compte['NomCompte']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($compte['Balance']) ?></strong><br>
            par <?= $this->nettoyer($compte['nom']) ?><br>
            <p><?= $this->nettoyer($compte['TypeDeCompte']) ?></p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
