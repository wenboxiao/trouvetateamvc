<?php session_start(); ?>
<?php 	


	
	
		if ((isset($_POST['Ville'])) AND ($_POST['Sport']=="")) {
			
			$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
			
			$reqa = $bdd->prepare('SELECT * FROM villes_france_free WHERE ville_nom_reel = ?');
						$reqa->execute(array($_POST['Ville']));	
						if($donne = $reqa->fetch()){
							$_GET['ville_id']=$donne['ville_id'];
							$_GET['nomville']=$_POST['Ville'];
							$reqa->closeCursor();
							$reqa = $bdd->prepare('SELECT * FROM groupes WHERE  ville_id= ?');
						$reqa->execute(array($_GET['ville_id']));	
						if($donne = $reqa->fetch()){
							include("recherche_resultat.php");}
							else{include("recherche_resultat0.php");}}
						else{ $reqa->closeCursor();
						include("recherche_resultat0.php");}}
						
						
						
	elseif (($_POST['Ville']=="") AND (isset($_POST['Sport']))) {
								
							$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
								
							$reqa = $bdd->prepare('SELECT * FROM sports WHERE nomsport = ?');
							$reqa->execute(array($_POST['Sport']));
							if($donne = $reqa->fetch()){
								$_GET['id_sport']=$donne['id_sport'];
								$_GET['nomsport']=$_POST['Sport'];
								$reqa->closeCursor();
								$reqa = $bdd->prepare('SELECT * FROM groupes WHERE  id_sport= ?');
								$reqa->execute(array($_GET['id_sport']));
								if($donne = $reqa->fetch()){
									include("recherche_resultat1.php");}
									else{include("recherche_resultat0.php");}}
								else{ $reqa->closeCursor();
								include("recherche_resultat0.php");}}
	
		
	
	elseif ((isset($_POST['Ville'])) AND (isset($_POST['Sport']))) {
	
		$bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
	
		$reqa = $bdd->prepare('SELECT * FROM sports WHERE nomsport = ?');
		$reqa->execute(array($_POST['Sport']));
		if($donne = $reqa->fetch()){
			$reqo = $bdd->prepare('SELECT * FROM villes_france_free WHERE ville_nom_reel = ?');
			$reqo->execute(array($_POST['Ville']));
			if($don = $reqo->fetch()){
				$_GET['ville_id']=$don['ville_id'];
				$_GET['nomville']=$_POST['Ville'];
				$_GET['id_sport']=$donne['id_sport'];
				$_GET['nomsport']=$_POST['Sport'];
				$reqa->closeCursor();
				$reqo->closeCursor();
				$reqa = $bdd->prepare('SELECT * FROM groupes WHERE  id_sport= ?');
				$reqa->execute(array($_GET['id_sport']));
				if($donne = $reqa->fetch()){
					$reqo = $bdd->prepare('SELECT * FROM groupes WHERE  ville_id= ?');
					$reqo->execute(array($_GET['ville_id']));
					if($don = $reqo->fetch()){
						include("recherche_resultat2.php");}	
					else{include("recherche_resultat0.php");}}
					else{ $reqa->closeCursor();
					include("recherche_resultat0.php");}}
				
				else{ $reqa->closeCursor();
				      $reqo->closeCursor();
				include("recherche_resultat0.php");}}
			
			
			else{ $reqa->closeCursor();
			include("recherche_resultat0.php");}
	
	}
?>