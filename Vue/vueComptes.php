<?php $this->titre = 'Les comptes de Joseph'; ?> 


<?php ob_start(); ?>
<a href="index.php?action=nouveauCompte">
        <h2>Ajouter un compte</h2>
    </a>
	<p><a href="Vue/a_propos.html">À propos</a></p>
<?php foreach ($comptes as $compte):?>

    <article>
        <header>
            <a href="<?= "index.php?action=compte&ID_Compte=" . $compte['ID_Compte'] ?>">
                <h1 class="titreCompte"><?= $compte['NomCompte'] ?></h1>
            </a>
            <h3 class=""><?= $compte['TypeDeCompte'] ?></h3>
            compte #<?= $compte['ID_Compte'] ?><br />
            courriel : <?= $compte['EmailCompte'] ?>
        </header>
        <p>balance : <?= $compte['Balance'] ?></p>
        <p>mot de passe : <?= $compte['MotDePasse'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>