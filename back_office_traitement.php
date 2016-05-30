
<?php
try
{
	$bddy = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$req = $bddy->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ? OR Prenom = ? OR Nom = ?');
$req->execute(array($_POST['Utilisateur'],
					$_POST['Utilisateur'],
					$_POST['Utilisateur'],
					));

$verif=0;
while ($donnees = $req->fetch() ){
	$verif=1;
	$Nom=$donnees['Nom'];
	$Prenom=$donnees['Prenom'];
	$NomUtilisateur=$donnees['NomUtilisateur'];
	$id_utilisateur=$donnees['id_utilisateur'];
	$Privilege=$donnees['DroitAdmin'];

	switch($Privilege) {
		case 0 :
			$Statut="Utilisateur";
		break;
		case 1 :
			$Statut="Moderateur";
		break;
		case 2 :
			$Statut="Administrateur";
		break;
	}

	echo 'Utilisateur :     '.$NomUtilisateur.'</br>'.
		'Prenom :     '.$Prenom.'</br>'.
		'Nom :     '.$Nom.'</br>'.                         
        'Statut :     '.$Statut.'</br>'.
	     
	    '<form method="post"  action="back_office_detail_utilisateur.php">
			<input  name="id_utilisateur" type="hidden"  value="'.$id_utilisateur.'">
			<button type="submit">Plus de détails</button>
		</form>'.'</br>';
}
if($verif==0) {
	echo 'Aucun résultat trouvé';
}
$req->closeCursor();
?>