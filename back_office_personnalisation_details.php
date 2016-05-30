
<?php
	try
	{
		$bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	// Si on a modifié les droits d'admin
	if(isset($_POST['choix_privilege'])) {
		$reqa = $bddu ->prepare('UPDATE utilisateurs SET DroitAdmin = ? WHERE id_utilisateur = ?');
		$reqa ->execute(array(	$_POST['choix_privilege'],
								$_POST['id_utilisateur']
								));
		// Et si l'admin à passé son rôle à quelqun d'autre, il le perd et devient modérateur
		if($_POST['choix_privilege']==2) {
			$reqa ->execute(array(	1,
									$_POST['id_decideur']
									));
		}
		$reqa->closeCursor();
	}
	
	// Si on a modifié le bannissement
	$reqb = $bddu ->prepare('UPDATE utilisateurs SET is_banned = ? WHERE id_utilisateur = ?');
	if(isset($_POST['choix_ban'])) {
		$reqb ->execute(array(	$_POST['choix_ban'],
								$_POST['id_utilisateur']
								));
	}
	$reqb->closeCursor();

	$requ = $bddu->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
	$requ->execute(array($_SESSION['tttpseudo']));
	if ($donnees = $requ->fetch() ){
		$Pouvoir=$donnees['DroitAdmin'];
		$id_decideur=$donnees['id_utilisateur'];  
	}
	$requ->closeCursor();

	
	$req = $bddu->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
	$req->execute(array($_POST['id_utilisateur']));
	if ($donnees = $req->fetch() ){
		$Nom=$donnees['Nom'];
		$Prenom=$donnees['Prenom'];
		$NomUtilisateur=$donnees['NomUtilisateur'];
		$Privilege=$donnees['DroitAdmin'];
		$isBanned=$donnees['is_banned'];
	}

	// Preparation de modification de privilège
	$optionA="";
	$optionB="";
	$option1="";
	$option2="";
	$option3="";

	if($isBanned){
		$Banni="Oui";
		$optionA="selected"; }
	else {
		$Banni="Non";
		$optionB="selected"; }

	switch($Privilege) {
		case 0 :
			$Statut="Utilisateur";
			$option1="selected";
		break;
		case 1 :
			$Statut="Moderateur";
			$option2="selected";
		break;
		case 2 :
			$Statut="Administrateur";
			$option3="selected";
		break;
	}

	echo '<div class="space"></div><h2 class="titrevert"> Détails Utilisateur</h3>'.
		'<p class="textebleu2">'.
		'Utilisateur :     '.$NomUtilisateur.'</br>'.
		'Prenom :     '.$Prenom.'</br>'.
		'Nom :     '.$Nom.'</br>'.
		'Statut :     '.$Statut.'</br>'.
		'Utilisateur Banni :     '.$Banni.'</br>'.
		'</p>';
	
	if($Pouvoir>$Privilege) {
		echo'<p>
			<form method="post"  action="back_office_detail_utilisateur.php">
				<select name="choix_ban" id="choix_ban">
					<option value=1 '.$optionA.'> Utilisateur Banni </option>
					<option value=0 '.$optionB.'> Utilisateur non Banni </option>
				</select> ';
		if($Pouvoir==2) {
		echo	'<select name="choix_privilege" id="choix_privilege">
					<option value=0 '.$option1.'> Utilisateur </option>
					<option value=1 '.$option2.'> Modérateur </option>
					<option value=2 '.$option3.'> Administrateur </option>
				</select>
				<input  name="id_decideur" type="hidden"  value="'.$id_decideur.'"> ';
		}
		echo	'<input  name="id_utilisateur" type="hidden"  value="'.$_POST['id_utilisateur'].'">
				<button type="submit">Modifier</button>
			</form>'.'</br>'.
			'</p>';
	}
	

?>