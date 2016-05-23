
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
 <div class="space"></div>     
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom de la team: </h3> <h3 class="green"><?php echo  $_POST['nom_team']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport: </h3> <h3 class="green"><?php echo  $_POST['sport_team']; ?></h3><div class="space2"></div></div>
        <h4 class="titrerouge">La ville n'est pas reconnu !</h4><br />
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville: </h3> <h3 class="green"><?php echo  $_POST['ville_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Club:</h3> <h3 class="green"><?php echo  $_POST['club_team']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Nombres de participants:</h3> <h3 class="green"><?php echo  $_POST['nbmembres']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description: </h3><h3 class="green"><p><?php echo  $_POST['description_team']; ?></p></h3><div class="space2"></div></div>
       </div>
        <form method="post"  action="groupe_profil_modif.php">
 			<input  name="nom_team" type="hidden"  value="<?php echo $_POST['nom_team']; ?>" >
 			<input  name="description_team" type="hidden"  value="<?php echo $_POST['description_team']; ?>" >
 			<input  name="ville_team" type="hidden"  value="<?php echo  $_POST['ville_team']; ?>" >
 			<input  name="sport_team" type="hidden"  value="<?php echo  $_POST['sport_team']; ?>" >
 			<input  name="club_team" type="hidden"  value="<?php echo  $_POST['club_team']; ?>" >
 			<input  name="nbmembres" type="hidden"  value="<?php echo  $_POST['nbmembres']; ?>" >
 			<div class="spacearound"><h3><button type=submit class="decox"> Modifier</button></h3></div></form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>