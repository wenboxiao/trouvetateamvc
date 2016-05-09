<?php session_start(); 
    if (isset($_SESSION['tttpseudo'])==False) {
        header('Location: Trouvetateam.php');
            }
?>
<!DOCTYPE html>
<html>
 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Amb.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title>Trouve ta Team</title>
  </head>
  <body>
     <?php include("Barrec.php"); ?>
     <section>
     <div class="club_profil">
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom du club </h3> <h3 class="green"><?php echo  	$_GET['nom_club']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport </h3> <h3 class="green"><?php echo  $_GET['sport_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville </h3> <h3 class="green"><?php echo  $_GET['ville_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Adresse</h3> <h3 class="green"><?php echo  $_GET['adresse_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">E-mail </h3> <h3 class="green"><?php echo  $_GET['mail_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description </h3> <h3 class="green"><?php echo  $_GET['description_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><h3><a href="club_profil_modif.php" class="decox"> Modifier </a></h3></div>
    </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>