<?php
try
{
	include('TTT_BDD.php');
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
	
$req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}
}
$req = $bdd->prepare('SELECT * FROM groupes WHERE ville_id = ?');
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
		
		$requ = $bdd->prepare('SELECT nomsport FROM sports WHERE id_sport = ?');
		$requ->execute(array($Sport));
		if ($donnee = $requ->fetch()) {
			$_GET['nomsport']=$donnee['nomsport'];}
			$requ->closeCursor();
			
		$requo = $bdd->prepare('SELECT nomclub FROM clubs WHERE id_club = ?');
		$requo->execute(array($Club));
		if ($donnee = $requo->fetch()) {
			$_GET['nomclub']=$donnee['nomclub'];}
			$requo->closeCursor();
		
			$requa = $bdd->prepare('SELECT NomUtilisateur FROM utilisateurs WHERE id_utilisateur = ?');
			$requa->execute(array($admin));
			if ($donnee = $requa->fetch()) {
				$_GET['admin']=$donnee['NomUtilisateur'];}
				$requa->closeCursor();
			
		
		
		    
if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
	echo htmlspecialchars($donnees['nomgroupe']).'</br>'.
		'Sport:     '.htmlspecialchars($_GET['nomsport']).'</br>'.
			'Ville:     '.htmlspecialchars($_GET['nomville']).'</br>'.
			'Club:     '.htmlspecialchars($_GET['nomclub']).'</br>'.
			'Administrateur:     '.htmlspecialchars($_GET['admin']).'</br>'.
			'Description:     '.htmlspecialchars($_GET['description']).'</br>'.
			'Nombre de membres:     '.htmlspecialchars($_GET['nbmembre']).'</br>'.
		     '<form method="post"  action="Connexion.php">
 			
 					<button type="submit">Rejoindre!</button></form>'.'</br>';
	
}
else{
	echo htmlspecialchars($donnees['nomgroupe']).'</br>'.
			'Sport:     '.htmlspecialchars($_GET['nomsport']).'</br>'.
			'Ville:     '.htmlspecialchars($_GET['nomville']).'</br>'.
			'Club:     '.htmlspecialchars($_GET['nomclub']).'</br>'.
			'Administrateur:     '.htmlspecialchars($_GET['admin']).'</br>'.
			'Description:     '.htmlspecialchars($_GET['description']).'</br>'.
			'Nombre de membres:     '.htmlspecialchars($_GET['nbmembre']).'</br>'.
		     '<form method="post"  action="recherche_inscription_public.php">
 			<input  name="Groupe" type="hidden"  value="'.htmlspecialchars($idgroupe).'" >
 			<input  name="Utilisateur" type="hidden"  value="'.htmlspecialchars($pseudo).'" >
 		 	<input  name="Nbmembres" type="hidden"  value="'.htmlspecialchars($_GET['nbmembre']).'" >
 					<button type="submit">Rejoindre!</button></form>'.'</br>'.
 			// BOUTON DE SIGNALEMENT
 			'<form method="post" action="signalement_formulaire.php">
 			<input  name="id_objet" type="hidden"  value="'.htmlspecialchars($id_groupe).'" >
 			<input  name="nom_objet" type="hidden" value="'.htmlspecialchars($donnees['nomgroupe']).'">
 			<input  name="utilisateur_denonce" type="hidden"  value="'.htmlspecialchars($admin).'" >
 		 	<input  name="type_objet" type="hidden"  value="'.htmlspecialchars($type_objet).'" >
 					<button type="submit">Signaler un abus</button></form>'.'</br>';
		}
		    		
	}
	
	$req->closeCursor();
  
	?>