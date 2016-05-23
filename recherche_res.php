<?php




try
{
	$bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$req = $bddu->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}

$req = $bddu->prepare('SELECT * FROM groupes WHERE ville_id = ?');
$req->execute(array($_GET['ville_id']));


	while ($donnees = $req->fetch() ){
		$GET_['nomgroupe']=$donnees['nomgroupe'];
		$idgroupe=$donnees['id_groupe'];
		$Sport=$donnees['id_sport'];
		$Club=$donnees['id_club'];
		$admin=$donnees['id_utilisateur'];
		$_GET['description']=$donnees['descriptiongroupe'];
		$_GET['nbmembre']=$donnees['nombremembres'];
		
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
