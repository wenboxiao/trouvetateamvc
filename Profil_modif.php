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
        <form method="post" action="Profil_modif_php.php" class="centrerco">
          <div class="centrerco">
          	  <label for="Nom">Nom :</label><input type="text" name="Nom" id="Nom"  value="<?php echo  $_SESSION['tttnom']; ?>" size="10" maxlength="30"  />
              <label for="Prenom">Prénom :</label><input type="text" name="Prenom" id="Prenom" value="<?php echo  $_SESSION['tttprenom']; ?>" maxlength="30"/><br />
              <label for="Telephone">Téléphone :</label> <input type="text" name="Telephone" id="Telephone" value="<?php echo  $_SESSION['ttttelephone']; ?>" size="25" maxlength="10"/><br />
              <label for="Ville">Ville :</label> <input type="text" name="Ville" id="Ville" value="<?php echo  $_SESSION['tttville']; ?>" size="25" /><br />
              <label for="Mail">E-mail :</label> <input type="email" name="Mail" id="Mail" value="<?php echo  $_SESSION['tttmail']; ?>" size="25" maxlength="70"/><br />
              
          </div>
              <h1 class="boutonp3"><input type="submit" value="Valider"  class="bouton3"></h1>
        </form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>