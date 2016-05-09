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



	while ($donnees = $req->fetch() ){
		$GET_['nomgroupe']=$donnees['nomgroupe'];
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
		     '<a  href="recherche_inscription.php"><input type="submit"  value="Rejoindre!"  class=titrebleu2 ></a>'.'</br>'.'</br>'.'</br>';

	}
	$req->closeCursor();



  
	?>
