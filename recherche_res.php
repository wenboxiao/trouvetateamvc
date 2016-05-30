<?php
try
{
	$bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
	
	$pseudo=0;
}
else
{
	
$req = $bddu->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}
}
$req = $bddu->prepare('SELECT * FROM groupes WHERE ville_id = ?');
$req->execute(array($_GET['ville_id']));
	while ($donnees = $req->fetch() ){
		$_GET['nomgroupe']=$donnees['nomgroupe'];
		$idgroupe=$donnees['id_groupe'];
		$Sport=$donnees['id_sport'];
		$Club=$donnees['id_club'];
		$admin=$donnees['id_utilisateur'];
		$_GET['description']=$donnees['descriptiongroupe'];
		$_GET['nbmembre']=$donnees['nombremembres'];
		// POUR LE SIGNALEMENT
		$id_groupe=$donnees['id_groupe'];
		$type_objet=2;
		
		$requ = $bddu->prepare('SELECT nomsport FROM sports WHERE id_sport = ?');
		$requ->execute(array($Sport));
		if ($donnee = $requ->fetch()) {
			$_GET['nomsport']=$donnee['nomsport'];}
			$requ->closeCursor();
			
		$requo = $bddu->prepare('SELECT nomclub FROM clubs WHERE id_club = ?');
		$requo->execute(array($Club));
		if ($donnee = $requo->fetch()) {
			$_GET['nomclub']=$donnee['nomclub'];}
			$requo->closeCursor();
		
			$requa = $bddu->prepare('SELECT NomUtilisateur FROM utilisateurs WHERE id_utilisateur = ?');
			$requa->execute(array($admin));
			if ($donnee = $requa->fetch()) {
				$_GET['admin']=$donnee['NomUtilisateur'];}
				$requa->closeCursor();
			
		
		
		    
if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
	echo $donnees['nomgroupe'].'</br>'.
		'Sport:     '.$_GET['nomsport'].'</br>'.
			'Ville:     '.$_GET['nomville'].'</br>'.
			'Club:     '.$_GET['nomclub'].'</br>'.
			'Administrateur:     '.$_GET['admin'].'</br>'.
			'Description:     '.$_GET['description'].'</br>'.
			'Nombre de membres:     '.$_GET['nbmembre'].'</br>'.
		     '<form method="post"  action="Connexion.php">
 			
 					<button type="submit">Rejoindre!</button></form>'.'</br>';
	
}
else{
	echo $donnees['nomgroupe'].'</br>'.
			'Sport:     '.$_GET['nomsport'].'</br>'.
			'Ville:     '.$_GET['nomville'].'</br>'.
			'Club:     '.$_GET['nomclub'].'</br>'.
			'Administrateur:     '.$_GET['admin'].'</br>'.
			'Description:     '.$_GET['description'].'</br>'.
			'Nombre de membres:     '.$_GET['nbmembre'].'</br>'.
		     '<form method="post"  action="recherche_inscription_public.php">
 			<input  name="Groupe" type="hidden"  value="'.$idgroupe.'" >
 			<input  name="Utilisateur" type="hidden"  value="'.$pseudo.'" >
 		 	<input  name="Nbmembres" type="hidden"  value="'.$_GET['nbmembre'].'" >
 					<button type="submit">Rejoindre!</button></form>'.'</br>'.

 			// BOUTON DE SIGNALEMENT
 			'<form method="post" action="signalement_formulaire.php">
 			<input  name="id_objet" type="hidden"  value="'.$id_groupe.'" >
 			<input  name="nom_objet" type="hidden" value="'.$donnees['nomgroupe'].'">
 			<input  name="utilisateur_denonce" type="hidden"  value="'.$admin.'" >
 		 	<input  name="type_objet" type="hidden"  value="'.$type_objet.'" >
 					<button type="submit">Signaler un abus</button></form>'.'</br>';
		}
		    		
	}
	
	$req->closeCursor();
  
	?>