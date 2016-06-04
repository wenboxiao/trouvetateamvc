<?php session_start(); ?>
<?php 
	if (($_POST['tttpseudo'])=="" AND ($_POST['tttpass']=="")) {
		include("Connexion2.php");
	}
		else{
		if (isset($_POST['tttpseudo']) AND (isset($_POST['tttpass']))) {
			try
				{
			include('TTT_BDD.php');
				}
			catch(Exception $e)
				{
        	die('Erreur : '.$e->getMessage());
				}
		
			$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
			$req->execute(array($_POST['tttpseudo']));
			if($donnees = $req->fetch()){
				if (MD5($_POST['tttpass'])==$donnees['MotDePass']) {
					if($donnees['is_banned']==0) {
						$_SESSION['tttpseudo']=$_POST['tttpseudo'];
	        			$_SESSION['tttpass']=1;
						$req->closeCursor();
						header('Location: Profild.php');
					}
					else{
						$req-> closeCursor();
						include("Connexion6.php");
					}
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