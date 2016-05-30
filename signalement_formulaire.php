<?php session_start(); ?>

<!DOCTYPE html>
<hmtl>
	<head>
		<meta charset="utf-8"/> 
		<link rel="stylesheet" href="stylettt.css" />
    	<link rel="stylesheet" href="Amb.css" />
    	<link rel="icon" type="image/png" href="image/faviconessai.png" />
		<title>Trouve Ta Team</title>
	</head>

	
	<body>
		<?php 
	      if ((!isset($_SESSION['tttpseudo']))&&(!isset($_SESSION['tttpass']))) {
	          include("Barred.php"); }
	      else {
	          include("Barrec.php"); }
    	?>
		<div class="spaceplus"></div>
		<?php 
		switch($_POST['type_objet']) {
			case 1 :
				$type="l'utilisateur";
			break;
			case 2 :
				$type="le groupe";
			break;
			case 3 :
				$type="le club";
			break;
			case 4 :
				$type="le sujet du forum";
			break;
			case 5 :
				$type="le post du forum";
			break;
			case 6 :
				$type="la photo";
			break;
		}
		?>
		<form method="post" action="signalement.php">
			<div class="space"></div>	
			<label for="tttpseudo" class="titrerouge"> Signaler un contenu inaproprié </label> <br /><h1>
			<p class="textebleu"> 
			Vous signalez <?php echo($type); ?> nommé <?php echo($_POST['nom_objet']); ?> <br/>
			Nous vous remercions de prendre le temps d'aider au bon fonctionnement du site <br/>
			Veuillez entrer ci-dessous le motif de signalement :
			</p>
			<div class="centrerco">
				<textarea name="rapportsignalement" id="rapportsignalement" placeholder="Ex : propos insultants, nom inaproprié..." rows="15" cols="50"></textarea>
			</div>
			<?php 
			// Relais des infos du formulaire précédent
			$id_objet=$_POST['id_objet'];
			$utilisateur_denonce=$_POST['utilisateur_denonce'];
			$type_objet=$_POST['type_objet'];
			echo('
				<input  name="id_objet" type="hidden"  value="'.$id_objet.'" >
				<input  name="utilisateur_denonce" type="hidden"  value="'.$utilisateur_denonce.'" >
		 		<input  name="type_objet" type="hidden"  value="'.$type_objet.'" >
				');
			?>
			<h1 class="boutonp3"><input type="submit" value="Envoyer"  class="bouton3"></h1>
	</body>