<?php session_start(); ?>
<?php 
	if (($_POST['tttpseudo'])=="" AND ($_POST['tttpass']=="")) {
		include("Connexion2.php");
	}
		else{
		if (isset($_POST['tttpseudo']) AND (isset($_POST['tttpass']))) {
			try
				{
			$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
				}
			catch(Exception $e)
				{
        	die('Erreur : '.$e->getMessage());
				}
		
			$req = $bdd->prepare('SELECT MotDePass FROM utilisateurs WHERE NomUtilisateur = ?');
			$req->execute(array($_POST['tttpseudo']));
			if($donnees = $req->fetch()){
				if ($_POST['tttpass']==$donnees['MotDePass']) {
					$_SESSION['tttpseudo']=$_POST['tttpseudo'];
        			$_SESSION['tttpass']=$_POST['tttpass'];
					$req->closeCursor();
					header('Location: Profild.php');
        			}
        		else{
        			$req->closeCursor();
        			include("Connexion5.php");
        		}
				}
			else{
				$req->closeCursor();
				include("Connexion4.php");
			}
			$req->closeCursor();
			}
        
		else {
			include("Connexion2.php");}}
?>