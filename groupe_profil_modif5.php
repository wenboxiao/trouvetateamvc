
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
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom de la team: </h3> <h3 class="green"><?php echo  $_POST['nom_team']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport: </h3> <h3 class="green"><?php echo  $_POST['Sport']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville: </h3> <h3 class="green"><?php echo  $_POST['Ville']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Club:</h3> <h3 class="green"><?php echo  $_POST['Club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description: </h3><h3 class="green"><p><?php echo  $_POST['description']; ?></p></h3><div class="space2"></div></div>
       
        <form method="post"  action="groupe_profil_modif.php">
 			<input  name="nom_team" type="hidden"  value="<?php echo $_POST['nom_team']; ?>" >
 			<input  name="description_team" type="hidden"  value="<?php echo $_POST['description_team']; ?>" >
 			<input  name="ville_team" type="hidden"  value="<?php echo  $_POST['ville_team']; ?>" >
 			<input  name="sport_team" type="hidden"  value="<?php echo  $_POST['sport_team']; ?>" >
 			<input  name="club_team" type="hidden"  value="<?php echo  $_POST['club_team']; ?>" >
 			<div class="spacearound"><h3><button type=submit class="decox"> Modifier</button></h3></div></form>
 	</section>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	
  </body>
