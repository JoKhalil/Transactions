<?php

require_once 'Vue/Vue.php';
$paiement = [
        'ID' => '999',
        'ID_Compte' => '111',
        'Date' => '2017-12-31',
        'Montant' => '123123512'
    ];
$vue = new Vue('Confirmer');
$vue->generer(['paiement' => $paiement]);

