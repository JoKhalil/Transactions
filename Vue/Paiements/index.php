<?php $this->titre = "Le Blogue du prof - Commentaires" ?>

<header>
    <h1 id="titreReponses">Commentaires du Blogue du prof :</h1>
</header>
<?php
foreach ($paiements as $paiement):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($paiement['date']) ?>, <?= $this->nettoyer($paiement['auteur']) ?> dit <?= $this->nettoyer($paiement['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($paiement['titre']) ?></strong><br/>
            <?= $this->nettoyer($paiement['texte']) ?><br />
            <!-- Vers Adminarticles si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Articles/lire/<?= $this->nettoyer($paiement['article_id']) ?>" >
                [écrit pour l'article <i><?= $this->nettoyer($paiement['titreArticle']) ?></i>]</a>
        </p>
<?php endforeach; ?>