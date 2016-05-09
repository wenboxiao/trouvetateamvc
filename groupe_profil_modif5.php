
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
     <div class="groupe_profil">
      <div class="spacearound"> <h4 class="titrerouge">Modifications effectuées</h4></div><br />
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom de la team </h3> <h3 class="green"><?php echo  $_GET['nom_team']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport </h3> <h3 class="green"><?php echo  $_GET['sport_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville </h3> <h3 class="green"><?php echo  $_GET['ville_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Club </h3> <h3 class="green"><?php echo  $_GET['club_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description </h3> <h3 class="green"><?php echo  $_GET['description_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><h3><a href="groupe_profil_modif.php" class="decox"> Modifier </a></h3></div>
    </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>