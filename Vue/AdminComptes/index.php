<?php $this->titre = 'Les comptes de Joseph'; ?>

<a href="Admincomptes/ajouterCompte">
    <h2 class="titreArticle">Ajouter un compte</h2>
</a>
<?php foreach ($comptes as $compte):
    ?>

    <article>
        <header>
            <a href="Admincomptes/lire/<?= $this->nettoyer($compte['ID_Compte']) ?>">
                <h1 class="titreArticle"><?= $this->nettoyer($compte['NomCompte']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($compte['Balance']) ?></strong><br>
            par <?= $this->nettoyer($compte['MotDePasse']) ?><br>
            <p><?= $this->nettoyer($compte['TypeDeCompte']) ?></p><br>
            <p><?= $this->nettoyer($compte['EmailCompte']) ?></p><br>
<!--POUR PAIEMENT            <a href="Admincomptes/modifier/<?= $this->nettoyer($compte['ID_Compte']) ?>"> [modifier le compte]</a>-->
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
