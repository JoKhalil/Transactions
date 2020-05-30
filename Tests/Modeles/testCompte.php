<?php

require_once 'Modele/Compte.php';

$testCompte = new Compte;
$comptes = $testCompte->getComptes();
echo '<h3>Test getComptes : </h3>';
var_dump($comptes->rowCount());

echo '<h3>Test getCompte : </h3>';
$compte =  $testCompte->getCompte(42);
var_dump($compte);