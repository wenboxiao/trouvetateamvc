<?php
$verification="";
// On verifie la connexion de l'utilisateur
if ((isset($_SESSION['tttpseudo']))&&(isset($_SESSION['tttpass']))) {
	try {
		include('TTT_BDD.php');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage()); 
	}

	$reqx = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
	$reqx->execute(array($_SESSION['tttpseudo']));
	if ($donnees = $reqx->fetch() ){
		$Droits=$donnees['DroitAdmin'];  
	}
	// Et on verifie qu'il est bien administrateur
	if($Droits==2) {
		$verification="OK";
	}

}
if($verification!="OK") {
    header('Location: http://localhost/trouvetateamvc/back_office_pas_d_acces_admin.php');
    exit();
}
?>