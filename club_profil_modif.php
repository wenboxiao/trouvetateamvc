
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
        <title><?php include("Nom_site.php"); ?></title>
  </head>
  <body>
     <?php include("Barrec.php"); ?>
     <section>
 <div class="space"></div>     
        <form method="post" action="club_profil_modif_php.php" class="centrerco">
          <div class="centrerco">
          	  <label for="Nom">Nom du club :</label><input type="text" name="Nom" id="Nom"  value="<?php echo  htmlspecialchars($_POST['nom_club']); ?>" size="10" maxlength="30"  />
              <label for="Sport">Sport :</label><input type="text" name="Sport" id="Sport" value="<?php echo  htmlspecialchars($_POST['sport_club']); ?>" maxlength="30"/><br />
              <label for="Ville">Ville :</label> <input type="text" name="Ville" id="Ville" value="<?php echo  htmlspecialchars($_POST['ville_club']); ?>" size="25" /><br />
              <label for="Club">Adresse :</label> <input type="text" name="Adresse" id="Adresse" value="<?php echo htmlspecialchars($_POST['adresse_club']); ?>" size="25" /><br />
              <label for="Mail">E-mail :</label> <input type="email" name="Mail" id="Mail" value="<?php echo  htmlspecialchars($_POST['mail_club']); ?>" size="25" maxlength="70"/><br />
 <label for="description">Description :</label><textarea name="description" id="description" rows="10" cols="50"><?php echo  htmlspecialchars($_POST['description_club']); ?></textarea><br />             
          </div>
             <input  name="nom_club" type="hidden"  value="<?php echo $_POST['nom_club']; ?>" >
 			<input  name="description_club" type="hidden"  value="<?php echo $_POST['description_club']; ?>" >
 			<input  name="ville_club" type="hidden"  value="<?php echo  $_POST['ville_club']; ?>" >
 			<input  name="sport_club" type="hidden"  value="<?php echo  $_POST['sport_club']; ?>" >
 			<input  name="adresse_club" type="hidden"  value="<?php echo  $_POST['adresse_club']; ?>" >
            <input  name="mail_club" type="hidden"  value="<?php echo  $_POST['mail_club']; ?>" >
 			
 			<div class="spacearound"><h3><button type=submit class="bouton3"> Modifier</button></h3></div></form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>