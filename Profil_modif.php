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
        <form action="cible_envoi.php" method="post" enctype="multipart/form-data">
          <p>
            Modifier la photo de profil:<br />
                <input type="file" name="monfichier" /><br />
                <h1 class="boutonp3"><input type="submit" value="Envoyer la photo" class="bouton3"/></h1>
          </p>
        </form>
 <div class="space"></div>     
        <form method="post" action="Profil_modif_php.php" class="centrerco">
          <div class="centrerco">
          	  <label for="Nom">Nom :</label><input type="text" name="Nom" id="Nom"  value="<?php echo htmlspecialchars( $_SESSION['tttnom']); ?>" size="10" maxlength="30"  />
              <label for="Prenom">Prénom :</label><input type="text" name="Prenom" id="Prenom" value="<?php echo  htmlspecialchars($_SESSION['tttprenom']); ?>" maxlength="30"/><br />
              <label for="Telephone">Téléphone :</label> <input type="text" name="Telephone" id="Telephone" value="<?php echo  htmlspecialchars($_SESSION['ttttelephone']); ?>" size="25" maxlength="10"/><br />
              <label for="Ville">Ville :</label> <input type="text" name="Ville" id="Ville" value="<?php echo  htmlspecialchars($_SESSION['tttville']); ?>" size="25" /><br />
              <label for="Mail">E-mail :</label> <input type="email" name="Mail" id="Mail" value="<?php echo  htmlspecialchars($_SESSION['tttmail']); ?>" size="25" maxlength="70"/><br />
          </div>
              <h1 class="boutonp3"><input type="submit" value="Valider"  class="bouton3"></h1><br /><br /><br/>
        </form>
        
          <h1 class="titrebleu">Modifier votre mot de passe: </h1><br/> <br/>
        <form method="post" action="Profil_modif_php.php" class="centrerco">
         <label for="Pass">Nouvau mot de Passe :</label><input type="password" name="Pass" id="Pass"  size="25" maxlength="70"/><br />
         <label for="Confi">Confirmation :</label><input type="password" name="Confi" id="Confi"   size="25" maxlength="70"/><br />
         <h1 class="boutonp3"><input type="submit" value="Valider"  class="bouton3"></h1><br /><br />
        </form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>