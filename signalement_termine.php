
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
        <?php 
          if ((!isset($_SESSION['tttpseudo']))&&(!isset($_SESSION['tttpass']))) {
              include("Barred.php"); }
          else {
              include("Barrec.php"); }
        ?>
        <p class="centrer"> Votre requête a bien été envoyée à l'administrateur, qui l'examinera <br/>
        </p>
        <div class="boutonp">
            <h3><a href="Trouvetateam.php" class="bouton">Accueil</a></h3>
        </div>
        <?php include("Barrer.php"); ?>
    </body>
