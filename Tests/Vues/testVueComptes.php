<?php

require_once 'Vue/Vue.php';
$comptes = [
    [
        'ID_Compte' => '991',
        'NomCompte' => 'Test 1',
        'Balance' => '1321',
        'ID_Utilisateur' => '111',
        'MotDePasse' => 'test mot de passe',
        'TypeDeCompte' => 'Chèque',
        'EmailCompte' => 'test@hotmail.com'
    ],
    [
        'ID_Compte' => '10000',
        'NomCompte' => 'Test 2',
        'Balance' => '13211265124',
        'ID_Utilisateur' => '11111111',
        'MotDePasse' => 'tEst mot de passe 2',
        'TypeDeCompte' => 'Épargne',
        'EmailCompte' => 'test2@hotmail.com'
    ]
];
$vue = new Vue('Comptes');
$vue->generer(['comptes' => $comptes]);

