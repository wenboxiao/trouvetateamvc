<?php

try {
    $bddz = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['id_signalement_supprime'])) {
    $req = $bddz -> prepare('DELETE FROM signalement_abus WHERE id_signalement = ?');
    $req -> execute(array($_POST['id_signalement_supprime']));
    echo '<p class="titrerouge">Le message de signalement a bien été retiré de la base de données. </p>';
}

$reqz = $bddz->query('SELECT * FROM signalement_abus');
while ($donnees = $reqz->fetch() ){
    $id_delateur=$donnees['id_delateur'];
    $id_utilisateur_denonce=$donnees['id_utilisateur_denonce'];
    $id_objet=$donnees['id_objet'];
    $motif=$donnees['motif_signalement'];

    // On récupère le nom du délateur
    $reqx= $bddz -> prepare('SELECT * FROM utilisateurs WHERE id_utilisateur=?');
	$reqx->execute(array($id_delateur
						));
	if($don = $reqx->fetch() ){
		$nom_delateur=$don['Nom'];
		$prenom_delateur=$don['Prenom'];
	}
	$reqx->closeCursor();

	// Et celui du dénoncé
	$reqy= $bddz -> prepare('SELECT * FROM utilisateurs WHERE id_utilisateur=?');
	$reqy->execute(array($id_utilisateur_denonce
						));
	if($information = $reqy->fetch() ){
		$nom_utilisateur_denonce=$information['Nom'];
		$prenom_utilisateur_denonce=$information['Prenom'];
	}
	$reqy->closeCursor();

	// Puis on adapte aux différents types d'objets
    switch($donnees['type_objet']) {
			case 1 :
				$type="de l'utilisateur";
			break;
			case 2 :
				$reqa= $bddz -> prepare('SELECT * FROM groupes WHERE id_groupe=?');
				$reqa->execute(array($id_objet
									));
				if($info = $reqa->fetch() ){
					$nomobjet=$info['nomgroupe'];
				}
				$reqa->closeCursor();
				$type="du groupe";
			break;
			case 3 :
				$reqa= $bddz -> prepare('SELECT * FROM clubs WHERE id_club=?');
				$reqa->execute(array($id_objet
									));
				if($info = $reqa->fetch() ){
					$nomobjet=$info['nomclub'];
				}
				$reqa->closeCursor();
				$type="du club";
			break;
			case 4 :
				$reqa= $bddz -> prepare('SELECT * FROM sujets_du_forum WHERE id_sujetforum=?');
				$reqa->execute(array($id_objet
									));
				if($info = $reqa->fetch() ){
					$nomobjet=$info['titresujet'];
				}
				$reqa->closeCursor();
				$type="du sujet du forum";
			break;
			case 5 :
				$reqa= $bddz -> prepare('SELECT * FROM posts_du_forum WHERE id_post=?');
				$reqa->execute(array($id_objet
									));
				if($info = $reqa->fetch() ){
					$nomobjet=$info['contenupost'];
				}
				$reqa->closeCursor();
				$type="du post du forum";
			break;
			case 6 :
				$reqa= $bddz -> prepare('SELECT * FROM photos WHERE id_photo=?');
				$reqa->execute(array($id_objet
									));
				if($info = $reqa->fetch() ){
					$nomobjet=$info['urlphoto'];
				}
				$reqa->closeCursor();
				$type="de la photo";
			break;
	}

    echo 'Signalement émis par : '.$prenom_delateur.' '.$nom_delateur.'<br/> 
    	A propos '.$type.' : '.$nomobjet.'<br/>
    	L\'utilisateur qui en est responsable est : '.$prenom_utilisateur_denonce.' '.$nom_utilisateur_denonce.'<br/>
    	Il a été signalé pour le motif suivant :<br/>
    	'.$motif.' <br/>
    	<form method="post" action="back_office_signal_details.php">
    		<input name="id_signalement_details" type="hidden" value="'.$donnees['id_signalement'].'">
    		<button type="submit">Plus de détails</button>
    	</form>
    	<form method="post" action="back_office_signal_apercu.php">
    		<input name="id_signalement_supprime" type="hidden" value="'.$donnees['id_signalement'].'">
    		<button type="submit">Supprimer</button>
    	</form>';
}
$reqz->closeCursor();

?>