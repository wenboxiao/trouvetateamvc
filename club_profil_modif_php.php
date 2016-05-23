<?php session_start(); ?>
<?php 	

$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT * FROM clubs WHERE nomclub = ?');
$req->execute(array($_POST['nom_club']));
if($do = $req->fetch()){
	$idclub=$do['id_club'];
	
	$req->closeCursor();}
	
	if ((isset($_POST['Nom'])) ) {
	
		$reqa = $bdd->prepare('SELECT nomclub FROM clubs WHERE nomclub = ?');
		$reqa->execute(array($_POST['Nom']));
		if($donne = $reqa->fetch()){
			$req->closeCursor();
			if( $_POST['nom_club']!=$_POST['Nom']){
			include("club_profil_modif1.php");
			
		}}
			
		else{
			$_POST['nom_club'] = $_POST['Nom'];
			$reqa->closeCursor();
			
			$requ = $bdd->prepare('UPDATE clubs SET nomclub = :nv_nom WHERE id_club = :idclub');
			$requ->execute(array(
					'nv_nom' => $_POST['Nom'],
					'idclub' => $idclub,
			));
			$requ->closeCursor();
			}
	
	}
	
	if ((isset($_POST['Sport'])) ) {
	
		$reqa = $bdd->prepare('SELECT id_sport FROM sports WHERE nomsport = ?');
		$reqa->execute(array($_POST['Sport']));
		if($donne = $reqa->fetch()){
			$_POST['sport_club'] = $_POST['Sport'];
			$sport =$donne['id_sport'];
			$reqa->closeCursor();
	
			$requ = $bdd->prepare('UPDATE clubs SET id_sport = :nv_sport WHERE id_club = :idclub');
			$requ->execute(array(
					'nv_sport' => $sport,
					'idclub' => $idclub,
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
					$_POST['ville_club'] = $_POST['Ville'];
					$ville =$donne['ville_id'];
					$reqa->closeCursor();
								
				$requ = $bdd->prepare('UPDATE clubs SET ville_id = :nv_ville WHERE id_club = :idclub');
				$requ->execute(array(
						'nv_ville' => $ville,
						'idclub' => $idclub,			
				));			
				$requ->closeCursor();
				}
			
			else{
				$req->closeCursor();
				
		
				include("club_profil_modif3.php");}}
	
		if ((isset($_POST['Adresse'])) ) {
		
			$_POST['adresse_club'] = $_POST['Adresse'];
			$requ = $bdd->prepare('UPDATE clubs SET adresse= :nv_adresse WHERE id_club = :idclub');
			$requ->execute(array(
					'nv_adresse' => $_POST['Adresse'],
					'idclub' => $idclub,
			));
			$requ->closeCursor();
		}
		
		if ((isset($_POST['Mail'])) ) {
		
			$_POST['mail_club'] = $_POST['Mail'];
			$requ = $bdd->prepare('UPDATE clubs SET mailclub= :nv_mail WHERE id_club = :idclub');
			$requ->execute(array(
					'nv_mail' => $_POST['Mail'],
					'idclub' => $idclub,
			));
			$requ->closeCursor();
		}
		



	
	if ((isset($_POST['description'])) ) {

			$_POST['description_club'] = $_POST['description'];
			$requ = $bdd->prepare('UPDATE clubs SET descriptionclub= :nv_description WHERE id_club = :idclub');
			$requ->execute(array(
					'nv_description' => $_POST['description'],
					'idclub' => $idclub,
			));
			$requ->closeCursor();
	}
	
	include("club_profil_modif4.php");
	

?>