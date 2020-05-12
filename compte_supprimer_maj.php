<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=transactions_02;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion du compte à l'aide d'une requête préparée
$req = $bdd->prepare('DELETE FROM compte WHERE ID_Compte = ?' );
$req->execute(array($_POST['ID_Compte']));


// Redirection du visiteur vers la page d'accueil
// En commentaire si déboguage
header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>
    <body>
		<h2>Supprimer un compte</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST);?>
            <input type="submit" value="Continuer">
			
        </form>
    </body>     
</html>