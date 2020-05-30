<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleCompte') {
        require 'Tests/Modeles/testCompte.php';
    } else if ($_GET['test'] == 'modelePaiement') {
        require 'Tests/Modeles/testPaiement.php';
    } else if ($_GET['test'] == 'vueComptes') {
        require 'Tests/Vues/testVueComptes.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleCompte">Compte</a>
    </li>
    <li>
        <a href="tests.php?test=modelePaiement">Paiement</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueComptes">Comptes</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
