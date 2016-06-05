<?php session_start(); ?>
<?php include("back_office_verif_admin.php"); ?>
<!DOCTYPE html>
<html>
 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Am.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title><?php include("Nom_site.php"); ?></title>
    </head>
    <body>
    	<?php include("Barrec.php"); ?>
        <h1 class="titrevert"> Edition du site </h1>
        <p class="centrerco"> Vous editez ici le site internet :
        </p>
      <?php include("back_office_editer_site_preremplissage.php"); ?> 
        <div class="space"></div>
        <form method="post" action="back_office_editer_site_php.php" class="centrerco">
          <div class="centrerco">
              <label for="Nom_site">Nom du site :</label><input type="text" name="Nom_site" id="Nom_site" size="30" value=<?php echo '"'.$nom_site.'"'; ?> />
              <label for="Email_contact">Email de contact :</label><input type="email" name="Email_contact" id="Email_contact" size="30" value=<?php echo '"'.$email.'"'; ?> /><br />
              <label for="Mentions_legales">Mentions légales :</label><textarea name="Mentions_legales" id="Mentions_legales" rows="5" cols="90"><?php echo $mentions; ?></textarea><br />
              <label for="Conditions">Conditions générales d'utilisation :</label> <textarea name="Conditions" id="Conditions" rows="5" cols="90"><?php echo $conditions; ?></textarea><br />
              <p> Vous pouvez copier l'url d'un des logos utilisé précédement ou en ajouter un en cliquant <a href="back_office_editer_upload_logo.php" class="boutonh2"> ici </a><br/></p>
              <label for="url_logo">Url du Logo :</label> <input type="url" name="url_logo" id="url_logo" size="70" value=<?php echo '"'.$logo.'"'; ?> /><br />
          </div>
              <h2 class="boutonp3"><input type="submit" value="Modifier le site"  class="bouton3"></h2>
        </form>
    </body> 
</html>