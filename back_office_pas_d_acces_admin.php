<?php session_start(); ?>
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
            include("Barred.php");
        }
        else {
            include("Barrec.php");
        }
        ?>  
        <h1 class="titrevert"> Accès refusé </h1>
        <p class="textebleu"> Vous devez être connecté depuis un compte possedant les droits d'administrateur pour accèder à cette partie du site.
        </p>
        <?php include("Barrer.php"); ?>
    </body> 
</html>