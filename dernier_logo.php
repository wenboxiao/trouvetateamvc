<?php

try {
    include('TTT_BDD.php');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$reqz = $bdd -> query('SELECT * FROM formulaire_admin ORDER BY id_version_site DESC');
if($donnees = $reqz -> fetch()) {
	
	echo '"'.$donnees['logo'].'"';
}
$reqz->closeCursor();

?>