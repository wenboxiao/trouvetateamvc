<?php




try
{
	$bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req = $bddu->prepare('SELECT * FROM groupes WHERE ville_id = ?');
$req->execute(array($_GET['ville_id']));


	while ($donnees = $req->fetch() ){
		$GET_['nomgroupe']=$donnees['nomgroupe'];
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
		     '<a  href="recherche_inscription.php"><input type="submit"  value="Rejoindre!"  class=titrebleu2 ></a>'.'</br>'.'</br>'.'</br>';

	}
	$req->closeCursor();



  
	?>
