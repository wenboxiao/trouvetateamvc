<?php session_start(); ?>
<?php 	

$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}
	
	if ((isset($_POST['Nom_club'])) ) {
	
		$reqa = $bdd->prepare('SELECT nomclub FROM club WHERE nomclub = ?');
		$reqa->execute(array($_POST['Nom_club']));
		if($donne = $reqa->fetch()){
			$req->closeCursor();
			include("groupe_profil_modif1.php");
			
		}
			
		else{
			$_GET['nom_club'] = $_POST['Nom_club'];
			$reqa->closeCursor();
			
			$requ = $bdd->prepare('UPDATE clubs SET nomclub = :nv_nom WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_nom' => $_POST['Nom_club'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
			}
	
	}
	
	if ((isset($_POST['Sport'])) ) {
	
		$reqa = $bdd->prepare('SELECT id_sport FROM sports WHERE nomsport = ?');
		$reqa->execute(array($_POST['Sport']));
		if($donne = $reqa->fetch()){
			$_GET['sport_club'] = $_POST['Sport'];
			$sport =$donne['id_sport'];
			$reqa->closeCursor();
	
			$requ = $bdd->prepare('UPDATE clubs SET id_sport = :nv_sport WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_sport' => $sport,
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
		}
			
		else{
			$req->closeCursor();
			include("club_profil_modif2.php");}
	
	}
	
		if ((isset($_POST['Ville'])) ) {
	
			$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
			$reqa->execute(array($_POST['Ville']));	
				if($donne = $reqa->fetch()){
					$_GET['ville_club'] = $_POST['Ville'];
					$ville =$donne['ville_id'];
					$reqa->closeCursor();
								
				$requ = $bdd->prepare('UPDATE clubs SET ville_id = :nv_ville WHERE id_utilisateur = :pseudo');
				$requ->execute(array(
						'nv_ville' => $ville,
						'pseudo' => $pseudo,			
				));			
				$requ->closeCursor();
				}
			
			else{
				$req->closeCursor();
				include("club_profil_modif3.php");}
		
		}
	
		if ((isset($_POST['Adresse'])) ) {
		
			$_GET['adresse_club'] = $_POST['Adresse'];
			$requ = $bdd->prepare('UPDATE clubs SET adresse= :nv_adresse WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_adresse' => $_POST['Adresse'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
		}
		
		if ((isset($_POST['Mail'])) ) {
		
			$_GET['mail_club'] = $_POST['Mail'];
			$requ = $bdd->prepare('UPDATE clubs SET mailclub= :nv_mail WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_mail' => $_POST['Mail'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
		}
		



	
	if ((isset($_POST['description'])) ) {

			$description_club = $_POST['description'];
			$requ = $bdd->prepare('UPDATE clubs SET descriptionclub= :nv_description WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_description' => $_POST['description'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
	}
	
	
	
		
?>