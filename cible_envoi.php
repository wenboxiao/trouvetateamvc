<?php session_start(); ?>
<?php
if (isset($_SESSION['tttpseudo']) AND $_SESSION['tttpseudo']!="") {

}else{
	header('Location: Erreur.php');
}
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
	// Testons si le fichier n'est pas trop gros
	if ($_FILES['monfichier']['size'] <= 1000000)
	{
		// Testons si l'extension est autorisée
		$infosfichier = pathinfo($_FILES['monfichier']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		if (in_array($extension_upload, $extensions_autorisees))
		{	
			$adresse='Photo_profil/' . basename($_FILES['monfichier']['name']);
			include('TTT_BDD.php');
			// On peut valider le fichier et le stocker définitivement
			$a=TRUE;
			$c=1;
			while ($a){
			$reqp = $bdd->prepare('SELECT UrlPhoto FROM utilisateurs WHERE UrlPhoto = ?');
			$reqp->execute(array($adresse));
			if($donnees = $reqp->fetch()){
				$reqp->closeCursor();
				$adresse='Photo_profil/'.$c.basename($_FILES['monfichier']['name']);
				$c=$c+1;
			}
			else {$a=False;
			}
			}
			$reqq = $bdd->prepare('SELECT UrlPhoto FROM utilisateurs WHERE NomUtilisateur = ?');
			$reqq->execute(array($_SESSION['tttpseudo']));
			if($donnees = $reqq->fetch()){
				$reqq->closeCursor();
				unlink($donnees['UrlPhoto']);
			}
			move_uploaded_file($_FILES['monfichier']['tmp_name'], $adresse);
			$reqp = $bdd->prepare('UPDATE utilisateurs SET UrlPhoto = :UrlPhoto WHERE NomUtilisateur = :NomUtilisateur');
			$reqp->execute(array(
					'UrlPhoto' => $adresse,
					'NomUtilisateur' => $_SESSION['tttpseudo']
			));
			header('Location: Profil.php');
			$reqp->closeCursor();
		}else {
			include('Barrec');
			echo "Ce type de fichier n'est pas accepté";
			include('Barrer');
		}
	}else {
			include('Barrec');
			echo "le fichier est trop volumineux";
			include('Barrer');
}
}else {		include('Barrec');
	echo "Il y a eu une erreur dans l'envoi du fichier";}
			include('Barrer');
?>