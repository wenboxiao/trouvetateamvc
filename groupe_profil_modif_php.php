<?php session_start(); ?>
<?php 	

$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT id_groupe FROM groupes WHERE nomgroupe = ?');
$req->execute(array($_POST['nom_team']));
if($do = $req->fetch()){
	$idgroupe=$do['id_groupe'];
	$req->closeCursor();}
	
	if ((isset($_POST['Nom'])) ) {
	
		$reqa = $bdd->prepare('SELECT nomgroupe FROM groupes WHERE nomgroupe = ?');
		$reqa->execute(array($_POST['Nom']));
		if($donne = $reqa->fetch()){
			$req->closeCursor();
			if($_POST['Nom'] != $_POST['nom_team']){
		include("groupe_profil_modif1.php");}
			
		}
			
		else{
		$_POST['nom_team'] = $_POST['Nom'];
			$reqa->closeCursor();
			
			$requ = $bdd->prepare('UPDATE groupes SET nomgroupe = :nv_nom WHERE id_groupe = :idgroupe');
			$requ->execute(array(
					'nv_nom' => $_POST['Nom'],
					'idgroupe' => $idgroupe,
			));
			$requ->closeCursor();
			}
	
	}
	
	if ((isset($_POST['Sport'])) ) {
	
		$reqa = $bdd->prepare('SELECT id_sport FROM sports WHERE nomsport = ?');
		$reqa->execute(array($_POST['Sport']));
		if($donne = $reqa->fetch()){
			$_POST['sport_team'] = $_POST['Sport'];
			$sport =$donne['id_sport'];
			$reqa->closeCursor();
	
			$requ = $bdd->prepare('UPDATE groupes SET id_sport = :nv_sport WHERE id_groupe = :idgroupe');
			$requ->execute(array(
					'nv_sport' => $sport,
					'idgroupe' => $idgroupe,
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
					$_POST['ville_team'] = $_POST['Ville'];
					$ville =$donne['ville_id'];
					$reqa->closeCursor();
								
				$requ = $bdd->prepare('UPDATE groupes SET ville_id = :nv_ville WHERE id_groupe = :idgroupe');
				$requ->execute(array(
						'nv_ville' => $ville,
						'idgroupe' => $idgroupe,			
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
				$_POST['club_team'] = $_POST['Club'];
				$club =$donne['id_club'];
				$reqa->closeCursor();
		
				$requ = $bdd->prepare('UPDATE groupes SET id_club = :nv_club WHERE id_groupe = :idgroupe');
				$requ->execute(array(
						'nv_club' => $club,
						'idgroupe' => $idgroupe,
				));
				$requ->closeCursor();
			}
				
			else{
				$req->closeCursor();
				include("groupe_profil_modif4.php");}
		
		}
		
		



	
	if ((isset($_POST['description'])) ) {

			$_POST['description_team'] = $_POST['description'];
			$requ = $bdd->prepare('UPDATE groupes SET descriptiongroupe= :nv_description WHERE id_groupe = :idgroupe');
			$requ->execute(array(
					'nv_description' => $_POST['description'],
					'idgroupe' => $idgroupe,
			));
			$requ->closeCursor();
	}
echo '<form method="post"  action="groupe_profil.php">
 			
 			<input  name="nom_team" type="hidden"  value="'.$_POST['nom_team'].'" >
 			<input  name="description_team" type="hidden"  value="'.$_POST['nom_team'].'" >
 			<input  name="ville_team" type="hidden"  value="'.$_POST['nom_team'].'" >
 			<input  name="sport_team" type="hidden"  value="'.$_POST['nom_team'].'" >
 			<input  name="club_team" type="hidden"  value="'.$_POST['nom_team'].'" >';
	
	include("groupe_profil_modif5.php");
		
?>