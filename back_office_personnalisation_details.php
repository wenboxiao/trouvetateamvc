
<?php
	try
	{
		include('TTT_BDD.php');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	// Si on a modifié les droits d'admin

	if(isset($_POST['choix_privilege'])) {
		// On verifie que les droits d'admin ne sont pas donné à un banni
		if(($_POST['choix_privilege']!=2) OR ($_POST['choix_ban']!=1)) {
			$reqa = $bdd ->prepare('UPDATE utilisateurs SET DroitAdmin = ? WHERE id_utilisateur = ?');
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
		else {
			$pasDAminBanni=1;
		}
	}
	
	// Si on a modifié le bannissement
	$reqb = $bdd ->prepare('UPDATE utilisateurs SET is_banned = ? WHERE id_utilisateur = ?');
	if(isset($_POST['choix_ban'])) {
		$reqb ->execute(array(	$_POST['choix_ban'],
								$_POST['id_utilisateur']
								));
	}
	$reqb->closeCursor();

	$requ = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
	$requ->execute(array($_SESSION['tttpseudo']));
	if ($donnees = $requ->fetch() ){
		$Pouvoir=$donnees['DroitAdmin'];
		$id_decideur=$donnees['id_utilisateur'];  
	}
	$requ->closeCursor();

	
	$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
	$req->execute(array($_POST['id_utilisateur']));
	if ($donnees = $req->fetch() ){
		$Nom=$donnees['Nom'];
		$Prenom=$donnees['Prenom'];
		$NomUtilisateur=$donnees['NomUtilisateur'];
		$Privilege=$donnees['DroitAdmin'];
		$isBanned=$donnees['is_banned'];
	}
	$req->closeCursor();

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
		'<p class="centrerco">'.
		'Utilisateur :     '.$NomUtilisateur.'</br>'.
		'Prenom :     '.$Prenom.'</br>'.
		'Nom :     '.$Nom.'</br>'.
		'Statut :     '.$Statut.'</br>'.
		'Utilisateur Banni :     '.$Banni.'</br>'.
		'</p>';
	
	if($Pouvoir>$Privilege) {
		echo'<p>
			<form method="post"  action="back_office_detail_utilisateur.php" class="titrevert">
				<select name="choix_ban" id="choix_ban">
					<option value=1 '.htmlspecialchars($optionA).'> Utilisateur Banni </option>
					<option value=0 '.htmlspecialchars($optionB).'> Utilisateur non Banni </option>
				</select> ';
		if ($Pouvoir==2) {
		echo	'<select name="choix_privilege" id="choix_privilege">
					<option value=0 '.htmlspecialchars($option1).'> Utilisateur </option>
					<option value=1 '.htmlspecialchars($option2).'> Modérateur </option>
					<option value=2 '.htmlspecialchars($option3).'> Administrateur </option>
				</select>
				<input  name="id_decideur" type="hidden"  value="'.htmlspecialchars($id_decideur).'">';
		}
		echo	'<input  name="id_utilisateur" type="hidden"  value="'.htmlspecialchars($_POST['id_utilisateur']).'">';

		if (isset($_POST['id_signalement_concerne'])) {
			echo '<input name="id_signalement_concerne" type="hidden" value="'.htmlspecialchars($_POST['id_signalement_concerne']).'">';
		}

		echo '	<button type="submit">Modifier</button>
			</form></br>'.
			'</p>';

		if (isset($_POST['id_signalement_concerne'])) {
			echo '<form method="post" action="back_office_signal_details.php">
					<input name="id_signalement_details" type="hidden" value="'.htmlspecialchars($_POST['id_signalement_concerne']).'">
					<button type="submit">Retour au message de signalement</button>
				</form> <br/>';
		}
		else {
			echo '<form method="post" action="back_office_recherche_utilisateur.php">
					<button type="submit">Retour à la recherche</button>
				</form> <br/>';
		}
		if(isset($pasDAminBanni)) {
			echo '<p class="titrerouge"> Ne bannissez un utilisateur à qui vous donnez les droits d\'admin!</p>';
		}
	}
	

?>