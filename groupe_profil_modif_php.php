<?php session_start(); ?>
<?php 	

$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}
	
	if ((isset($_POST['Nom_team'])) ) {
	
		$reqa = $bdd->prepare('SELECT nomgroupe FROM groupes WHERE nomgroupe = ?');
		$reqa->execute(array($_POST['Nom_team']));
		if($donne = $reqa->fetch()){
			$req->closeCursor();
			if($_POST['Nom_team'] != $_GET['nom_team']){
			include("groupe_profil_modif1.php");}
			
		}
			
		else{
			$_GET['nom_team'] = $_POST['Nom_team'];
			$reqa->closeCursor();
			
			$requ = $bdd->prepare('UPDATE groupes SET nomgroupe = :nv_nom WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_nom' => $_POST['Nom_team'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
			}
	
	}
	
	if ((isset($_POST['Sport'])) ) {
	
		$reqa = $bdd->prepare('SELECT id_sport FROM sports WHERE nomsport = ?');
		$reqa->execute(array($_POST['Sport']));
		if($donne = $reqa->fetch()){
			$_GET['sport_team'] = $_POST['Sport'];
			$sport =$donne['id_sport'];
			$reqa->closeCursor();
	
			$requ = $bdd->prepare('UPDATE groupes SET id_sport = :nv_sport WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_sport' => $sport,
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
		}
			
		else{
			$req->closeCursor();
			include("groupe_profil_modif2.php");}
	
	}
	
		if ((isset($_POST['Ville'])) ) {
	
			$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
			$reqa->execute(array($_POST['Ville']));	
				if($donne = $reqa->fetch()){
					$_GET['ville_team'] = $_POST['Ville'];
					$ville =$donne['ville_id'];
					$reqa->closeCursor();
								
				$requ = $bdd->prepare('UPDATE groupes SET ville_id = :nv_ville WHERE id_utilisateur = :pseudo');
				$requ->execute(array(
						'nv_ville' => $ville,
						'pseudo' => $pseudo,			
				));			
				$requ->closeCursor();
				}
			
			else{
				$req->closeCursor();
				include("groupe_profil_modif3.php");}
		
		}
	
		if ((isset($_POST['Club'])) ) {
		
			$reqa = $bdd->prepare('SELECT id_club FROM clubs WHERE nomclub = ?');
			$reqa->execute(array($_POST['Club']));
			if($donne = $reqa->fetch()){
				$_GET['club_team'] = $_POST['Club'];
				$club =$donne['id_club'];
				$reqa->closeCursor();
		
				$requ = $bdd->prepare('UPDATE groupes SET id_club = :nv_club WHERE id_utilisateur = :pseudo');
				$requ->execute(array(
						'nv_club' => $club,
						'pseudo' => $pseudo,
				));
				$requ->closeCursor();
			}
				
			else{
				$req->closeCursor();
				include("groupe_profil_modif4.php");}
		
		}
		
		



	
	if ((isset($_POST['description'])) ) {

			$_GET['description_team'] = $_POST['description'];
			$requ = $bdd->prepare('UPDATE groupes SET descriptiongroupe= :nv_description WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_description' => $_POST['description'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
	}
	
	
	include("groupe_profil_modif5.php");
		
?>