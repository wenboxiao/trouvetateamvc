<?php session_start(); ?>
<?php 	
	if ((isset($_POST['id_club'])) AND(isset($_POST['Sport']))AND (isset($_POST['Ville']))AND (isset($_POST['Nom_club']))AND (isset($_POST['Mail']))) {
	}
	else{header('Location: club_inscription4.php');}

	
	if (($_POST['id_club']=="") OR ($_POST['Sport']=="") OR ($_POST['Ville']=="") OR ($_POST['Nom_club']=="") OR ($_POST['Mail']=="") ){
		include("club_inscription4.php");
	}
	else{
		if ((isset($_POST['id_club'])) AND(isset($_POST['Sport']))AND (isset($_POST['Ville']))AND (isset($_POST['Nom_club']))AND (isset($_POST['Mail']))) {
			include('TTT_BDD.php');
			
			$requ = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
			$requ->execute(array($_SESSION['tttpseudo']));
			if($do = $requ->fetch()){
				$admin_club=$do['id_utilisateur'];
				$requ->closeCursor();}
				
			$reqo = $bdd->prepare('SELECT id_club FROM clubs WHERE id_club = ?');
			$reqo->execute(array($_POST['id_club']));
			if($donnees = $reqo->fetch()){
				include("club_inscription1.php");
				$reqo->closeCursor();
			}
				else{
					
						$reqo->closeCursor();
						$reqs = $bdd->prepare('SELECT * FROM sports WHERE nomsport = ?');
						$reqs->execute(array($_POST['Sport']));
						if($don = $reqs->fetch()){
							$Sport=$don['id_sport'];
							$reqs->closeCursor();
							
							$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
							$reqa->execute(array($_POST['Ville']));	
								if($donne = $reqa->fetch()){
									$Ville=$donne['ville_id'];
									$reqa->closeCursor();
									$req = $bdd->prepare('INSERT INTO clubs(adresse, descriptionclub, id_club, id_utilisateur, mailclub, nomclub, ville_id) VALUES(:adresse, :descriptionclub, :id_club, :id_utilisateur, :mailclub, :nomclub, :ville_id)');
									$req->execute(array(
									'adresse' => $_POST['Adresse'],
								    'descriptionclub' => $_POST['description'],
									'id_club' => $_POST['id_club'],
									'id_utilisateur' => $admin_club,
									'mailclub' => $_POST['Mail'],
									'nomclub' => $_POST['Nom_club'],
									'ville_id' => $Ville,
									));
									$req->closeCursor();
									
									$reqs = $bdd->prepare('SELECT * FROM clubs WHERE nomclub = ?');
									$reqs->execute(array($_POST['Nom_club']));
									if($donn = $reqs->fetch()){
										$id_club=$donn['id_club'];
										$reqs->closeCursor();}
									$req = $bdd->prepare('INSERT INTO sport_du_club(id_club, id_sport) VALUES(:id_club, :id_sport)');
									$req->execute(array(
											'id_club' => $id_club,
											'id_sport' => $Sport));
									$reqs->closeCursor();
									include("club_bienvenue.php");
								}
								else{
									$reqa->closeCursor();
									include("club_inscription3.php");
								}
						}
						else{
							$reqs->closeCursor();
							include("club_inscription2.php");
						}
				}
		}
		else{
			include("club_inscription4.php");
		}
		
	}
?>