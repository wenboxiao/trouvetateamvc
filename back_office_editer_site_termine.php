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
      <div class="space"></div>  
      <h2 class="titrevert"> La nouvelle version du site a bien été enregistrée </h2>
      <form method="post" action="Trouvetateam.php" class="centrerco">
        <h4 class="boutonp3"><input type="submit" value="Accueil"  class="bouton3"></h4>
      </form>
    </body> 
</html>