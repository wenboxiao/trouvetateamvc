<?php

try {
    include('TTT_BDD.php');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$reqz = $bdd -> query('SELECT * FROM formulaire_admin ORDER BY id_version_site DESC');
if($donnees = $reqz -> fetch()) {
	$nom_site=$donnees['nom_du_site'];
	$email=$donnees['email_de_contact'];
	$mentions=$donnees['mentions_legales'];
	$conditions=$donnees['conditions_d_utilisation'];
	if(isset($newlogo)) {
		$logo="http://localhost/trouvetateamvc/".$newlogo;
		echo '<p class="titrerouge"> Un nouveau logo à été mis en ligne </p>';
	}
	else {
		$logo=$donnees['logo'];
	}
	
}
$reqz->closeCursor();

?>