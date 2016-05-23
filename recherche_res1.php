<?php




try
{
	$bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req = $bddu->prepare('SELECT * FROM groupes WHERE id_sport = ?');
$req->execute(array($_GET['id_sport']));

$req = $bddu->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}

	while ($donnees = $req->fetch() ){
		$GET_['nomgroupe']=$donnees['nomgroupe'];
		$idgroupe=$donnees['id_groupe'];
		$Ville=$donnees['ville_id'];
		$Club=$donnees['id_club'];
		$admin=$donnees['id_utilisateur'];
		$_GET['description']=$donnees['descriptiongroupe'];
		$_GET['nbmembre']=$donnees['nombremembres'];
		
		$requ = $bddu->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id = ?');
		$requ->execute(array($Ville));
		if ($donnee = $requ->fetch()) {
			$_GET['nomville']=$donnee['ville_nom_reel'];}
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
 			
 					<button type="submit">Rejoindre!</button></form>'.'</br>';

	}
	$req->closeCursor();



  
	?>
