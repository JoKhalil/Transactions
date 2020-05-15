<?php $titre = "Les comptes de Joseph - " . $compte['NomCompte']; ?>

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
<?php foreach ($paiements as $paiement): ?>
<p><a href="index.php?action=confirmer&ID=<?= $paiement['ID'] ?>" >
        [Supprimer]
    </a>
    <?= $paiement['date'] ?>, <?= $paiement['Montant'] ?> 
    </p>
<?php endforeach; ?>

<!--<form action="index.php?action=commentaire" method="post">
    <h2>Ajouter un commentaire</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre commentaire ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="article_id" value="<?= $compte['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>-->

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

