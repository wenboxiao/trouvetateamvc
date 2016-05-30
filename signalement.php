
<?php session_start(); ?>
<?php 

try
{
$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (!isset($_SESSION['tttpseudo'])) {
	include("Connexion.php");
}
else {
	$reqa = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
	$reqa->execute(array($_SESSION['tttpseudo']));
	if ($donnee = $reqa->fetch()) {
		$id_delateur=$donnee['id_utilisateur'];}
		$reqa->closeCursor();
	
	$req1 = $bdd->prepare('INSERT INTO signalement_abus(motif_signalement, type_objet, id_delateur, id_utilisateur_denonce, id_objet) VALUES(:motif, :type_objet, :id_delateur, :id_utilisateur_denonce, :id_objet)');

	$req1->execute(array('motif' => $_POST['rapportsignalement'],
						'type_objet' => $_POST['type_objet'],
						'id_delateur' => $id_delateur,
						'id_utilisateur_denonce' => $_POST['utilisateur_denonce'],
						'id_objet' => $_POST['id_objet']
						));
	$req1->closeCursor();
	include("signalement_termine.php");
}
?>