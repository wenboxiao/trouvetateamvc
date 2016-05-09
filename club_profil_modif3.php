
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
        <form method="post" action="club_profil_modif_php.php" class="centrerco">
          <div class="centrerco">
          	  <label for="Nom_club">Nom du club :</label><input type="text" name="Nom_club" id="Nom_club"  value="<?php echo  $_GET['nom_club']; ?>" size="10" maxlength="30"  />
              <label for="Sport">Sport :</label><input type="text" name="Sport" id="Sport" value="<?php echo  $_GET['sport_club']; ?>" maxlength="30"/><br />              
              <label for="Ville">Ville :</label> <input type="text" name="Ville" id="Ville" value="<?php echo  $_GET['ville_club']; ?>" size="25" /><br />
             <h4 class="titrerouge">La ville n'est pas reconnu !</h4><br />
              <label for="Club">Adresse :</label> <input type="text" name="Adresse" id="Adresse" value="<?php echo  $_GET['adresse_club']; ?>" size="25" /><br />
              <label for="Mail">E-mail :</label> <input type="email" name="Mail" id="Mail" value="<?php echo  $_GET['mail_club']; ?>" size="25" maxlength="70"/><br />
              <label for="description">Description :</label><textarea name="description" id="description" rows="10" cols="50"><?php echo  $_GET['description_club']; ?></textarea><br />
             
             
          </div>
              <h1 class="boutonp3"><input type="submit" value="Valider"  class="bouton3"></h1>
        </form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>