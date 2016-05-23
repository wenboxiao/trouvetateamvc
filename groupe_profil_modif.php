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
 <div class="space"></div>     
        <form method="post" action="groupe_profil_modif_php.php" class="centrerco">
          <div class="centrerco">
          	  <label for="Nom">Nom de la team :</label><input type="text" name="Nom" id="Nom"  value="<?php echo  $_POST['nom_team']; ?>" size="10" maxlength="30"  /><br />
              <label for="Sport">Sport :</label><input type="text" name="Sport" id="Sport" value="<?php echo $_POST['sport_team']; ?>" maxlength="30"/><br />
              <label for="Ville">Ville :</label> <input type="text" name="Ville" id="Ville" value="<?php echo $_POST['ville_team']; ?>" size="25" /><br />
              <label for="Club">Club :</label> <input type="text" name="Club" id="Club" value="<?php echo $_POST['club_team']; ?>" size="25" maxlength="70"/><br />
              <label for="description">Description :</label><textarea name="description" id="description" rows="10" cols="50"><?php echo  $_POST['description_team']; ?></textarea><br />
           </div>  
         <input  name="nom_team" type="hidden"  value="<?php echo $_POST['nom_team']; ?>" >
 			<input  name="description_team" type="hidden"  value="<?php echo $_POST['description_team']; ?>" >
 			<input  name="ville_team" type="hidden"  value="<?php echo  $_POST['ville_team']; ?>" >
 			<input  name="sport_team" type="hidden"  value="<?php echo  $_POST['sport_team']; ?>" >
 			<input  name="club_team" type="hidden"  value="<?php echo  $_POST['club_team']; ?>" >
            <input  name="club_team" type="hidden"  value="<?php echo  $_POST['club_team']; ?>" >
 			<input  name="nbmembres" type="hidden"  value="<?php echo  $_POST['nbmembres']; ?>" >
 			<div class="spacearound"><h3><button type=submit class="decox"> Modifier</button></h3></div></form>
 			 
            
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>