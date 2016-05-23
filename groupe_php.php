<?php session_start(); ?>
<?php 	
	if ((isset($_POST['Nom_team'])) AND(isset($_POST['Sport']))AND (isset($_POST['Ville']))) {
	}
	else{header('Location: groupe_inscription4.php');}

	
	if (($_POST['Nom_team']=="") OR ($_POST['Sport']=="") OR ($_POST['Ville']=="") ){
		include("groupe_inscription4.php");
	}
	else{
		if ((isset($_POST['Nom_team'])) AND(isset($_POST['Sport']))AND (isset($_POST['Ville']))) {
			$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
			
			$requ = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
			$requ->execute(array($_SESSION['tttpseudo']));
			if($do = $requ->fetch()){
				$admin_groupe=$do['id_utilisateur'];
				$requ->closeCursor();}
				
			$reqo = $bdd->prepare('SELECT nomgroupe FROM groupes WHERE nomgroupe = ?');
			$reqo->execute(array($_POST['Nom_team']));
			if($donnees = $reqo->fetch()){
				include("groupe_inscription1.php");
				$reqo->closeCursor();
			}
				else{
					
						$reqo->closeCursor();
						$reqs = $bdd->prepare('SELECT id_sport FROM sports WHERE nomsport = ?');
						$reqs->execute(array($_POST['Sport']));
						if($don = $reqs->fetch()){
							$Sport=$don['id_sport'];
							$reqs->closeCursor();
							$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
							$reqa->execute(array($_POST['Ville']));	
								if($donne = $reqa->fetch()){
									$Ville=$donne['ville_id'];
									$reqa->closeCursor();
									$Club=0;
									if (($_POST['Club']!="")){
										
								
										
									
									$reqc = $bdd->prepare('SELECT id_club FROM clubs WHERE nomclub = ?');
									$reqc->execute(array($_POST['Club']));
									if($d = $reqc->fetch()){
										$Club=$d['id_club'];
										$reqc->closeCursor();}
									else{
								$reqc->closeCursor();
								include("groupe_inscription5.php");
							}}
										
									
									$req = $bdd->prepare('INSERT INTO groupes(nomgroupe, descriptiongroupe, id_sport, id_club, ville_id, nombremembres, id_utilisateur) VALUES(:nomgroupe, :descriptiongroupe, :id_sport, :id_club, :ville_id, 1, :id_utilisateur)');
									$req->execute(array(
									'nomgroupe' => $_POST['Nom_team'],
								    'descriptiongroupe' => $_POST['description'],
									'id_sport' => $Sport,
									'id_club'  => $Club,
									'ville_id' => $Ville,
									
									'id_utilisateur' => $admin_groupe,
									));
									$req->closeCursor();
								
							
									include("groupe_bienvenue.php");
							
									
								}	
								
								else{
									$reqa->closeCursor();
									include("groupe_inscription3.php");
								}
						}
						else{
							$reqs->closeCursor();
							include("groupe_inscription2.php");
						}
				}
		}
		else{
			include("groupe_inscription4.php");
		}
		
	}
?>