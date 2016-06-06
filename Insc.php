<?php session_start(); ?>
<?php 	
	if ((isset($_POST['Pseudo'])) AND(isset($_POST['Pass']))AND (isset($_POST['Ville']))AND(isset($_POST['Confi']))AND(isset($_POST['Mail']))) {
	}
	else{header('Location: Inscription4.php');}

	
	if (($_POST['Pseudo']=="") OR ($_POST['Pass']=="") OR ($_POST['Ville']=="") OR ($_POST['Confi']=="") OR ($_POST['Mail']=="")){
		include("Inscription4.php");
	}
	else{
		if ((isset($_POST['Pseudo'])) AND(isset($_POST['Pass']))AND (isset($_POST['Ville']))AND(isset($_POST['Confi']))AND(isset($_POST['Mail']))) {
			include('TTT_BDD.php');
			
			$reqo = $bdd->prepare('SELECT NomUtilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
			$reqo->execute(array($_POST['Pseudo']));
			if($donnees = $reqo->fetch()){
				include("Inscription2.php");
				$reqo->closeCursor();
			}
			else{
				$reqb = $bdd->prepare('SELECT Mail FROM utilisateurs WHERE Mail = ?');
				$reqb->execute(array($_POST['Mail']));
				if ($don = $reqb->fetch()) {
					include("Inscription6.php");
					$reqb->closeCursor();
				}
				else{
					if ($_POST['Pass']==$_POST['Confi']) {
						$reqo->closeCursor();
						$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
						$reqa->execute(array($_POST['Ville']));	
						if($donne = $reqa->fetch()){
							$time=date('Y-m-d', time());
							$Ville=$donne['ville_id'];
							$reqa->closeCursor();
							$req = $bdd->prepare('INSERT INTO utilisateurs(NomUtilisateur, DroitAdmin, ville_id, Mail, MotDePass, Nom, Prenom, Telephone, derniere_connexion) VALUES(:NomUtilisateur, 0, :ville_id, :Mail, :MotDePass, :Nom, :Prenom, :Telephone, :derniere_connexion)');
							$req->execute(array(
							'NomUtilisateur' => $_POST['Pseudo'],
							'ville_id' => $Ville,
							'Mail' => $_POST['Mail'],
							'MotDePass' => MD5($_POST['Pass']),
							'Nom' => $_POST['Nom'],
							'Prenom' => $_POST['Prenom'],
							'Telephone' => $_POST['Telephone'],
							'derniere_connexion' => $time
							));
							$req->closeCursor();
						}
						else{
							$reqa->closeCursor();
							include("Inscription5.php");
						}

					}
					else{
						include("Inscription3.php");
					}
				}
			}
		}
		else{
			include("Inscription4.php");
		}
		include("Bienvenue.php");
	}
?>