<?php

require_once 'Modele/Paiement.php';

$testPaiement = new Paiement();
$paiements = $testPaiement->getPaiements(1);
echo '<h3>Test getPaiements : </h3>';
var_dump($paiements->rowCount());

$paiement = $testPaiement->getPaiement(57);
echo '<h3>Test getPaiement : </h3>';
var_dump($paiement);